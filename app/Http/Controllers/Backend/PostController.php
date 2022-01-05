<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Post;
use App\Models\Subcategory;
use App\Models\Subdistrict;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Image;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function HaberAra(Request $request) {
//        dd($request->all());

        $text= $request->get('haber');

        // $foto=$dbPDO->prepare("SELECT haberfoto_isim from haber_foto where haberfoto_isim  LIKE concat( '%', :haberfoto_isim, '%')");
//        $stmt=$db->genelsorgu("SELECT * from haber where haber_ad  LIKE '%$text%' order by haber_Zaman DESC   limit 50");
        $search=Post::where('title_tr','LIKE','%'.$text.'%')->limit(30)->latest()->get();
//        $searchPost = DB::posts()->where('title_tr','LIKE','%'.$text.'%')->get();
//        $searchPost = User::where('name','LIKE',"%".$text."%")->get();
        $output = '<table id="example1" class="table datatable-responsive">
            <thead>
              <tr>
                <th>No</th>
                    <th>Haber Başlığı</th>
                    <th>Kategori</th>
                    <th>Bölge</th>
                    <th>Fotoğraf</th>
                    <th>Tarih</th>
                    <th class="text-center">Actions</th>

              </tr>
            </thead>
            <tbody id="sortable">';
        $i=0;
//        dd($search);
        foreach($search as $row)
        {
            $i++;
            $baslik=$row->title_tr;
            $foto=$row->image;

            $output .= ' <tr id="">
          <td>'.$i.'</td>
           <td class="sortable text-success">'.$baslik.'</td>
          <td>'.$row->category->category_tr.'</td>
          <td>'.$row->districts->district_tr.'</td>
          <td ><img width="100" src="'.asset($row->image).'"></td>
          <td>'.Carbon::parse($row->created_at)->diffForHumans().'</td>
               <td> </td>
                   <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="'.route('edit.post',$row).'" class="dropdown-item"><i class="icon-pencil6"></i> Düzenle</a>
                                    <a href="'.route('delete.post',$row).'"  class="dropdown-item"><i class="icon-trash"></i>Sil</a>
                                </div>
                            </div>
                        </div>
                    </td>';


        }


        return $output;



//        return view('backend.post.index', compact('search'));

//        return response()->json($baslik);
//        return response($baslik);

//        return  $baslik;


//        $output .= '</ul>';

//        return $searchPost->title_tr;
//        return $data = '<div class="col-md-12">'.$searchPost->title_tr.'</div>';
//        return \Response::json($searchPost);

//        return view('backend.post.index')->with('data', $searchPost);
//        return $searchPost= '  <table id="example1" class="table table-bordered table-striped">
//            <thead>
//              <tr>
//                <th align="center" width="5">#</th>
//                <th>Haber Görseli</th>
//                <th>Haber Başlığı</th>
//                <th width="150">Tarih</th>
//                <th width="150">Kategori</th>
//
//                <th></th>
//                <th></th>
//                <th></th>
//                <th></th>
//                <th>Durum</th>
//                <th>Resim İşlemleri</th>
//                <th></th>
//                <th></th>
//
//              </tr>
//            </thead>
//            <tbody id="sortable">
//            ';

    }
    //
    public function index()
    {
        $post = Post::leftjoin('categories', 'posts.category_id', '=', 'categories.id')
            ->leftjoin('subcategories', 'posts.subcategory_id', '=', 'subcategories.id')
            ->leftjoin('districts', 'posts.district_id', '=', 'districts.id')
            ->leftjoin('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
            ->select(['posts.*', 'categories.category_tr', 'districts.district_tr', 'subdistricts.subdistrict_tr'])
            ->latest('id')
            ->paginate(20);

        return view('backend.post.index', compact('post'));
    }

    public function AddPost()
    {

        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        $tags = Tag::orderBy('name', 'asc')->get();

        return view('backend.post.create', compact('category', 'district', 'tags'));
    }

    public function orderImagesPage($id)
    {
        $orderImages = DB::table('order_images')->where('haberId', '=', $id)->get();

        return view('backend.post.orderimagesPage', compact('orderImages', 'id'));
    }

    public function orderImagesUploadPage($id)
    {

        return view('backend.post.imageUpload', compact('id'));
    }

    public function CreatePosts(Request $request)
    {

        $validatedData = $request->validate(
            [

                'category_id' => 'required',
                'district_id' => 'required',
                'image' => 'required',

            ],
            [
                'category_id.required' => 'Kategori Seçimeniz Gerekmektedir.',
                'district_id.required' => 'Bölge Seçimi Yapmanız Gerekmektedir.',
                'image.required' => 'Fotoğraf Alanı Zorunludur',

            ]
        );


        $post = Post::create($request->all());

        $yil = Carbon::now()->year;
        $ay = Carbon::now()->month;
        if (file_exists('storage/postimg/' . $yil) == false) {
            mkdir('storage/postimg/' . $yil, 0777, true);
        }
        if (file_exists('storage/postimg/' . $yil . '/' . $ay) == false) {
            mkdir('storage/postimg/' . $yil . '/' . $ay, 0777, true);
        }

        $image = $request->image;
        if ($image) {
            $image_one = uniqid() . '.' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();

            $new_image_name = 'storage/postimg/' . $yil . '/' . $ay . '/' . $image_one;

            Image::make($image)->resize(800, 450)->fit(800, 450)->save($new_image_name,68,'jpeg');

            $post->image = $new_image_name;
        }

        $tagNames = explode(',', $request->get('tag')[0]);
        $tagIds = [];
        foreach ($tagNames as $tagName) {
//                    $post->tag()->create(['name'=>$tagName]);
            //Or to take care of avoiding duplication of Tag
            //you could substitute the above line as
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            if ($tag) {
                $tagIds[] = $tag->id;
            }

        }
        $post->tag()->sync($tagIds);

        $post->save();

        return Redirect()->route('all.post')->with([
            'message' => 'Haber Başarıyla Eklendi',
            'alert-type' => 'success'
        ]);
    }

    public function EditPosts(Post $post)
    {
//dd($post->id);

        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        $tags = Tag::join('post_tags', 'tags.id', '=', 'post_tags.tag_id')
            ->select(['tags.*', 'post_tags.tag_id'])
            ->where('post_tags.post_id', $post->id)
//            ->latest('created_at')
            ->get();
        $users =Auth::user()->id;
//        dd($post);
//        $tags = Tag::find($post->id);

//        $tags = Tag::orderBy('name','asc')->get();


        return view('backend.post.edit', compact('post', 'category', 'district', 'tags'));
    }

    public function UpdatePost(Request $request, Post $post)
    {

        $validatedData = $request->validate(
            [

                'category_id' => 'required',
                'district_id' => 'required',
                // 'image' => 'required',
            ],
            [
                'category_id.required' => 'Kategori Seçimeniz Gerekmektedir.',
                'district_id.required' => 'Bölge Seçimi Yapmanız Gerekmektedir.',
                // 'image.required' => 'Fotoğraf Alanı Zorunludur',
            ]
        );


        $post->fill($request->all()); // use fill function after validation!

        $yil = Carbon::now()->year;
        $ay = Carbon::now()->month;
        if (file_exists('storage/postimg/' . $yil) === false) {
            mkdir('storage/postimg/' . $yil, 0777, true);
        }
        if (file_exists('storage/postimg/' . $yil . '/' . $ay) === false) {
            mkdir('storage/postimg/' . $yil . '/' . $ay, 0777, true);
        }

        $image = $request->image;
        if ($image) { // if image is updating
            $image_one = uniqid() . '.' . $image->getClientOriginalName();

            $new_image_name = 'storage/postimg/' . $yil . '/' . $ay . '/' . $image_one;
            Image::make($image)->resize(800, 450)->fit(800, 450)->save($new_image_name,68,'jpeg');
            $post->image = $new_image_name; // set new image to the object, replace tmp image with new right path

            if (file_exists($request->old_image)) {
                unlink($request->old_image);
            }
        }

        $tagNames = explode(',', $request->get('tag')[0]); //
        $tagIds = [];
        foreach ($tagNames as $tagName) {
//                    $post->tag()->create(['name'=>$tagName]);
            //Or to take care of avoiding duplication of Tag
            //you could substitute the above line as
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            if ($tag) {
                $tagIds[] = $tag->id;
            }

        }
        $post['manset'] = $request->manset == null ? 0 : 1;
        $post['story'] = $request->story == null ? 0 : 1;
        $post['headline'] = $request->headline == null ? 0 : 1;
        $post['featured'] = $request->featured == null ? 0 : 1;
        $post['surmanset'] = $request->surmanset == null ? 0 : 1;
        $post['attentiontag'] = $request->attentiontag == null ? 0 : 1;
        $post['flahtag'] = $request->flahtag == null ? 0 : 1;
        $post['headlinetag'] = $request->headlinetag == null ? 0 : 1;

        $post->tag()->sync($tagIds);

        $post->save(); // then save the new data to db, save data and new image as well

        return Redirect()->route('all.post')->with([
            'message' => 'Haber Başarıyla Güncellendi',
            'alert-type' => 'success'
        ]);
    }

    public function ActivePost(Request $request, $id)
    {

        $update['status'] = $request->aktif;

        DB::table('posts')->where('id', $id)->update($update);


        if ($request->aktif == 1) {
            $notification = array(
                'message' => 'Haber Aktif',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Haber Pasif',
                'alert-type' => 'warning'
            );
        }
        return Redirect()->route('all.post')->with($notification);

    }

    public function DeletePost(Post $post)
    {

        if (file_exists($post->image)) {
            unlink($post->image);
        }
//DB::table('posts')->where('id',$id)->delete();
        $post->delete();
        $notification = array(
            'message' => 'Haber Başarıyla Silindi',
            'alert-type' => 'error'
        );
        return Redirect()->route('all.post')->with($notification);
    }


    public function GetSubCategory($category_id)
    {
        $sub = Subcategory::find($category_id)->get();
        if($sub) {
            return response()->json($sub);
        }
    }

    public function GetSubDistrict($district_id)
    {
        $districts = Subdistrict::where('district_id', $district_id)->get();

        return response()->json($districts);
    }

    public function fetchLike(Request $request)
    {
        $post = Post::find($request->blog);
        return response()->json([
            'post' => $post,
        ]);
    }



    //  public function OrderphotoUpload(Request $request, $id)
    //  {
    //
    //      $image = $request->file('file');
    //      $year = date("Y");
    //      $benzersiz = uniqid();
    //      $month = date("m");
    //      $imageName = time() . $benzersiz . '.' . $image->extension();
    //      $image->move(public_path('image/postimg/' . $year . '/' . $month . '/'), $imageName);
    //      $url = 'image/postimg/' . $year . '/' . $month . '/' . $imageName;
    //      DB::insert('insert into order_images (haberId, image) values (?, ?)', [$id, $url]);
    //
    //
    //      return response()->json(['success' => $imageName]);
    //
    //
    //  }
    //
    //  public function Orderphotoupdate(Request $request, $update, $id)
    //  {
    //      dd("update" . $request);
    //
    //  }
    //
    //  public function Orderphotodelete(Request $request, $id)
    //  {
    //
    //      $secilenSayi = count($request->urunfotosec);
    //      $images = $request->urunfotosec;
    //
    //
    //      foreach ($images as $image) {
    //
    //          DB::table('order_images')->where('id', '=', $image)->delete();
    //
    //      }
    //      return Redirect()->route('all.orderImagesPage',$id);
    //  }


}

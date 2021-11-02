<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Post;
use App\Models\Subcategory;
use App\Models\Subdistrict;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Image;
use Illuminate\Support\Str;


class PostController extends Controller
{
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

            Image::make($image)->resize(800, 600)->fit(800, 600)->save($new_image_name);
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
            Image::make($image)->resize(800, 600)->fit(800, 600)->save($new_image_name);
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
        return response()->json($sub);
    }

    public function GetSubDistrict($district_id)
    {
        $districts = Subdistrict::where('district_id', $district_id)->get();

        return response()->json($districts);
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

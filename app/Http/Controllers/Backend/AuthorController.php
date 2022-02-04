<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
//use PharIo\Manifest\Author;

class AuthorController extends Controller
{
    //

    public function index() {

        $authors= Authors::latest()->paginate();

        return view('backend.authors.listauthors',compact('authors'));

    }
    public function AddAuthors()
    {
        //$categories = Category::whereNull('parent_id')->get();

        return view('backend.authors.add_authors');
    }
    public function CreateAuthors(Request $request) {


        $data= array();
        $data['name']=$request->name;
        $data['mail']=$request->mail;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['youtube']=$request->youtube;
        $data['created_at'] = Carbon::now();

            $yil = Carbon::now()->year;
            $ay = Carbon::now()->month;
            if (file_exists('image/authors/' . $yil) == false) {
                mkdir('image/authors/' . $yil, 0777, true);
            }
            if (file_exists('image/authors/' . $yil . '/' . $ay) == false) {
                mkdir('image/authors/' . $yil . '/' . $ay, 0777, true);
            }
            $image = $request->image;
            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalName();

                Image::make($image)->resize(400, 400)->fit(400, 400)->save('image/authors/' . $yil . '/' . $ay . '/' . $image_one);
                $data['image'] = 'image/authors/' . $yil . '/' . $ay . '/' . $image_one;
//            DB::table('posts')->insert($data);
//                dd($data);
                Authors::create($data);

                $notification = array(
                    'message' => 'Yazar Başarıyla Eklendi',
                    'alert-type' => 'success'
                );
                return Redirect()->route('list.authors')->with($notification);
            } else {
//                Authors::create($request->all());

                return Redirect()->back();

            }


    }
    public function EditAuthors(Authors $authors) {

        return view('backend.authors.edit_authors',compact('authors'));

    }
    public function UpdateAuthors(Request $request, Authors $authors) {
        $data = $request->all();
//dd($request->all());
//        $data= array();
//        $data['name']=$request->name;
//        $data['mail']=$request->mail;
//        $data['facebook']=$request->facebook;
//        $data['twitter']=$request->twitter;
//        $data['youtube']=$request->youtube;
//        $data['created_at'] = Carbon::now();
        $old_image = $request->old_image;

        $yil = Carbon::now()->year;
        $ay = Carbon::now()->month;
        if (file_exists('image/authors/' . $yil) == false) {
            mkdir('image/authors/' . $yil, 0777, true);
        }
        if (file_exists('image/authors/' . $yil . '/' . $ay) == false) {
            mkdir('image/authors/' . $yil . '/' . $ay, 0777, true);
        }
        $image = $request->image;
        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalName();

            Image::make($image)->resize(200, 200)->save('image/authors/' . $yil . '/' . $ay . '/' . $image_one);
            $data['image'] = 'image/authors/' . $yil . '/' . $ay . '/' . $image_one;
//            DB::table('posts')->insert($data);
//                dd($data);
            Authors::find($authors->id)->update($data);
            if(file_exists($old_image)) {
                unlink($old_image);
            }
            $notification = array(
                'message' => 'Yazar Başarıyla Eklendi',
                'alert-type' => 'success'
            );
            return Redirect()->route('list.authors')->with($notification);
        } else {
//                Authors::create($request->all());
            $data['image'] = $old_image;
//        DB::table('posts')->where('id',$id)->update($data);
            $authors->update($data);

            $notification = array(
                'message' => 'Haber Başarıyla Güncellendi',
                'alert-type' => 'success'
            );
            // return Redirect()->back()->with($notification);
            return Redirect()->route('list.authors')->with($notification);

        }
    }
    public function DeleteAuthors(Authors $authors)
    {

//        $post = Post::find($post->id)->first();
//    $post=DB::table('posts')->where('id',$id)->first();

        if (file_exists($authors->image)) {
            unlink($authors->image);
        }
//DB::table('posts')->where('id',$id)->delete();
        $authors->delete();
        $notification = array(
            'message' => 'Yazar Başarıyla Silindi',
            'alert-type' => 'error'
        );
        return Redirect()->route('list.authors')->with($notification);
    }
    public function ActiveAuthors(Request $request, $id)
    {
        // $data = DB::table('subdistricts')->where('id', $id)->first();
        // $update= Array();
        $update['status'] = $request->aktif;

//        DB::table('posts')->where('id', $id)->update($update);
Authors::find($id)->update($update);

        if ($request->aktif == 1) {
            $notification = array(
                'message' => 'Yazar Aktif',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Yazar Pasif',
                'alert-type' => 'warning'
            );
        }
        return Redirect()->route('list.authors')->with($notification);
        // return view('backend.subdistrict.index', compact('subdistrict'));

        // return view('backend.subdistrict.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class CommentsController extends Controller
{
    public function adminCommentsindex()
    {
        $comments = \DB::table('comments')->orderByDesc("id")->get();
        return view('backend.Comments.index', compact('comments'));
    }

    public function ActiveComments(Request $request, $id)
    {

        $update['status'] = $request->aktif;

        Comments::where('id', $id)->update($update);
        if ($request->aktif == 1) {
            $notification = array(
                'message' => 'Yorum Aktif',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Yorum Pasif',
                'alert-type' => 'warning'
            );
        }
        return Redirect()->route('comments.index')->with($notification);
    }

    public function DeleteComments(Request $request, $id)
    {
        //        dd($id);
        Comments::find($id)->delete();
        $notification = array(
            'message' => 'Yorum Silindi',
            'alert-type' => 'warning'
        );
        return Redirect()->route('comments.index')->with($notification);
    }

    public function OpenComments(Request $request, $id)
    {
        $posts = DB::table('posts')->where('id', '=', $id)->get();
        $url = "/" . str_slug($posts[0]->title_tr) . "/" . $id . "/haberi";
        return Redirect::to($url);
    }

    public function AddComments(Request $request, $id)
    {

        $request->validate([
            'guvenlikkodu' => 'required',
            'guvenlik' => 'required',
            // add more validation rules for other fields
        ]);

        if ($request->guvenlikkodu == $request->guvenlik) {
            // filter the details field
            $details = strip_tags($request->details, '<p><br>');

            // create a new comment using the filtered details field
            Comments::create([
                'name' => $request->name,
                'details' => $details,
                'authors_posts_id' => $request->authors_posts_id,
            ]);

            $notification = array(
                'message' => 'Yorum Başarıyla Eklendi',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Yorum Eklenemedi',
                'alert-type' => 'error'
            );
        }

        return Redirect()->back()->with($notification);
    }
}

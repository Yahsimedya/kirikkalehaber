<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AuthorsPostController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\authorscommentsModel;
use App\Models\AuthorsPost;
use Redirect;


class AuthorsCommentsController extends Controller
{
    public function adminCommentsindex()
    {
        $comments = \DB::table('authorscomments')->orderByDesc("id")->get();
        return view('backend.AuthorsComments.index', compact('comments'));
    }

    public function ActiveComments(Request $request, $id)
    {

        $update['status'] = $request->aktif;

        \DB::table('authorscomments')->where('id', $id)->update($update);
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
        return Redirect()->route('authorscomments.index')->with($notification);
    }

    public function DeleteComments(Request $request, $id)
    {
//        dd($id);
        \DB::table('authorscomments')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Yorum Silindi',
            'alert-type' => 'warning'
        );
        return Redirect()->route('authorscomments.index')->with($notification);
    }

    public function OpenComments(Request $request, $id)
    {
        $posts = AuthorsPost::where('id', '=', $id)->get();
        $url = "/" . str_slug($posts[0]->title) . "/" . $id;

        return Redirect::to($url);
    }

    public function AddComments(Request $request, $id)
    {
        if ($request->guvenlikkodu == $request->guvenlik) {

            \DB::table('authorscomments')->insert($request->except('_token', 'guvenlikkodu','yorumicerik','guvenlik',));
            $notification = array(
                'message' => 'Haber Başarıyla Silindi',
                'alert-type' => 'succes'
            );
            return Redirect()->route('open.authorscomments', $id)->with($notification);
        } else {
            $notification = array(
                'message' => 'Haber Başarıyla Silindi',
                'alert-type' => 'error'
            );
            return Redirect()->route('open.authorscomments', $id)->with($notification);
        }

    }
}

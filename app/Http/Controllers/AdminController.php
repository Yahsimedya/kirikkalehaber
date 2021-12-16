<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\AuthorsPost;
class AdminController extends Controller
{
    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Çıkış Yapıldı');
    }
    // public function Login()
    // {
    //     Auth::login();
    //     return Redirect()->route('admin.index')->with('success' ,'Giriş Yapıldı');

    // }



    public function index(){
        $news=DB::table('posts')->get('id');
        $endNews=DB::table('posts')->limit(10)->latest('id')->get();
        $endComments=DB::table('comments')->limit(10)->latest('id')->get();
        $endAuthors_posts=AuthorsPost::leftjoin('authors', 'authors.id', '=', 'authors_posts.authors_id')
            ->select(['authors_posts.*', 'authors.name'])
            ->latest('created_at')
            ->paginate(10);
        $newsCount=count($news);
        $comments=DB::table('comments')->get('id');
        $commentsCount=$comments->count();
        $authors_posts=DB::table('authors_posts')->get('id');
        $authors_postsCount=$authors_posts->count();
        return view('admin.index',compact('newsCount','commentsCount','endNews','endComments','endAuthors_posts','authors_postsCount'));

    }
}

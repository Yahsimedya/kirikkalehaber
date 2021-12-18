<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\AuthorsPost;
//use CyrildeWit\EloquentViewable\View;
use CyrildeWit\EloquentViewable\Visitor;

use CyrildeWit\EloquentViewable\Support\Period;
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
        $endNews=Post::limit(4)->orderByViews('desc')->get();
//        $endNewsCount=Post::orderByUniqueViews()->latest()->get();
        $endComments=DB::table('comments')->limit(10)->latest('id')->get();
        $endAuthors_posts=AuthorsPost::leftjoin('authors', 'authors.id', '=', 'authors_posts.authors_id')
            ->select(['authors_posts.*', 'authors.name'])
            ->orderByViews('desc')
            ->paginate(10);
        $newsCount=count($news);
        $comments=DB::table('comments')->get('id');
        $commentsCount=$comments->count();
        $authors_posts=DB::table('authors_posts')->get('id');
        $posts = Post::all();
//        $hatirla= views($endNews[0]['id'])->period(Period::subHours(6))->remember()->count();

//        dd($endNews[0]['id']);
//        $posts = Post::all();
$i=0;
        foreach($endNews as $post) { $i++;
            $sayi[$i] = views($post)->period(Period::subHours(24))->count();
//            return $sayi;
        }
//                $count2 = views($sayi)->count();

//        $habersayi= $post;
//        dd($count2);

        $count = views(Post::class)->period(Period::subHours(24))->count();
        $countwrites = views(AuthorsPost::class)->period(Period::subHours(24))->count();
//        $count = views(Post::class)->count();

        $countTekil =views(Post::class)->period(Period::subHours(24))->unique()->count();

//$newVisitor= views(Post::class)
//    ->useVisitor(new Visitor()) // or app(Visitor::class)
//    ->record();
        $days=Carbon::today();

//        $peryot=Views::forViewable(Post::class)->countAndRemember();

//        dd($newVisitor);







//        dd($count);

//        $posts = Post::latest()->orderByUniqueViews()->paginate(20);

        $authors_postsCount=$authors_posts->count();
        return view('admin.index',compact('newsCount','commentsCount','endNews','endComments','endAuthors_posts','authors_postsCount','countTekil','countwrites','count'));

    }
}

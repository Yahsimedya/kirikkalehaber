<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Buki\AnadoluAgency;
use DOMAttr;
use DOMDocument;
use Illuminate\Http\Request;
use function Tinify\compressionCount;

//use App\Http\Controllers\Crawler;

class AnadoluAjansController extends Controller
{
    public function add(Request $request)
    {
        //  dd($request->sehir);
        $anadoluajans = \DB::table('anadoluajans')->get();
        $username = $anadoluajans[0]->username;
        $password = $anadoluajans[0]->password;
        $crawler = new \BilginPro\Agency\Aa\Crawler([
            'user_name' => $username,
            'password' => $password
        ]);

        $news = $crawler->crawl([
            "start_date" => "2021a-09-16T00:00:00Z",


        ]);

        if ($news == []) {
            $message = "Yeni Haber Yok";
            return view('backend.anadoluajans.index', compact('message'));

            // kullanım şekli  dd($newss['0']['title']);
            // $count = count($news);
        } else {


            $dom = new DOMDocument();

            $dom->encoding = 'utf-8';

            $dom->xmlVersion = '1.0';

            $dom->formatOutput = true;

            $xml_file_name = 'anadoluajans.xml';

            $root = $dom->createElement('anadoluajans');
            $movie_node = $dom->createElement('haber');


            $child_node_title = $dom->createElement('title', "");

            $movie_node->appendChild($child_node_title);

            $child_node_year = $dom->createElement('content', "");

            $movie_node->appendChild($child_node_year);

            $child_node_genre = $dom->createElement('created_at', "");

            $movie_node->appendChild($child_node_genre);

            $child_node_ratings = $dom->createElement('city', "");


            $movie_node->appendChild($child_node_ratings);

            $root->appendChild($movie_node);

            $dom->appendChild($root);
            for ($i = 0; $i <= count($news) - 1; $i++) {


                $movie_node = $dom->createElement('haber');


                $child_node_title = $dom->createElement('title', $news[$i]->title);

                $movie_node->appendChild($child_node_title);

                $child_node_year = $dom->createElement('content', $news[$i]->content);

                $movie_node->appendChild($child_node_year);

                $child_node_genre = $dom->createElement('created_at', $news[$i]->created_at);

                $movie_node->appendChild($child_node_genre);

                $child_node_ratings = $dom->createElement('city', $news[$i]->city);


                $movie_node->appendChild($child_node_ratings);

                $child_node_images = $dom->createElement('images', $news[$i]->images == null
                    ? "" :
                    $news[$i]->images[0]
                );


                $movie_node->appendChild($child_node_images);


                $root->appendChild($movie_node);

                $dom->appendChild($root);
            }
            $dom->save($xml_file_name);

            $xmlDataString = file_get_contents(public_path('anadoluajans.xml'));


            $xml = simplexml_load_string($xmlDataString);
            $json = json_encode($xml);
            $array = json_decode($json, TRUE);

            $newss = array();
            $ison = 0;

            if ($array != []) {
                $ison = count($array['haber']);
                if ($request->sehir != "all") {
                    for ($i = 0; $i <= $ison - 1; $i++) {

                        if ($array['haber'][$i]['city'] == $request->sehir) {
                            $newss[$i]["title"] = $array['haber'][$i]['title'];
                            $newss[$i]["content"] = $array['haber'][$i]['content'];
                            $newss[$i]["created_at"] = $array['haber'][$i]['created_at'];
                            $newss[$i]["city"] = $array['haber'][$i]['city'];
                        }


                    }
                } else {
                    for ($i = 0; $i <= $ison - 1; $i++) {


                        $newss[$i]["title"] = $array['haber'][$i]['title'];
                        $newss[$i]["content"] = $array['haber'][$i]['content'];
                        $newss[$i]["created_at"] = $array['haber'][$i]['created_at'];
                        $newss[$i]["city"] = $array['haber'][$i]['city'];

                    }
                }


            $yeni = count($newss);

            $category = Category::latest()->paginate(20);

            return view('backend.anadoluajans.index', compact('newss', 'yeni', 'category'));
        }
    else {
        return view('backend.anadoluajans.index');
    }
    }
}


public
function index()
{

    $xmlDataString = file_get_contents(public_path('anadoluajans.xml'));


    $xml = simplexml_load_string($xmlDataString);
    $json = json_encode($xml);
    $array = json_decode($json, TRUE);

    $newss = array();

    $ison = count($array['haber']);

    if ($array != []) {


        for ($i = 0; $i <= $ison - 1; $i++) {

            $newss[$i]["title"] = $array['haber'][$i]['title'];
            $newss[$i]["content"] = $array['haber'][$i]['content'];
            $newss[$i]["created_at"] = $array['haber'][$i]['created_at'];
            $newss[$i]["city"] = $array['haber'][$i]['city'];


        }
        $yeni = count($array['haber']);

        $category = Category::latest()->paginate(20);
        return view('backend.anadoluajans.index', compact('newss', 'yeni', 'category'));
    } else {
        return view('backend.anadoluajans.index');
    }
}


public
function insert(Request $request)
{
    Post::insert($request->except('_token','botinsert'));

    return Redirect()->route('anadoluajans.index')->with([
        'message' => 'Haber Başarıyla Eklendi',
        'alert-type' => 'success'
    ]);;

}

public
function Editpage($id)
{
    $editiha = \DB::table('anadoluajans')->where('id', '=', $id)->get();
    $data = $editiha[0];
    return view('backend.anadoluajans.settingAA.edit', compact('data'));
}

public
function Settingindex()
{
    $setting = \DB::table('anadoluajans')->get();
    $sayi = \DB::table('anadoluajans')->count('id');

    return view('backend.anadoluajans.settingAA.settingindex', compact('setting', 'sayi'));
}


public
function UserAdd(Request $request)
{
    $anadoluajans = array();

    $anadoluajans['username'] = $request->username;
    $anadoluajans['password'] = $request->password;


    \DB::table('anadoluajans')->insert($anadoluajans);

    $notification = array(
        'message' => 'Kullanıcı Başarıyla Eklendi',
        'alert-type' => 'success'
    );
    return redirect()->route('anadoluajans.settingindex');

}

public
function Userupdate(Request $request)
{

    $anadoluajans = array();
    $anadoluajans['username'] = $request->username;
    $anadoluajans['password'] = $request->password;


    \DB::table('anadoluajans')->where('id', '=', $request->id)->update($anadoluajans);

    $notification = array(
        'message' => 'Kullanıcı Başarıyla Güncellendi',
        'alert-type' => 'success'
    );

//	*Yhsmedya88    3005498
    return redirect()->route('anadoluajans.settingindex');

}

}

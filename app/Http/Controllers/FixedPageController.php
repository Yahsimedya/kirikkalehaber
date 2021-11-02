<?php

namespace App\Http\Controllers;


use App\Models\FixedPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FixedPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $fixedPage = DB::table('fixedpage')->latest('id')->get();// fixedpage::get('id')->paginate(20);

        return view('backend.fixedpage.index', compact('fixedPage'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('backend.fixedpage.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['keyword'] = $request->keyword;
        $data['description'] = $request->description;
        DB::table('fixedpage')->insert($data);
        $notification = array(
            'message' => 'Sayfa Başarıyla Eklendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('fixedpage.index')->with($notification);

    }


    public function editPage($id)
    {
        $edits = DB::table('fixedpage')->where('id','=',$id)->latest('id')->get();
       $edit=$edits[0];

        return view('backend.fixedpage.edit', compact('edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data= array();
        $data['title'] =$request->title;
        $data['content'] =$request->content;
        $data['keyword'] =$request->keyword;
        $data['description'] =$request->description;
        DB::table('fixedpage')->where('id',$id)->update($data);


        $notification = array(
            'message' => 'Kategori Başarıyla Güncellendi',
            'alert-type' => 'success'
        );
        return redirect()->route('fixedpage.index')->with($notification);
    }


    public function status(Request $request, $id)
    {
        $data = DB::table('fixedpage')->where('id', $id)->first();
        $update['status'] = $request->aktif;

        DB::table('fixedpage')->where('id', $id)->update($update);
        if ($request->aktif == 1) {
            $notification = array(
                'message' => 'Sayfa Aktif Yapıldı',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Sayfa  Pasif Yapıldı',
                'alert-type' => 'warning'
            );
        }
        return Redirect()->route('fixedpage.index')->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('fixedpage')->delete($id, '=', 'id');


        $notification = array(
            'message' => 'Sayfa Başarıyla Silindi',
            'alert-type' => 'success'
        );

        return Redirect()->route('fixedpage.index')->with($notification);
    }
}

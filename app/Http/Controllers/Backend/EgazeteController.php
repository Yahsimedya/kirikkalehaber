<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Gazetesayis;

class EgazeteController extends Controller
{
    public function index()
    {
        $gazeteler = Gazetesayis::latest('id')->get();// fixedpage::get('id')->paginate(20);

        return view('backend.egazete.index', compact('gazeteler'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('backend.egazete.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eGazete = Gazetesayis::create($request->all());
        $yil = Carbon::now()->year;
        $ay = Carbon::now()->month;
        if (file_exists('storage/egazete/' . $yil) == false) {
            mkdir('storage/egazete/' . $yil, 0777, true);
        }
        if (file_exists('storage/egazete/' . $yil . '/' . $ay) == false) {
            mkdir('storage/egazete/' . $yil . '/' . $ay, 0777, true);
        }

        $image = $request->image;
        if ($image) {
            $image_one = uniqid() . '.' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();

            $new_image_name = 'storage/egazete/' . $yil . '/' . $ay . '/' . $image_one;

            Image::make($image)->save($new_image_name, 68, 'jpg');

            $eGazete->image = $new_image_name;
        }

        $eGazete->save();


        return Redirect()->route('egazete.index');

    }


    public function editPage($id)
    {
        $edits = Gazetesayis::where('id', '=', $id)->latest('id')->get();
        $edit = $edits[0];

        return view('backend.egazete.edit', compact('edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Gazetesayis $post)
    {
        //  $post=$request->except('_token');
        $post->fill($request->all());
        $yil = Carbon::now()->year;
        $ay = Carbon::now()->month;
        if (file_exists('storage/egazete/' . $yil) === false) {
            mkdir('storage/egazete/' . $yil, 0777, true);
        }
        if (file_exists('storage/egazete/' . $yil . '/' . $ay) === false) {
            mkdir('storage/egazete/' . $yil . '/' . $ay, 0777, true);
        }

        $image = $request->image;
        if ($image) { // if image is updating
            $image_one = uniqid() . '.' . $image->getClientOriginalName();

            $new_image_name = 'storage/egazete/' . $yil . '/' . $ay . '/' . $image_one;
            Image::make($image)->save($new_image_name, 68, 'jpg');
            $post->image = $new_image_name; // set new image to the object, replace tmp image with new right path

            if (file_exists($request->old_image)) {
                unlink($request->old_image);
            }
        }
        $post->save();

        $notification = array(
            'message' => 'Kategori Başarıyla Güncellendi',
            'alert-type' => 'success'
        );
        return redirect()->route('egazete.index')->with($notification);
    }


    public function status(Request $request, $id)
    {
        $data = Gazetesayis::where('id', $id)->first();
        $update['status'] = $request->aktif;

        Gazetesayis::where('id', $id)->update($update);
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
        return Redirect()->route('egazete.index')->with($notification);
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
        Gazetesayis::where('id', $id)->delete();
        $notification = array(
            'message' => 'Sayfa Başarıyla Silindi',
            'alert-type' => 'success'
        );

        return Redirect()->route('egazete.index')->with($notification);
    }
}

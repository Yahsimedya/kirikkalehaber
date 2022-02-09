<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Photocategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Image;

class GalleryController extends Controller
{
public function updatephoto(Request $request, Photo $foto) {
//return "geldi";
//    dd($request->all());
    $foto->fill($request->all()); // use fill function after validation!

    $yil = Carbon::now()->year;
    $ay = Carbon::now()->month;
    if (file_exists('storage/photogallery/' . $yil) === false) {
        mkdir('storage/photogallery/' . $yil, 0777, true);
    }
    if (file_exists('storage/photogallery/' . $yil . '/' . $ay) === false) {
        mkdir('storage/photogallery/' . $yil . '/' . $ay, 0777, true);
    }

    $image = $request->file('file');
    if ($image) { // if image is updating
        $image_one = uniqid() . '.' . $image->getClientOriginalName();

        $new_image_name = 'storage/photogallery/' . $yil . '/' . $ay . '/' . $image_one;
        Image::make($image)->resize(800, 450)->fit(800, 450)->save($new_image_name, 68, 'jpeg');
        $foto->photo = $new_image_name; // set new image to the object, replace tmp image with new right path

        if (file_exists($request->old_image)) {
            unlink($request->old_image);
        }
    }
    $foto->save(); // then save the new data to db, save data and new image as well

    return Redirect()->route('all.post')->with([
        'message' => 'Haber Başarıyla Güncellendi',
        'alert-type' => 'success'
    ]);
}
    public function PhotoGalery()
    {
        //  $photo = DB::table('photocategories')->get();

        $photo = DB::table('photos')->groupBy('photocategory_id')
            ->orderBy('created_at', 'desc')->paginate(20);

        //  $photo = DB::table('photocategories')
        //  ->join('photos','photocategories.id','photos.photocategory_id')
        //  ->select('photos.*','photocategories.category_title')
        // //  ->where('photocategory_id', $cat->id)
        //  ->orderBy('created_at', 'desc')->paginate(20);
        return view('backend.galery.photos', compact('photo'));
    }

    public function AddPhotoGalery()
    {
        $photocategory = DB::table('photocategories')->get();

        return view('backend.galery.createphoto', compact('photocategory'));
    }

    public function GaleryDetailAdd($id)
    {
//        dd($id);
//        $photocategory = DB::table('photocategories')->get();
        $photocategory = DB::table('photos')->where('photocategory_id', $id)->first();

//dd($photocategory);
        return view('backend.galery.add_photo', compact('photocategory'));
    }

    public function CreatePhoto(Request $request)
    {


        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['photocategory_id'] = $request->photocategory_id;
        $data['keywords_tr'] = $request->keywords_tr;
        $data['keywords_en'] = $request->keywords_en;
        $data['description_tr'] = $request->description_tr;
        $data['photo_text'] = $request->photo_text;
        $data['description_en'] = $request->description_en;
        $data['created_at'] = Carbon::now();

        $yil = Carbon::now()->year;
        $ay = Carbon::now()->month;
        if (file_exists('storage/photogallery/' . $yil) == false) {
            mkdir('storage/photogallery/' . $yil, 0777, true);
        }
        if (file_exists('storage/photogallery/' . $yil . '/' . $ay) == false) {
            mkdir('storage/photogallery/' . $yil . '/' . $ay, 0777, true);
        }
        $image = $request->photo;
        if ($image) {
            foreach ($image as $img) {
                # code...

                $image_one = uniqid() . '.' . $img->getClientOriginalName();

                Image::make($img)->resize(800, 600)->fit(800, 600)->save('storage/photogallery/' . $yil . '/' . $ay . '/' . $image_one);
                $data['photo'] = 'storage/photogallery/' . $yil . '/' . $ay . '/' . $image_one;
                DB::table('photos')->insert($data);
                $notification = array(
                    'message' => 'Fotoğraf Başarıyla Eklendi',
                    'alert-type' => 'success'
                );
            }
            return Redirect()->route('photo.galery')->with($notification);
        } else {
            DB::table('photos')->insert($data);
            return Redirect()->route('photo.galery');
        }
    }

    public function GaleryUpdate(Request $request)
    {

        $data = array();
        $id = $request->id;
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['photocategory_id'] = $request->photocategory_id;
        $data['keywords_tr'] = $request->keywords_tr;
        $data['keywords_en'] = $request->keywords_en;
        $data['photo_text'] = $request->photo_text;
        $data['description_tr'] = $request->description_tr;
        $data['description_en'] = $request->description_en;
        $data['created_at'] = Carbon::now();

        $yil = Carbon::now()->year;
        $ay = Carbon::now()->month;
        if (file_exists('storage/photogallery/' . $yil) == false) {
            mkdir('storage/photogallery/' . $yil, 0777, true);
        }
        if (file_exists('storage/photogallery/' . $yil . '/' . $ay) == false) {
            mkdir('storage/photogallery/' . $yil . '/' . $ay, 0777, true);
        }
        $image = $request->photo;
        if ($image) {
            foreach ($image as $img) {
                # code...

                $image_one = uniqid() . '.' . $img->getClientOriginalName();

                Image::make($img)->resize(800, 600)->fit(800, 600)->save('storage/photogallery/' . $yil . '/' . $ay . '/' . $image_one);
                $data['photo'] = 'storage/photogallery/' . $yil . '/' . $ay . '/' . $image_one;
                DB::table('photos')->where('id', $id)->update($data);
                $notification = array(
                    'message' => 'Fotoğraf Başarıyla Eklendi',
                    'alert-type' => 'success'
                );
            }
            return Redirect()->route('photo.galery')->with($notification);
        } else {
            DB::table('photos')->where('id', $id)->update($data);
            return Redirect()->route('photo.galery');
        }
    }

    public function GaleryDetail($id)
    {

        $photos = DB::table('photos')->where('photocategory_id', $id)->get();
        return view('backend.galery.galery_photo', compact('photos'));
    }

    public function AddText(Request $request, $id)
    {

        //  dd($request);
        $data = array();
        $data['photo_text'] = $request->photo_text;
        $id = $request->fotogaleri_fotoid;

        $i = -1;
        foreach ($request->photo_text as $yazi) {
            $i++;
            $data['photo_text'] = $yazi;
            DB::table('photos')->where('id', $id[$i])->update($data);
        }
        $notification = array(
            'message' => 'Fotoğraf Başarıyla Eklendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('photo.galery')->with($notification);


    }

    public function ActivePhotoGalery(Request $request, $id)
    {
        $data = DB::table('photos')->where('id', $id)->first();
        // $update= Array();
        $update['status'] = $request->aktif;

        DB::table('photos')->where('id', $id)->update($update);


        if ($request->aktif == 1) {
            $notification = array(
                'message' => 'Foto Galeri Aktif Yapıldı',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Foto Galeri  Pasif Yapıldı',
                'alert-type' => 'warning'
            );
        }
        return Redirect()->route('photo.galery')->with($notification);
        // return view('backend.subcategory.index', compact('subcategory'));

        // return view('backend.subcategory.index');
    }

    public function DeleteGalery($id)
    {


        $photos = DB::table('photos')->where('photocategory_id', $id)->get();


        for ($i = 0; $i < count($photos); $i++) {
            // dd($photos[$i]->photo);
            unlink($photos[$i]->photo);
        }
        DB::table('photos')->where('photocategory_id', $id)->delete();
        $notification = array(
            'message' => 'Galeri Başarıyla Silindi',
            'alert-type' => 'success'
        );
        return Redirect()->route('photo.galery')->with($notification);

    }

    public function EditPhotoGalery($photocategory_id)
    {
        $galery = DB::table('photos')->where('id', $photocategory_id)->first();
        $photocategory = DB::table('photocategories')->get();

        return view('backend.galery.edit', compact('galery', 'photocategory'));
    }

    public function DeletePhoto($id)
    {
        $photo = DB::table('photos')->where('id', $id)->first();

        //unlink($photo->photo);
        DB::table('photos')->where('id', $id)->delete();
        return Redirect()->back();

    }

}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Photocategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleryCategoryController extends Controller
{
    //
    public function index()
    {
//       $category = DB::table('photocategories')->paginate(20);
       $category = Photocategory::latest('created_at')->paginate(20);
    // $category = DB::table('photocategories')
        // ->join('photos','photocategory.id','photocategory.id')
        // ->select('photocategories.*','photos.photo')
        // ->latest()->paginate(5);
       return view('backend.galerycategory.index', compact('category'));
    }
    public function AddCategory()
    {
        return view('backend.galerycategory.create');
    }
    public function CreateCategory(Request $request)
    {
        $validatedData = $request->validate(
            [
                'category_title' => 'required|unique:photocategories|max:255',

            ],
            [
                'category_title.required' => 'Türkçe kategori ismi boş olamaz lütfen doldurunuz',

            ]
        );

        Photocategory::create($request->all());

//        $data = array();
//        $data['category_title'] = $request->category_title;
//        $data['keywords_tr'] = $request->keywords_tr;
//        $data['description_tr'] = $request->description_tr;
//        $data['keywords_en'] = $request->keywords_en;
//        $data['description_en'] = $request->description_en;
//        $data['created_at'] = Carbon::now();
//
//        DB::table('photocategories')->insert($data);
        $notification = array(
            'message' => 'Galeri Kategori Başarıyla Eklendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('galeri.categories')->with($notification);
    }
    public function EditCategory(Photocategory $photocategory)
    {
        // $data =DB::table('categories')->find($id);
//        $kategori = DB::table('photocategories')->where('id', $id)->first();

        return view('backend.galerycategory.edit', compact('photocategory'));
    }
    public function UpdateCategory(Request $request, Photocategory $photocategory)
    {
        $validatedData = $request->validate(
            [
                'category_title' => 'required|unique:photocategories|max:255',

            ],
            [
                'category_title.required' => 'Türkçe kategori ismi boş olamaz lütfen doldurunuz',

            ]
        );

$photocategory->update($request->all());

        $notification = array(
            'message' => 'Galeri Kategori Başarıyla Eklendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('galeri.categories')->with($notification);
    }
    public function DeleteCategory(Photocategory $photocategory)
    {
$photocategory->delete();
        $notification = array(
            'message' => 'Galeri Kategori Başarıyla Silindi',
            'alert-type' => 'success'
        );
        return Redirect()->route('galeri.categories')->with($notification);

    }
    public function ActiveGalery(Request $request,$id)
    {

        $data = DB::table('photocategories')->where('id', $id)->first();
        // $update= Array();
        $update['status'] = $request->aktif;

         DB::table('photocategories')->where('id',$id)->update($update);


        if ($request->aktif==1) {
            $notification = array(
                'message' => 'Foto Kategori Aktif Yapıldı',
                'alert-type' => 'success'
            );
        } else {
        $notification = array(
            'message' => 'Foto Kategori  Pasif Yapıldı',
            'alert-type' => 'warning'
        );
    }
        return Redirect()->route('galeri.categories')->with($notification);
        // return view('backend.subcategory.index', compact('subcategory'));

        // return view('backend.subcategory.index');
    }
}

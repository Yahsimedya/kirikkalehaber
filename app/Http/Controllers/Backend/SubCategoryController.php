<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SubCategoryController extends Controller
{
    public function index()
    {
//        $subcategory = DB::table('subcategories')
//        ->leftjoin('categories','subcategories.category_id','categories.id')
//        ->select('subcategories.*','categories.category_tr')
//        ->orderBy('created_at', 'desc')->paginate(20);
        $subcategory = Subcategory::leftjoin('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select(['subcategories.*', 'categories.category_tr'])->paginate(20);
//        return $this->hasOne(User::class,'id','user_id');
        return view('backend.subcategory.index', compact('subcategory'));
    }

    public function AddSubCategory()
    {
        //$categories = DB::table('categories')->orderBy('category_tr', 'asc')->get();
        $categories = Category::latest()->orderBy('id')->latest()->get();

        return view('backend.subcategory.create', compact('categories'));
    }

    public function CreateSubCategory(Request $request)
    {
        $validatedData = $request->validate(
            [
                'subcategory_tr' => 'required|unique:subcategories|max:255',
                'subcategory_en' => 'required|unique:subcategories|max:255',
                'subcategory_keywords' => 'required|max:255',
                'subcategory_description' => 'required|max:255',
            ],
            [
                'subcategory_tr.required' => 'Türkçe kategori ismi boş olamaz lütfen doldurunuz',
                'subcategory_tr.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'subcategory_tr.max' => 'İsim 255 karakterden büyük olamaz',
                'subcategory_en.required' => 'İngilizce kategori ismi boş olamaz lütfen doldurunuz',
                'subcategory_en.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'subcategory_en.max' => 'İsim 255 karakterden büyük olamaz',
                'subcategory_keywords.required' => 'Alan boş olamaz lütfen doldurunuz',
                'subcategory_keywords.max' => '255 karakterden büyük olamaz',
                'subcategory_description.required' => 'Alan boş olamaz lütfen doldurunuz',
                'subcategory_description' => '255 karakterden büyük olamaz',
            ]
        );

        Subcategory::create($request->all());


        $notification = array(
            'message' => 'Kategori Başarıyla Eklendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('subcategories')->with($notification);
    }

    public function EditSubCategory(Subcategory $subcategory)
    {
        // $data =DB::table('categories')->find($id);
        $category = Category::get();
//        $data = DB::table('subcategories')->where('id', $id)->first();
//        $categories = DB::table('categories')->get();

        return view('backend.subcategory.edit', compact('subcategory','category'));
    }

    public function UpdateSubCategory(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'subcategory_tr' => 'required||max:255',
                'subcategory_keywords' => 'required|max:255',
                'subcategory_description' => 'required|max:255',
            ],
            [

            ]
        );

        Subcategory::find($id)->update($request->all());


        $notification = array(
            'message' => 'Alt Kategori Başarıyla Eklendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('subcategories')->with($notification);
    }

    public function ActiveSubCategory(Request $request, $id)
    {
        $data = DB::table('subcategories')->where('id', $id)->first();
        // $update= Array();
        $update['subcategory_status'] = $request->aktif;

        DB::table('subcategories')->where('id', $id)->update($update);


        if ($request->aktif == 1) {
            $notification = array(
                'message' => 'Alt Kategori Aktif Yapıldı',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Alt Kategori  Pasif Yapıldı',
                'alert-type' => 'warning'
            );
        }
        return Redirect()->route('subcategories')->with($notification);
        // return view('backend.subcategory.index', compact('subcategory'));

        // return view('backend.subcategory.index');
    }

    public function DeleteSubCategory(Subcategory $subcategory)
    {
//        $category = Subcategory::find($id)->delete();
        $subcategory->delete();

//        DB::table('subcategories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Alt Kategori Başarıyla Silindi',
            'alert-type' => 'error'
        );
        return Redirect()->route('subcategories')->with($notification);
    }
}

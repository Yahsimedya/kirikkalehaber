<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->paginate(20);
        // $category = DB::table('categories')->orderBy('created_at', 'desc')->paginate(20);


        return view('backend.category.index', compact('category'));
    }

    public function AddCategory()
    {
        //$categories = Category::whereNull('parent_id')->get();

        return view('backend.category.create');
    }

    public function CreateCategory(Request $request)
    {
        $validatedData = $request->validate(
            [
                'category_tr' => 'required|unique:categories|max:255',
                'category_en' => 'required|unique:categories|max:255',
                'category_keywords' => 'required|max:255',
                'category_description' => 'required|max:255',
            ],
            [
                'category_tr.required' => 'Türkçe kategori ismi boş olamaz lütfen doldurunuz',
                'category_tr.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'category_tr.max' => 'İsim 255 karakterden büyük olamaz',
                'category_en.required' => 'İngilizce kategori ismi boş olamaz lütfen doldurunuz',
                'category_en.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'category_en.max' => 'İsim 255 karakterden büyük olamaz',
                'category_keywords.required' => 'Alan boş olamaz lütfen doldurunuz',
                'category_keywords.max' => '255 karakterden büyük olamaz',
                'category_description.required' => 'Alan boş olamaz lütfen doldurunuz',
                'category_description' => '255 karakterden büyük olamaz',
            ]
        );

        Category::create($request->all());


        $notification = array(
            'message' => 'Kategori Başarıyla Eklendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('categories')->with($notification);
    }

    public function EditCategory(Category $category)
    {
//        $categories = Category::whereNull('parent_id')->get();
        return view('backend.category.edit', compact('category'));
    }

    //Change Category status
    public function ActiveCategory(Request $request, $id)
    {

        $data = DB::table('categories')->where('id', $id)->first();
        $update['category_status'] = $request->aktif;

        DB::table('categories')->where('id', $id)->update($update);
        if ($request->aktif == 1) {
            $notification = array(
                'message' => 'Kategori Aktif Yapıldı',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Kategori  Pasif Yapıldı',
                'alert-type' => 'warning'
            );
        }
        return Redirect()->route('categories')->with($notification);
    }

    public function UpdateCategory(Request $request, Category $category)
    {
        $validatedData = $request->validate(
            [
                'category_tr' => 'required|unique:categories,category_tr,' . $category->id . '|max:255',
                'category_en' => 'required|unique:categories,category_en,' . $category->id . '|max:255',
                'category_keywords' => 'required|max:255',
                'category_description' => 'required|max:255',
            ],
            [
                'category_tr.required' => 'Türkçe kategori ismi boş olamaz lütfen doldurunuz',
                'category_tr.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'category_tr.max' => 'İsim 255 karakterden büyük olamaz',
                'category_en.required' => 'İngilizce kategori ismi boş olamaz lütfen doldurunuz',
                'category_en.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'category_en.max' => 'İsim 255 karakterden büyük olamaz',
                'category_keywords.required' => 'Alan boş olamaz lütfen doldurunuz',
                'category_keywords.max' => '255 karakterden büyük olamaz',
                'category_description.required' => 'Alan boş olamaz lütfen doldurunuz',
                'category_description' => '255 karakterden büyük olamaz',
            ]
        );

        $category->Update($request->all());
//        Category::Update($request->all());
        $notification = array(
            'message' => 'Kategori Başarıyla Güncellendi',
            'alert-type' => 'success'
        );
        return redirect()->route('categories')->with($notification);
    }

    public function DeleteCategory(Category $category)
    {
        $category->delete();

        $notification = array(
            'message' => 'Kategori Başarıyla Silindi',
            'alert-type' => 'success'
        );

        return Redirect()->route('categories')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    //
    public function index()
    {
$district = DB::table('districts')->latest('id')->get();
        return view('backend.district.index', compact('district'));
    }
    public function AddDistrict()
    {
        return view('backend.district.create');
    }
    public function CreateDistrict(Request $request)
    {
        $validatedData = $request->validate(
            [
                'district_tr' => 'required|unique:districts|max:255',
                'district_en' => 'required|unique:districts|max:255',
                'district_keywords' => 'required|max:255',
                'district_description' => 'required|max:255',
            ],
            [
                'district_tr.required' => 'Türkçe Bölge ismi boş olamaz lütfen doldurunuz',
                'district_tr.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'district_tr.max' => 'İsim 255 karakterden büyük olamaz',
                'district_en.required' => 'İngilizce Bölge ismi boş olamaz lütfen doldurunuz',
                'district_en.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'district_en.max' => 'İsim 255 karakterden büyük olamaz',
                'district_keywords.required' => 'Alan boş olamaz lütfen doldurunuz',
                'district_keywords.max' => '255 karakterden büyük olamaz',
                'district_description.required' => 'Alan boş olamaz lütfen doldurunuz',
                'district_description' => '255 karakterden büyük olamaz',
            ]
        );

District::create($request->all());

        $notification = array(
            'message' => 'Bölge Başarıyla Eklendi',
            'alert-type' => 'success'
        );
        return redirect()->route('district')->with($notification);
    }
    public function ActiveDistrict(Request $request, $id)
    {
        $data = DB::table('districts')->where('id', $id)->first();
        $update['district_status'] = $request->aktif;

        DB::table('districts')->where('id', $id)->update($update);


        if ($request->aktif == 1) {
            $notification = array(
                'message' => 'Bölge Aktif Yapıldı',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Bölge  Pasif Yapıldı',
                'alert-type' => 'warning'
            );
        }
        return Redirect()->route('district')->with($notification);

    }
    public function Editdistrict(District $district)
    {


        return view('backend.district.edit', compact('district'));
    }
    public function UpdateDistrict(Request $request,District $district)
    {
        $validatedData = $request->validate(
            [
                'district_tr' => 'required|max:255',
                'district_en' => 'required|max:255',
                'district_keywords' => 'required|max:255',
                'district_description' => 'required|max:255',
            ],
            [
                'district_tr.required' => 'Türkçe Bölge ismi boş olamaz lütfen doldurunuz',
                'district_tr.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'district_tr.max' => 'İsim 255 karakterden büyük olamaz',
                'district_en.required' => 'İngilizce Bölge ismi boş olamaz lütfen doldurunuz',
                'district_en.unique' => 'Bu isimle daha önce kayıt yapılmış',
                'district_en.max' => 'İsim 255 karakterden büyük olamaz',
                'district_keywords.required' => 'Alan boş olamaz lütfen doldurunuz',
                'district_keywords.max' => '255 karakterden büyük olamaz',
                'district_description.required' => 'Alan boş olamaz lütfen doldurunuz',
                'district_description' => '255 karakterden büyük olamaz',
            ]
        );

$district->update($request->all());

        $notification = array(
            'message' => 'Bölge Başarıyla Güncellendi',
            'alert-type' => 'success'
        );
        return Redirect()->route('district')->with($notification);
    }
    public function DeleteDistrict(District $district)
    {
        $district->delete();
        $notification = array(
            'message' => 'Bölge Başarıyla Silindi',
            'alert-type' => 'success'
        );
        return Redirect()->route('district')->with($notification);

    }
}

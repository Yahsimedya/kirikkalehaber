<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SettingController extends Controller
{
    //
    public function SocialSetting()
    {
       $social =DB::table('socials')->first();
       return view('backend.setting.social',compact('social'));

    }
    public function UpdateSocial(Request $request, $id)
    {
        $data= array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;


        DB::table('socials')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'Sosyal Medya Linkleri Başarıyla Eklendi',
            'alert-type' => 'info'
        );
        return redirect()->route('social.setting')->with($notification);
    }
    public function SeoSetting()
    {
        $seos =DB::table('seos')->first();

        return view('backend.setting.seo',compact('seos'));


    }
    public function UpdateSeo(Request $request, $id)
    {
        $data= array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;


        DB::table('seos')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'SEO Ayarları Başarıyla Kaydedildi',
            'alert-type' => 'success'
        );
        return redirect()->route('seo.setting')->with($notification);
    }
}

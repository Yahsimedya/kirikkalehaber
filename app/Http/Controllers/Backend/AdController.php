<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class AdController extends Controller
{
    //
    public function Listads()
    {
//$ads= Ad::paginate(20);
//$ads=DB::table('ads')->get();
        $ads = Ad::leftjoin('ad_categories', 'ad_categories.id', '=', 'ads.category_id')
            ->select(['ads.*', 'ad_categories.title'])
            ->latest('created_at')
            ->paginate(5);
        return view('backend.ads.listads', compact('ads'));
    }

    public function AddAds()
    {
        $category = AdCategory::orderBy('title', 'asc')->get();
        return view('backend.ads.add_ads', compact('category'));
    }

    public function CreateAds(Request $request)
    {

        $data = array();
        $data['link'] = $request->link;
        $data['category_id'] = $request->category_id;
        if ($request->type == 1) {
            $data['type'] = 1;

            $yil = Carbon::now()->year;
            $ay = Carbon::now()->month;
            if (file_exists('storage/ads/' . $yil) == false) {
                mkdir('storage/ads/' . $yil, 0777, true);
            }
            if (file_exists('storage/ads/' . $yil . '/' . $ay) == false) {
                mkdir('storage/ads/' . $yil . '/' . $ay, 0777, true);
            }
            $image = $request->ads;
            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalName();

                Image::make($image)->save('storage/ads/' . $yil . '/' . $ay . '/' . $image_one);
                $data['ads'] = 'storage/ads/' . $yil . '/' . $ay . '/' . $image_one;
//            DB::table('posts')->insert($data);
                Ad::create($data);

                $notification = array(
                    'message' => 'Reklam Başarıyla Eklendi',
                    'alert-type' => 'success'
                );
                return Redirect()->route('list.add');
            }
            Ad::create($data);
            return Redirect()->route('list.add');
        } else {
            $notification = array(
                'message' => 'Reklam Başarıyla Eklendi',
                'alert-type' => 'success'
            );
            Ad::create($request->all());
            return Redirect()->route('list.add')->with($notification);

        }

    }

    public function EditAds(Ad $ads)
    {
        $category = AdCategory::get();
        return view('backend.ads.edit_ads', compact('ads', 'category'));
    }


    public function UpdateAds(Request $request, Ad $ad)
    {
        $data = $request->all();
//       echo $request->ads;
//        $data['link']=$request->link;
//        $data['category_id']=$request->category_id;
        $old_image = $request->old_image;

        if ($request->type == 1) {
            $data['type'] == 1;

            $yil = Carbon::now()->year;
            $ay = Carbon::now()->month;
            if (file_exists('storage/ads/' . $yil) == false) {
                mkdir('storage/ads/' . $yil, 0777, true);
            }
            if (file_exists('storage/ads/' . $yil . '/' . $ay) == false) {
                mkdir('storage/ads/' . $yil . '/' . $ay, 0777, true);
            }
            $image = $request->ads;
            if ($image) {
                $image_one = uniqid() . '.' . $image->getClientOriginalName();

                Image::make($image)->save('storage/ads/' . $yil . '/' . $ay . '/' . $image_one);
                $data['ads'] = 'storage/ads/' . $yil . '/' . $ay . '/' . $image_one;
//            DB::table('posts')->insert($data);
                Ad::find($ad->id)->update($data);
                unlink($old_image);

                $notification = array(
                    'message' => 'Reklam Başarıyla Düzenlendi',
                    'alert-type' => 'success'
                );

                return Redirect()->route('list.add')->with($notification);
            } else {

                $data['ads'] = $old_image;

                $ad->update($data);

                $notification = array(
                    'message' => 'Reklam Başarıyla Düzenlendi',
                    'alert-type' => 'success'
                );
                return Redirect()->route('list.add')->with($notification);
            }

        } elseif ($request->type == 2) {
            $data['type'] = 2;

            $ad->update($data);

            $notification = array(
                'message' => 'Reklam Başarıyla Düzenlendi',
                'alert-type' => 'success'
            );
            return Redirect()->route('list.add')->with($notification);
        }
    }

    public function DeleteAds(Ad $ad)
    {

        if (file_exists($ad->ads)) {
            unlink($ad->ads);
        }
        $ad->delete();
        $notification = array(
            'message' => 'Reklam Başarıyla Silindi',
            'alert-type' => 'error'
        );
        return redirect()->route('list.add')->with($notification);
    }

    public function adsStatus(Ad $ad, Request $request)
    {

        $data = DB::table('ads')->where('id', $ad['id'])->first();
        $update['status'] = $request->aktif;

        DB::table('ads')->where('id', $ad['id'])->update($update);
        if ($request->aktif == 1) {
            $notification = array(
                'message' => 'Reklam Aktif Yapıldı',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Reklam  Pasif Yapıldı',
                'alert-type' => 'warning'
            );
        }


        return redirect()->route('list.add')->with($notification);
    }
}

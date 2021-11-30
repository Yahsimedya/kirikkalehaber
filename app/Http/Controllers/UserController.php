<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use phpDocumentor\Reflection\DocBlock\Tag;
use function PHPUnit\Framework\assertEmpty;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest('created_at')
            ->paginate(20);
        return view('backend.user.userList', compact('users'));

    }

    public function editPage(Request $request, $id)
    {
        $users = User::where('id', '=', $request->id)->get();


        return view('backend.user.editUser', compact('users'));
    }

    public function edit(Request $request, $id)
    {
        $users = array();
        $yil = Carbon::now()->year;
        $ay = Carbon::now()->month;
        if (file_exists('image/Userimg/' . $yil) === false) {
            mkdir('image/Userimg/' . $yil, 0777, true);
        }
        if (file_exists('image/Userimg/' . $yil . '/' . $ay) === false) {
            mkdir('image/Userimg/' . $yil . '/' . $ay, 0777, true);
        }

        $image = $request->profile_photo_path;
        if ($image) { // if image is updating
            $image_one = uniqid() . '.' . $image->getClientOriginalName();

            $new_image_name = 'image/Userimg/' . $yil . '/' . $ay . '/' . $image_one;
            Image::make($image)->resize(800, 600)->fit(800, 600)->save($new_image_name);
            $users['profile_photo_path'] = $new_image_name; // set new image to the object, replace tmp image with new right path

            if (file_exists($request->old_image)) {
                unlink($request->old_image);
            }
        }

        $users['name'] = $request->name;
        $users['id'] = $request->id;
        $users['email'] = $request->email;
        $userpass = User::find($id);

        $users['password'] = $userpass->password == $request->password ? $request->password : \Hash::make($request->password);


        User::where('id', '=', $id)->update($users);

        return Redirect()->route('user.index')->with([
            'message' => 'Kullanıcı Başarıyla Güncellendi',
            'alert-type' => 'success'
        ]);


    }

    public function create()
    {
        return view('backend.user.createUser');
    }

    public function insert(Request $request)
    {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = \Hash::make($request->password);
        $data['created_at'] = Carbon::now();
        $yil = Carbon::now()->year;
        $ay = Carbon::now()->month;
        if (file_exists('image/Userimg/' . $yil) == false) {
            mkdir('image/Userimg/' . $yil, 0777, true);
        }
        if (file_exists('image/Userimg/' . $yil . '/' . $ay) == false) {
            mkdir('image/Userimg/' . $yil . '/' . $ay, 0777, true);
        }
        $image = $request->profile_photo_path;

        if ($image) {
            $image_one = uniqid() . '.' . $image->getClientOriginalName();

            Image::make($image)->resize(150, 150)->fit(150, 150)->save('image/Userimg/' . $yil . '/' . $ay . '/' . $image_one);
            $data['profile_photo_path'] = 'image/Userimg/' . $yil . '/' . $ay . '/' . $image_one;
            DB::table('users')->insert($data);
            $notification = array(
                'message' => 'Kullanıcı Başarıyla Eklendi',
                'alert-type' => 'success'
            );
            return Redirect()->route('user.index')->with($notification);
        } else {
            return Redirect()->back();
        }
    }

    public function delete($id)
    {
        User::where('id', '=', $id)->delete();
        $notification = array(
            'message' => 'Kullanıcı Başarıyla Kaldırıldı',
            'alert-type' => 'success'
        );
        return Redirect()->route('user.index')->with($notification);


    }
}

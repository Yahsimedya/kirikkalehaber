<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $themeSettings = \DB::table('themes')->get();
        return view('backend.Theme.index', compact('themeSettings'));
    }

    public function update(Request $request, $id)
    {
        Theme::find($id)->update($request->except('_token'));
        return redirect(route('theme.index'));
    }
}

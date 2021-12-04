<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use App\Models\Category;

class ThemeController extends Controller
{
    public function index()
    {
        $themeSettings = Theme::latest()->get();
        $Categories = Category::latest()->get();

        return view('backend.Theme.index', compact('themeSettings','Categories'));
    }

    public function update(Request $request, $id)
    {
        Theme::find($id)->update($request->except('_token'));
        return redirect(route('theme.index'));
    }
}

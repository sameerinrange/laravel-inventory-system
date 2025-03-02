<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function setTheme(Request $request)
    {
        session(['theme' => $request->theme]);
        return response()->json(['message' => 'Theme updated']);
    }

    public function setLayout(Request $request)
    {
        session(['layout' => $request->layout]);
        return response()->json(['message' => 'Layout updated']);
    }
}

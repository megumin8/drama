<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\drama;

class HomeController extends Controller
{
    public function index()
    {
        $dramas = Drama::all();
        return view('home', compact('dramas'));
    }

    public function search(Request $request)
    {
        $key_word = $request->name;
        $dramas = Drama::where('name' , $key_word)->orWhere('name', 'like' , '%' . $key_word . '%' )->get()->all();

        return view('home', compact('dramas','key_word'));

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\drama;
class DramaController extends Controller
{

  public function index()
  {
    $dramas = Drama::all();
    $user = auth()->user();
    return view('dashboard' , compact('user','dramas'));
  }
  public function getall()
  {
    $drama = Drama::all();

     return response()->json($drama, 200);
  }
  public function delete($id)
  {
    $drama = Drama::find($id);
    $drama->delete();

    return redirect(route('home'));
  }
  public function edit(Request $request)
  {
    $cover = $request->cvi;
    $dramaname = $request->name;
    $id = $request->id;
    if($request->file()) {
        $fileName = time().$dramaname.'_'.$request->cover->getClientOriginalName();
        $filePath = $request->file('cover')->storeAs('dramacovers', $fileName, 'public');
        $cover = '/storage/' . $filePath;
    }
    $drama = Drama::find($id);
    $drama->name = $request->name;
    $drama->cover = $cover;
    $drama->disp = $request->disp;
    $drama->save();

    return redirect(route('home'));
  }
  public function addNew( Request $request)
  {

    $cover = asset('images/logo.png');
    $dramaname = $request->name;
    if($request->file()) {
        $fileName = time().$dramaname.'_'.$request->cover->getClientOriginalName();
        $filePath = $request->file('cover')->storeAs('dramacovers', $fileName, 'public');
        $cover = '/storage/' . $filePath;
    }
    $drama = new Drama();
    $drama->name = $request->name;
    $drama->cover = $cover;
    $drama->disp = $request->disp;
    $drama->save();

    return redirect(route('home'));
  }
}

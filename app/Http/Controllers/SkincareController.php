<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skincare;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SkincareController extends Controller
{

  public function view(){
    $skincares = Skincare::all();
    return view('welcome')->with('semuaskincare', $skincares);
  }

  public function viewcreateform(){
    return view('additem')->with('categories', Category::all());
  }

  public function createitem(Request $request){
    $this->validate($request, [
      'name' => 'required|string|min:5|max:80',
      'price' => 'required|integer',
      'quantity' => 'required|integer',
      'itempicture' => 'mimes:jpg, jpeg, png'
    ]);


    if($request->hasFile('itempicture')){
      $image_path = 'public/itemimage';
      $image = $request->file('itempicture');
      $image_name = Str::random(5) . '_' . $image->getClientOriginalName();
      $path = $request->file('itempicture')->storeAs($image_path, $image_name);
    }

    Skincare::create([
      'name' => $request->name,
      'price' => $request->price,
      'quantity' => $request->quantity,
      'category_id' => $request->category_id,
      'image' => $image_name
    ]);
    return redirect('/');
  }

  public function editform($id){
    $skincare = Skincare::findOrFail($id);
    return view('edit')->with('skincare', $skincare)->with('categories', Category::all());
  }

  public function edit($id, Request $request, Skincare $skincare){
    $this->validate($request, [
      'name' => 'required|string|min:5|max:80',
      'price' => 'required|numeric',
      'quantity' => 'required|numeric',
      'itempicture' => 'mimes:jpg, jpeg, png'
    ]);

    if($request->hasFile('itempicture')){
      $image_path = 'public/itemimage';
      Storage::delete($image_path.$skincare->image);
      $image = $request->file('itempicture');
      $image_name = $image->getClientOriginalName();
      $path = $request->file('itempicture')->storeAs($image_path, $image_name);
    }

    $skincare = Skincare::findOrfail($id)->update([
      'name' => $request->name,
      'price' => $request->price,
      'quantity' => $request->quantity,
      'category_id' => $request->category_id,
      'image' => $image_name
    ]);
    return redirect('/');
  }

  public function delete($id){
    Skincare::destroy($id);
    return redirect('/');
  }
}

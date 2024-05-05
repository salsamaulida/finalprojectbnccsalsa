<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function createform(){
      return view('createcategory');
    }

    public function create(Request $request){
        $this->validate($request, [
            'category' => 'required|string'
        ]);
        Category::create([
            'category' => $request->category
        ]);
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skincare;
use Illuminate\Support\Facades\Validator;

class SkincareControllerApi extends Controller
{
    public function index(){
        $skincares = Skincare::all();
        return response()->json([
            "skincare" => $skincares
        ], 200);
    }

    public function create(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:80',
            'price' => 'required|integer',
            'stock' => 'required|integer'
        ]);

        if($validate->fails()){
            return response($validate->massages(), 422);
        }else{
            $skincare = Skincare::create([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'image' => $request->itempicture
              ]);
              return response()->json([
                "skincare" => $skincare
              ], 200);
        }

    }
}

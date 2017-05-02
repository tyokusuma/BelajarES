<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asus;
class controllerasus extends Controller
{
    public function index(Request $request, asus $asus) {
      $result = $asus->all();
      return response()->json([
        'status'=>'success',
        'asus'=>$result->toArray(),
      ]);
    }
    public function store(Request $request, asus $asus){
      $asus->id=$request->id;
      $asus->name=$request->name;
      $asus->addres=$request->addres;
      $asus->gender=$request->gender;
      $asus->ages=$request->ages;

      $asus->save();
      $result = $asus->all();
      return response()->json([
        'status'=>'success',
        'asus'=>$result->toArray(),
      ]);
    }
}

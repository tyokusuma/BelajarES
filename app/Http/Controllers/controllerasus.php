<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asus;
use App\User;
use Basemkhirat\Elasticsearch\Facades\ES;
class controllerasus extends Controller
{
  public function __construct(asus $model)
   {
       $this->model = $model;
      //  $this->esSearch = ES::index('user_index')->type('list')->get();
   }

    public function index(Request $request, asus $asus) {
      $result = $asus->all();
      $esresult = ES::type("asuses")->get();

      return response()->json([
        'status'=>'success',
        'DatabaseSQL'=>$result->toArray(),
        'elasticsearch'=>$esresult
      ]);
    }
    public function store(Request $request, asus $asus){
      $asus->name=$request->name;
      $asus->addres=$request->addres;
      $asus->gender=$request->gender;
      $asus->ages=$request->ages;
      $asus->save();

      ES::type("asuses")->id($asus->getKey())->insert([
        "name" => $asus->name,
        "addres" => $asus->addres,
        "gender" => $asus->gender,
        "ages" => $asus->ages
      ]);
      return response()->json([
        'mesage' => 'data has been posted!',
        'postdata'=> $asus,
      ]);
    }

    public function destroy($id){
      // delete data from sql
        $user = $this->model;
        $result = $user->find($id);
        $result->delete();

        // Delete ElasticSearch Document

        $delete_es = ES:: type('asuses')->id($id)->delete();

        return response()->json([
            'deleted' => $delete_es,
        ]);
    }
    public function update(Request $request, $id){
      // update data from sql

      $asus->name=$request->name;
      $asus->addres=$request->addres;
      $asus->gender=$request->gender;
      $asus->ages=$request->ages;
      $asus->save();

      //update Elasticsearch document
      $update_es =ES::type("asuses")-id($id)->update([
        "name" => $asus->name,
        "addres" => $asus->addres,
        "gender" => $asus->gender,
        "ages" => $asus->ages,
      ]);
      return response()->json([
        'updated' => $update_es,
      ]);
    }
}

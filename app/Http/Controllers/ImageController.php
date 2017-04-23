<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Image;
class ImageController extends Controller
{
    //
  public function index(){
    $images=Image::all();
    return view('image_index')
            ->with('images',$images);


  }

  public function store(){
      $input=Input::all();
      $input['created_at']=date("Y-m-d H:i:s");

      $Image=Image::create($input);
  }

  public function group_add(){

    return view('image_create');
  }

  public function group_store(){
    $input=Input::all();
    $datas=json_decode($input['img_datas'],true);
    foreach ($datas as $img) {
      // dd($img);
      try{
        Image::forceCreate($img);
      } catch (Exception $e) {

      }
      
    }
     return Redirect::to('/image');
  }

  public function json_image(){
    $images = Image::orderBy('id', 'asc')->get();
    return $images;
  }

}


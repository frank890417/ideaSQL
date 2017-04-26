<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Image;
use File;
class ImageController extends Controller
{
    //
  public function index(){
    $images=Image::orderBy("id","asc")->limit(100)->get();
    return view('image_index')
            ->with('images',$images)
            ;


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
    $inputs=Input::all();
    
    // $usedata=$inputs['img_datas'];

    $file_data=File::get($inputs['datafile']->getRealPath());
    $datas=json_decode($file_data,true); 
    if ($file_data!=""){
      foreach ($datas as $img) {
        // dd($img);
        try{

           $image=Image::forceCreate($img);

          //get infos
          if (!array_key_exists("detail_infos",$img)){
            $image->detail_infos=file_get_contents("https://api.instagram.com/oembed/?url=https://www.instagram.com".$image->href_link);
          }
          // $temp=json_decode( $image->detail_infos);
          // preg_match("/datetime=\"(.*?)\"/",$temp->{'html'},$matches);
          // $time=$matches[1];
          // $image->time= $time;

          // $t_width=($temp->{'thumbnail_width'});
          // $t_height=($temp->{'thumbnail_height'});


          //get color

         
          // $im = imagecreatefromjpeg($image->img_link);
          // $rgb0 = imagecolorat($im,$t_width/2, $t_height/2);
          // $r0 = ($rgb0 >> 16) & 0xFF;
          // $g0 = ($rgb0 >> 8) & 0xFF;
          // $b0 = $rgb0 & 0xFF;
          // $rgb1 = imagecolorat($im, (int)($t_width/20), (int)($t_height/1.8));
          // $r1 = ($rgb1 >> 16) & 0xFF;
          // $g1 = ($rgb1 >> 8) & 0xFF;
          // $b1 = $rgb1 & 0xFF;
          // $rgb2= imagecolorat($im, (int)($t_width/1.8), (int)($t_height/20));

          // $r2 = ($rgb2 >> 16) & 0xFF;
          // $g2 = ($rgb2 >> 8) & 0xFF;
          // $b2 = $rgb2 & 0xFF;
          // $rgb3= imagecolorat($im, (int)($t_width/1.8), (int)($t_height/1.8));
          // $r3 = ($rgb3 >> 16) & 0xFF;
          // $g3 = ($rgb3 >> 8) & 0xFF;
          // $b3 = $rgb3 & 0xFF;

          // $rgb4= imagecolorat($im, (int)($t_width/20), (int)($t_height/20));
          // $r4 = ($rgb4 >> 16) & 0xFF;
          // $g4 = ($rgb4 >> 8) & 0xFF;
          // $b4 = $rgb4 & 0xFF;
          
          // $avg_r=($r0+$r1+$r2+$r3+$r4)/5;
          // $avg_g=($g0+$g1+$g2+$g3+$g4)/5;
          // $avg_b=($b0+$b1+$b2+$b3+$b4)/5;

          // $image->color="(".$avg_r.",".$avg_g.",".$avg_b.")";
          // $image->color_r=$avg_r;
          // $image->color_g=$avg_g;
          // $image->color_b=$avg_b;

          
          $image->update();

        } catch (Exception $e) {

        }
        
      }
    }
     return Redirect::to('/image');
  }


}


<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Image;

use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\Finalseg;

class ApiController extends Controller
{

    public function test(){
      $im = imagecreatefromjpeg("https://scontent-tpe1-1.cdninstagram.com/t51.2885-15/s640x640/e15/c0.90.720.720/18095869_618187001704736_3378814694037913600_n.jpg");
      $rgb = imagecolorat($im, 320, 320);
      $r = ($rgb >> 16) & 0xFF;
      $g = ($rgb >> 8) & 0xFF;
      $b = $rgb & 0xFF;

      var_dump($r, $g, $b);
    }
    //
    public function json_image(){
      $inputs = Input::all();
      $images = Image::orderBy('id', 'asc');

      if (Input::has('limit')){
        $images = $images->limit($inputs['limit']);
      }
      $images = $images->get();

      return $images;
    }

    public function search_image($name){
      $inputs = Input::all();
      $images = Image::where('content', 'LIKE', '%'.$name.'%');
      if (Input::has('limit')){
        $images = $images->limit($inputs['limit']);
      }
      $images = $images->get();
      return $images;
    }
    public function search_image_multi($name){
      $inputs = Input::all();
      $namesplit = explode(" ", $name);
      
      // $test=file_get_contents("http://api.qsearch.cc/api/tokenizing/v1/segment?key=afe4ba4b7373f58bfc1596929a39dd6bd8b2dcbd4e509cd269b122aef71ca397&message=".."&format=json");
      // Jieba::init();
      // Finalseg::init();
      // dd(Jieba::cut("你好啊"));
      // Jieba::init();
      // Finalseg::init();

      // $seg_list = Jieba::cut("怜香惜玉也得要看对象啊！");
 
      foreach ($namesplit as $key=>$sp) {
          if ($key==0){
            $images = Image::where('content', 'LIKE', '%'.$sp.'%');
          }else{
            $images = $images->where('content', 'LIKE', '%'.$sp.'%');
          }
      }

      if (Input::has('limit')){
        $images = $images->limit($inputs['limit']);
      }
      $images = $images->get();
      return $images;
    }

    public function work_break($words){
      return file_get_contents("http://api.qsearch.cc/api/tokenizing/v1/segment?key=afe4ba4b7373f58bfc1596929a39dd6bd8b2dcbd4e509cd269b122aef71ca397&message=".$words."&format=json");
    }

}

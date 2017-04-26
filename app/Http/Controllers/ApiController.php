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

<<<<<<< HEAD
=======
      dd($test);

>>>>>>> a36d8d7f3eb2ed7454d8eb70569eee88352b3e06
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
<<<<<<< HEAD

=======
    
>>>>>>> a36d8d7f3eb2ed7454d8eb70569eee88352b3e06
    public function work_break($words){
      return file_get_contents("http://api.qsearch.cc/api/tokenizing/v1/segment?key=afe4ba4b7373f58bfc1596929a39dd6bd8b2dcbd4e509cd269b122aef71ca397&message=".$words."&format=json");
    }

}

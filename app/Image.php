<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['img_link','content','color','color_r','color_g','color_b','href_link','brightness','time','detail_infos','source'];
}

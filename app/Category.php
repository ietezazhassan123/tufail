<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
           use SoftDeletes; 




           public function sub_category()
		   {
		        return $this->hasMany('App\SubCategory');
		   }



		   public function products()
		   {
		        return $this->hasMany('App\Product');
		   }
}

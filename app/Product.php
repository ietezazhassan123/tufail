<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Product extends Model
{
            use SoftDeletes; 


            public function category()
		    {
		        return $this->belongsTo('App\Category');
		    }


		    public function sub_category()
		    {
		        return $this->belongsTo('App\SubCategory');
		    }


		    public function product_images()
		    {
		    	 return $this->hasMany('App\ProductImages','product_id','id');
		    }
}

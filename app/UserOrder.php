<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
        



        public function products()
	    {
	        return $this->hasMany('App\OrderProduct','order_id','id');
        }
}

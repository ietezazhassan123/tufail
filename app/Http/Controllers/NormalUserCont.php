<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalUserCont extends Controller
{
	
	           public function __construct()
               {
             	     $this->middleware(['user_1']);
               }

               public function index()
               {
               	     return view('app.user.index');
               }
}

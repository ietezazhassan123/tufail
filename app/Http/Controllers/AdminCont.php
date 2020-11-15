<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCont extends Controller
{

               public function __construct()
               {
             	     $this->middleware(['admin_1']);
               }


               public function index()
               {
               	     return view('app.admin.index');
               }
}

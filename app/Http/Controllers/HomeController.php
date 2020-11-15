<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    
            public function __construct()
            {
                $this->middleware(['auth','check_user_role']);
            }

            
            public function index()
            {
                return view('home');
            }
}

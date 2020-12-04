<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

class ViewUser extends Controller
{


             public function view_all_users()
             {
                     $Users = User::where('role','User')->get();
                     return view('app.admin.users.all',['Users'=>$Users]);
             }
}

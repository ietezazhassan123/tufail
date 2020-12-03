<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;


class Profile extends Controller
{
                   


                    public function __construct()
                    {
                    	   $this->middleware(['auth']);
                    }



                    public function UpdateProfile()
                    {
                            if(Auth::user()->role == 'Admin')
                            {
                                     return view('app.admin.profile');
                            }else{
                                     return view('app.user.profile');
                            }
                    }


                    public function update_user_profile(Request $request)
                    {
                            $request->validate([
                                'name' => 'required',
                                'old_password' => 'required|password',
                                'new_password' => 'nullable|min:8',
                                'confirm_password' => 'nullable|required_with:new_password|same:new_password|min:8',
                                'image' => 'nullable |max:20000'
                            ],[
                                'name.required' => 'Name is Required',
                                'old_password.required' => 'Old Password is Required',
                            ]);


                            $User = User::findOrFail(Auth::user()->id);
                            $User->name = $request->name ;

                            if($request->new_password)
                            {
                                 $User->password = Hash::make($request->new_password);
                            }


                            if($request->file('image'))
                            {
                                    $file = $request->file('image');
                                                                           
                                    $filename1 = $file->getClientOriginalName();
                                    $image_resize1 = Image::make($file->getRealPath());  
                                    $image_resize1->resize(200, 200);            
                                    $image_resize1->save(public_path('Images/profiles/'.$filename1));
                             
                                    $User->image = $filename1;                                    
                            }
                            $User->save();

                            if(Auth::user()->role == 'Admin')
                            {
                                  return redirect()->route('AdminPanel')->with('success','Profile Successfully Updated');
                            }else{
                                  return redirect()->route('UserPanel')->with('success','Profile Successfully Updated');
                            }
                    }
}

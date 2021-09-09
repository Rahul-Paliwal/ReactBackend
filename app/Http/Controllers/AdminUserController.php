<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class AdminUserController extends Controller
{
    public function AdminLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function AdminUserProfile(){
        $id=Auth::user()->id;
        $user=User::find($id);    
        return view('backend.user.user_profile',compact('user'));
    }

    public function AdminUserProfileEdit(){
        $id=Auth::user()->id;
        $user=User::find($id);    
        return view('backend.user.user_profile_edit',compact('user'));
    }

    public function AdminUserProfileStore(Request $request){
        $data=User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path')){
            $file=$request->file('profile_photo_path');
            @unlink(public_path('upload/user_image/'.$data->profile_photo_path));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image'),$filename);
            $data['profile_photo_path']=$filename;

        }
        $data->save();
        $notification = array(
    		'message' => 'User Profile Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('user.profile')->with($notification);
    }

    public function AdminUserChangePassword(){
        $id=Auth::user()->id;
        $user=User::find($id);    
        return view('backend.user.change_password',compact('user'));
    }

    public function AdminUserPasswordUpdate(Request $request){
        $validateData = $request->validate([
    		'old_password' => 'required',
    		'password' => 'required|confirmed'

    	]);

    	$hashedPassword = Auth::user()->password;
    	if (Hash::check($request->old_password,$hashedPassword)) {
    		$user = User::find(Auth::id());
    		$user->password = Hash::make($request->password);
    		$user->save();
    		Auth::logout();
    		return redirect()->route('admin.logout');
    	}else{
    		return redirect()->back();
    	}
    }
}

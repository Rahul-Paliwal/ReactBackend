<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;

class HomePageController extends Controller
{

    public function SelectVideo(){
        $result = HomePage::select('video_description','video_url')->get();
        return $result;
    }
    public function SelectAnalysis(){
        $result = HomePage::select('total_users','total_course','total_review','total_project')->get();
        return $result;
    }
     public function SelectDescription(){
        $result = HomePage::select('home_description')->get();
        return $result;
     }
     public function SelectTitle(){
        $result = HomePage::select('home_title','home_subtitle')->get();
        return $result;
    }

    public function ManageHome(){

    $homecontent = HomePage::all();
        return view('backend.home.manage_home',compact('homecontent'));
    }  

    public function AddHome(){
        return view('backend.home.add_home');
    }

    public function StoreHome(Request $request){

        $request->validate([
            'home_title' => 'required',
            'home_subtitle' => 'required',

        ],[
            'home_title.required' => 'Input Home Title Name',
            'home_subtitle.required' => 'Input Home Sub Title',

        ]);
        HomePage::insert([
            'home_title' => $request->home_title,
            'home_subtitle' => $request->home_subtitle,
            'home_description' => $request->home_description,
            'total_users' => $request->total_users,           
            'total_course' => $request->total_course,
            'total_review' => $request->total_review,
            'total_project' => $request->total_project,
            'video_description' => $request->video_description,
            'video_url' => $request->video_url,            

        ]);

         $notification = array(
            'message' => 'Home Content Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.home')->with($notification);

    } 

    public function EditHome($id){

        $homecontent = HomePage::findOrFail($id);
        return view('backend.home.edit_home',compact('homecontent'));

    }

    public function UpdateHome(Request $request){

        $home_id = $request->id;

        HomePage::findOrFail($home_id)->update([
            'home_title' => $request->home_title,
            'home_subtitle' => $request->home_subtitle,
            'home_description' => $request->home_description,
            'total_users' => $request->total_users,
            'total_course' => $request->total_course,
            'total_review' => $request->total_review,
            'total_project' => $request->total_project,
            'video_description' => $request->video_description,
            'video_url' => $request->video_url,            

        ]);

         $notification = array(
            'message' => 'Home Content Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.home')->with($notification);
    } 


    public function DeleteHome($id){

        HomePage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Home Content Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    }

    public function HomePage(){
        return view('auth.login');
    }
}

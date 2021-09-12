<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function AllFooterData(){
        $result= Footer::all();
        return $result;
    }

    public function ManageFooter(){
    	$footer = Footer::all();
    	return view('backend.footer.manage_footer',compact('footer'));
    }
    public function AddFooter(){
        return view('backend.footer.add_footer');
    }
    public function StoreFooter(Request $request){
    	Footer::insert([
    		'address' => $request->address,
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'facebook' => $request->facebook,
    		'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
    		'github' => $request->github,
    		'footer_credit' => $request->footer_credit,

    	]);

    	 $notification = array(
    		'message' => 'Footer Content Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('manage.footer')->with($notification);

    }
    public function EditFooter($id){
    	$footer = Footer::findOrFail($id);
    	return view('backend.footer.edit_footer',compact('footer'));
    }


    public function UpdateFooter(Request $request){
    	$footer_id = $request->id;

    	Footer::findOrFail($footer_id)->update([

            'address' => $request->address,
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'facebook' => $request->facebook,
    		'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
    		'github' => $request->github,
    		'footer_credit' => $request->footer_credit,

    	]);

    	 $notification = array(
    		'message' => 'Footer Content Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('manage.footer')->with($notification);

    }

    public function DeleteFooter($id){

        Footer::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Footer Detail Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    } 

}

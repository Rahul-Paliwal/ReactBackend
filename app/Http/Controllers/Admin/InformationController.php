<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function AllInfoData(){
        $result = Information::all();
        return $result;
    }

    public function ManageInformation(){
        $result = Information::all();
        return view ('backend.information.manage_information',compact('result'));
    }

    public function AddInformation(){
        return view ('backend.information.add_information');
    }

    public function StoreInformation(Request $request){
        Information::insert([
                'about'=>$request->about,
                'refund'=>$request->refund,
                'terms'=>$request->terms,
                'privacy'=>$request->privacy
        ]);
        $notification = array(
    		'message' => 'Information Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('manage.information')->with($notification);
    }

    public function EditInformation($id){

    	$information = Information::findOrFail($id); 
    	return view('backend.information.edit_information',compact('information'));

    } 


    public function UpdateInformation(Request $request, $id){

        Information::findOrFail($id)->update([
       	'about' => $request->about,
       	'refund' => $request->refund,
       	'terms' => $request->terms,
       	'privacy' => $request->privacy,

       ]);
       $notification = array(
    		'message' => 'Information Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('manage.information')->with($notification);

    }



    public function DeleteInformation($id){

    	Information::findOrFail($id)->delete();
    	$notification = array(
    		'message' => 'Information Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    }
}

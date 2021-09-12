<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Image;

class ServiceController extends Controller
{
    public function AllServices(){
        $result = Services::all();
        return $result;
    }
    
    public function ManageService(){
    	$service = Services::all();
    	return view('backend.service.manage_service',compact('service'));
    
    }

    public function AddService(){
        return view('backend.service.add_service');
    }

    public function StoreService(Request $request){
        $request->validate([
    		'service_name' => 'required',
    		'service_description' => 'required',
    		'service_icon' => 'required',
    	],[
			'service_name.required' => 'Input Service Name',
			'service_description.required' => 'Input Service Description',

    	]);

    	$image = $request->file('service_icon'); 
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(512,512)->save('upload/service/'.$name_gen);
    	$save_url = 'http://127.0.0.1:8000/upload/service/'.$name_gen;

    	Services::insert([
    		'service_name' => $request->service_name,
    		'service_description' => $request->service_description,
    		'service_icon' => $save_url,
    	]);

    	 $notification = array(
    		'message' => 'Service Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('manage.service')->with($notification);
    }

    public function EditService($id){
        $services = Services::findOrFail($id);
    	return view('backend.service.edit_service',compact('services'));
    }

    public function UpdateService(Request $request){

    	$service_id = $request->id;

    	if ($request->file('service_icon')) {
        $image = $request->file('service_icon'); 
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(512,512)->save('upload/service/'.$name_gen);
    	$save_url = 'http://127.0.0.1:8000/upload/service/'.$name_gen;

    	Services::findOrFail($service_id)->update([
    		'service_name' => $request->service_name,
    		'service_description' => $request->service_description,
    		'service_logo' => $save_url,
    	]);

    	 $notification = array(
    		'message' => 'Service Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('manage.service')->with($notification);


    	}else{

    		Services::findOrFail($service_id)->update([

    		'service_name' => $request->service_name,
    		'service_description' => $request->service_description,

    	]);

    	 $notification = array(
    		'message' => 'Service Updated Without Image Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('manage.service')->with($notification);
    	}
    }

    public function DeleteService($id){

    	Services::findOrFail($id)->delete();

    	$notification = array(
    		'message' => 'Service Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    }

}
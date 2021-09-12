<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chart;

class ChartController extends Controller
{
    public function AllSelect(){
            $result= Chart::all();
            return $result;
    }

    public function ManageChart(){
        $chart = Chart::all();
    	return view('backend.chart.manage_chart',compact('chart'));
    }

    public function AddChart(){
        return view('backend.chart.add_chart');
    }

    public function StoreChart(Request $request){
       
        Chart::insert([
            'x_data' => $request->x_data,
    		'y_data' => $request->y_data,
        ]);

         $notification = array(
            'message' => 'Chart Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.chart')->with($notification);

    }

    public function EditChart($id){
    	$chart = Chart::findOrFail($id);
    	return view('backend.chart.edit_chart',compact('chart'));

    } 

    public function UpdateChart(Request $request){

    		$chart_id = $request->id;

    	Chart::findOrFail($chart_id)->update([

    		'x_data' => $request->x_data,
    		'y_data' => $request->y_data,


    	]);

    	 $notification = array(
    		'message' => 'Chart Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('manage.chart')->with($notification);

    } 

    public function DeleteChart($id)
    {
        Chart::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Chart Data Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReview;
use Image;

class ClientReviewController extends Controller
{
    public function AllSelect(){
        $result= ClientReview::all();
        return $result;
    }

    public function ManageClientReview(){
    	$review = ClientReview::all();
    	return view('backend.review.manage_review',compact('review'));
    } 


    public function AddClientReview(){
    	return view('backend.review.add_review');
    }

    public function StoreClientReview(Request $request){

        $request->validate([
           'client_title' => 'required',
           'client_comment' => 'required',
           'client_image' => 'required',
       ],[
           'client_title.required' => 'Input Client Name',
           'client_comment.required' => 'Input Client Comment',

       ]);

       $image = $request->file('client_image'); 
       $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(626,417)->save('upload/review/'.$name_gen);
       $save_url = 'http://127.0.0.1:8000/upload/review/'.$name_gen;

       ClientReview::insert([
           'client_title' => $request->client_title,
           'client_comment' => $request->client_comment,
           'client_image' => $save_url,
       ]);

        $notification = array(
           'message' => 'Review Inserted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->route('manage.clientreview')->with($notification);
   }
   public function EditClientReview($id)
   {
    $review = ClientReview::findOrFail($id);
    return view('backend.review.edit_review',compact('review'));

    } 


    public function UpdateClientReview(Request $request)
    {   

    $review_id = $request->id;

    if ($request->file('client_image')) {

    $image = $request->file('client_image'); 
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(626,417)->save('upload/review/'.$name_gen);
    $save_url = 'http://127.0.0.1:8000/upload/review/'.$name_gen;

    ClientReview::findOrFail($review_id)->update([

        'client_title' => $request->client_title,
        'client_comment' => $request->client_comment,
        'client_image' => $save_url,
    ]);

     $notification = array(
        'message' => 'Review Updated Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('manage.clientreview')->with($notification);


        }
        else
        {

        ClientReview::findOrFail($review_id)->update([

        'client_title' => $request->client_title,
        'client_comment' => $request->client_comment,

        ]);

     $notification = array(
        'message' => 'Review Updated Without Image Successfully',
        'alert-type' => 'info'
         );

        return redirect()->route('manage.clientreview')->with($notification);
         }

    } 


    public function DeleteClientReview($id)
    {
        ClientReview::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    }
}

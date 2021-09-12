<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use Image;

class CoursesController extends Controller
{
    public function AllCourseHome(){
        $result= Courses::limit(4)->get();
        return $result;
    }

    public function AllCourse(){
        $result= Courses::all();
        return $result;
    }

    public function CourseDetail($courseId){
        $id=$courseId;
        $result = Courses::where('id',$id)->get();
        return $result;
    }

    public function ManageCourse(){

        $courses = Courses::all();
        return view('backend.course.manage_course',compact('courses'));
    }

    public function AddCourse(){
        return view('backend.course.add_course');
    }

    public function StoreCourse(Request $request){

        $request->validate([
            'short_title' => 'required',
            'short_description' => 'required',
            'small_img' => 'required',
        ],[
            'short_title.required' => 'Input Short Title Name',
            'short_description.required' => 'Input Short Description',

        ]);

        $image = $request->file('small_img'); 
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(626,417)->save('upload/course/'.$name_gen);
        $save_url = 'http://127.0.0.1:8000/upload/course/'.$name_gen;

        Courses::insert([
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_title' => $request->long_title,
            'long_description' => $request->long_description,
            'total_duration' => $request->total_duration,
            'total_lecture' => $request->total_lecture,
            'total_students' => $request->total_students,
            'skill_all' => $request->skill_all,
            'video_url' => $request->video_url,
            'small_img' => $save_url,
        ]);

         $notification = array(
            'message' => 'Courses Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.course')->with($notification);

    }

    public function EditCourse($id){
        $courses = Courses::findOrFail($id);
        return view('backend.course.edit_course',compact('courses'));

    }

    public function UpdateCourse(Request $request){

        $course_id = $request->id;

        if($request->file('small_img')) 
        {
        $image = $request->file('small_img'); 
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(626,417)->save('upload/course/'.$name_gen);
        $save_url = 'http://127.0.0.1:8000/upload/course/'.$name_gen;

        Courses::findOrFail($course_id)->update([

            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_title' => $request->long_title,
            'long_description' => $request->long_description,
            'total_duration' => $request->total_duration,
            'total_lecture' => $request->total_lecture,
            'total_students' => $request->total_students,
            'skill_all' => $request->skill_all,
            'video_url' => $request->video_url,
            'small_img' => $save_url,
        ]);

         $notification = array(
            'message' => 'Course Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.course')->with($notification);

        }
        else  
        {
            Courses::findOrFail($course_id)->update([

            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_title' => $request->long_title,
            'long_description' => $request->long_description,
            'total_duration' => $request->total_duration,
            'total_lecture' => $request->total_lecture,
            'total_students' => $request->total_students,
            'skill_all' => $request->skill_all,
            'video_url' => $request->video_url,

        ]);

         $notification = array(
            'message' => 'Course Updated Without Image Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.course')->with($notification);
        }

    } 


    public function DeleteCourse($id){

        Courses::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Courses Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    } 
}

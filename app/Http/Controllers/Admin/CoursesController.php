<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

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
}

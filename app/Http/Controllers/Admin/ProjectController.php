<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectController extends Controller
{
    public function AllProjectHome(){
        $result= Projects::limit(3)->get();
        return $result;
    }

    public function AllProject(){
        $result= Projects::all();
        return $result;
    }
    public function ProjectDetails($projectId){
        $id=$projectId;
        $result = Projects::where('id',$id)->get();
        return $result;
    }
}

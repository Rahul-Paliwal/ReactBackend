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
}

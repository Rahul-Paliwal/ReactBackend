<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HomePageController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Chart Route  
Route::get('/chartdata',[ChartController::class,'AllSelect']);
// Client Review Route
Route::get('/clientreview',[ClientReviewController::class,'AllSelect']);
// Contact Form Route
Route::post('/contactsend',[ContactController::class,'AllContactSend']);
// Course Home Route
Route::get('/coursehome',[CoursesController::class,'AllCourseHome']);
Route::get('/courseall',[CoursesController::class,'AllCourse']);
Route::get('/coursedetails/{courseId}',[CoursesController::class,'CourseDetail']);
// Footer Route
Route::get('/footerdata',[FooterController::class,'AllFooterData']);
// Information Route
Route::get('/infodata',[InformationController::class,'AllInfoData']);
// Services Route
Route::get('/services',[ServiceController::class,'AllServices']);
// Project All Route
Route::get('/projecthome',[ProjectController::class,'AllProjectHome']);
Route::get('/projectall',[ProjectController::class,'AllProject']);
Route::get('/projectdetails/{projectId}',[ProjectController::class,'ProjectDetails']);
// Home Page Route
Route::get('/home/video',[HomePageController::class,'SelectVideo']);
Route::get('/home/analysis',[HomePageController::class,'SelectAnalysis']);
Route::get('/home/description',[HomePageController::class,'SelectDescription']);
Route::get('/home/title',[HomePageController::class,'SelectTitle']);
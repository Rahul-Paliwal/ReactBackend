<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\ChartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/logout',[AdminUserController::class,'AdminLogout'])->name('admin.logout');

Route::prefix('admin')->group(function(){
    Route::get('/user/profile',[AdminUserController::class,'AdminUserProfile'])->name('user.profile');
    Route::get('/user/profile/edit',[AdminUserController::class,'AdminUserProfileEdit'])->name('user.profile.edit');
    Route::post('/user/profile/store',[AdminUserController::class,'AdminUserProfileStore'])->name('user.profile.store');
    Route::get('/change/password',[AdminUserController::class,'AdminUserChangePassword'])->name('change.password');
    Route::post('/change/password/update',[AdminUserController::class,'AdminUserPasswordUpdate'])->name('change.password.update');
});

// information route 
Route::prefix('information')->group(function(){
    Route::get('/manage',[InformationController::class,'ManageInformation'])->name('manage.information');
    Route::get('/add',[InformationController::class,'AddInformation'])->name('add.information');
    Route::post('/store',[InformationController::class,'StoreInformation'])->name('store.information');
    Route::get('/edit/{id}',[InformationController::class, 'EditInformation'])->name('edit.information');
    Route::post('/update/{id}',[InformationController::class, 'UpdateInformation'])->name('update.information');
    Route::get('/delete/{id}',[InformationController::class, 'DeleteInformation'])->name('delete.information');
});

// services route 
Route::prefix('service')->group(function(){
    Route::get('/manage',[ServiceController::class,'ManageService'])->name('manage.service');
    Route::get('/add',[ServiceController::class,'AddService'])->name('add.service');
    Route::post('/store',[ServiceController::class,'StoreService'])->name('store.service');
    Route::get('/edit/{id}',[ServiceController::class, 'EditService'])->name('edit.service');
    Route::post('/update/',[ServiceController::class, 'UpdateService'])->name('update.service');
    Route::get('/delete/{id}',[ServiceController::class, 'DeleteService'])->name('delete.service');
});

// projects route 
Route::prefix('project')->group(function(){
    Route::get('/manage',[ProjectController::class,'ManageProject'])->name('manage.project');
    Route::get('/add',[ProjectController::class,'AddProject'])->name('add.project');
    Route::post('/store',[ProjectController::class,'StoreProject'])->name('store.project');
    Route::get('/edit/{id}',[ProjectController::class, 'EditProject'])->name('edit.project');
    Route::post('/update/',[ProjectController::class, 'UpdateProject'])->name('update.project');
    Route::get('/delete/{id}',[ProjectController::class, 'DeleteProject'])->name('delete.project');
});

// courses route 
Route::prefix('course')->group(function(){
    Route::get('/manage',[CoursesController::class,'ManageCourse'])->name('manage.course');
    Route::get('/add',[CoursesController::class,'AddCourse'])->name('add.course');
    Route::post('/store',[CoursesController::class,'StoreCourse'])->name('store.course');
    Route::get('/edit/{id}',[CoursesController::class, 'EditCourse'])->name('edit.course');
    Route::post('/update/',[CoursesController::class, 'UpdateCourse'])->name('update.course');
    Route::get('/delete/{id}',[CoursesController::class, 'DeleteCourse'])->name('delete.course');
});

// home_page route 
Route::prefix('home')->group(function(){
    Route::get('/manage',[HomePageController::class,'ManageHome'])->name('manage.home');
    Route::get('/add',[HomePageController::class,'AddHome'])->name('add.home');
    Route::post('/store',[HomePageController::class,'StoreHome'])->name('store.home');
    Route::get('/edit/{id}',[HomePageController::class, 'EditHome'])->name('edit.home');
    Route::post('/update/',[HomePageController::class, 'UpdateHome'])->name('update.home');
    Route::get('/delete/{id}',[HomePageController::class, 'DeleteHome'])->name('delete.home');
});

// client_review route 
Route::prefix('client-review')->group(function(){
    Route::get('/manage',[ClientReviewController::class,'ManageClientReview'])->name('manage.clientreview');
    Route::get('/add',[ClientReviewController::class,'AddClientReview'])->name('add.clientreview');
    Route::post('/store',[ClientReviewController::class,'StoreClientReview'])->name('store.clientreview');
    Route::get('/edit/{id}',[ClientReviewController::class, 'EditClientReview'])->name('edit.clientreview');
    Route::post('/update/',[ClientReviewController::class, 'UpdateClientReview'])->name('update.clientreview');
    Route::get('/delete/{id}',[ClientReviewController::class, 'DeleteClientReview'])->name('delete.clientreview');
});

// footercontent route 
Route::prefix('footer-content')->group(function(){
    Route::get('/manage',[FooterController::class,'ManageFooter'])->name('manage.footer');
    Route::get('/add',[FooterController::class,'AddFooter'])->name('add.footer');
    Route::post('/store',[FooterController::class,'StoreFooter'])->name('store.footer');
    Route::get('/edit/{id}',[FooterController::class, 'EditFooter'])->name('edit.footer');
    Route::post('/update/',[FooterController::class, 'UpdateFooter'])->name('update.footer');
    Route::get('/delete/{id}',[FooterController::class, 'DeleteFooter'])->name('delete.footer');
});

// chart route 
Route::prefix('chart')->group(function(){
    Route::get('/manage',[ChartController::class,'ManageChart'])->name('manage.chart');
    Route::get('/add',[ChartController::class,'AddChart'])->name('add.chart');
    Route::post('/store',[ChartController::class,'StoreChart'])->name('store.chart');
    Route::get('/edit/{id}',[ChartController::class, 'EditChart'])->name('edit.chart');
    Route::post('/update/',[ChartController::class, 'UpdateChart'])->name('update.chart');
    Route::get('/delete/{id}',[ChartController::class, 'DeleteChart'])->name('delete.chart');
});
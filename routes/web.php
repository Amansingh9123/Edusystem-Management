<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\submitController;
//Front End--------------------
Route::get('/',[submitController::class,'home']);
Route::get('/about',[submitController::class,'about']);
Route::get('/course',[submitController::class,'course']);
Route::get('/course',[submitController::class,'fetch_course']);
Route::get('/course_details{id}',[submitController::class,'course_details']);
Route::post('/submit_course_enrollment',[submitController::class,'course_enrollment']);





Route::get('/admin',[submitController::class,'admin_home']);
//Admin Student--------
Route::get('/view_student',[submitController::class,'fetch_student']);

Route::get('/edit_student{id}',[submitController::class,'edit_student']);
Route::post('/update_student',[submitController::class,'update_student']);

Route::get('/delete_student{id}',[submitController::class,'delete_student']);
//Admin Student view Enrolled Student Data----------
Route::get('/view_enrolled_student',[submitController::class,'fetch_course_enrollment']);




// //Admin Course-------
// Route::get('/add_course',[SubmitController::class,'add_course']);
//  Route::post('/submit_course',[submitController::class,'submit_course']);

 //Admin Course-------
Route::get('/add_course',[SubmitController::class,'add_course']);
 Route::post('/submit_course',[submitController::class,'submit_course']);
 Route::get('/view_course',[submitController::class,'view_course']);
 Route::get('/fetch_course',[submitController::class,'fetch_admin_course']);
 Route::get('/edit_course{id}',[submitController::class,'edit_course']);
 Route::post('/update_course',[submitController::class,'update_course']);
 Route::get('/delete_course{id}',[submitController::class,'delete_course']);

 //Admin Faculty---------
 //Route::get('/add_faculty',[SubmitController::class,'add_faculty']);

 Route::get('/faculty',[submitController::class,'faculty_home']);

 //Admin Faculty--------

 
 Route::get('/add_faculty',[SubmitController::class,'add_faculty']);
 Route::post('/submit_faculty',[submitController::class,'submit_faculty']);
 Route::get('/view_faculty',[submitController::class,'fetch_faculty']);
 Route::get('/edit_faculty{id}',[submitController::class,'edit_faculty']);
 Route::post('/update_faculty',[submitController::class,'update_faculty']);
 Route::get('/delete_faculty{id}',[submitController::class,'delete_faculty']);
 
//Student registration--------
Route::get('/student_registration',[SubmitController::class,'student_reg']);
Route::post('/registration',[SubmitController::class,'registration']);

//Student login--------
Route::get('/student_login',[SubmitController::class,'student_login']);
Route::post('/login',[SubmitController::class,'login']);

//Student logout--------
Route::get('/student_logout',[SubmitController::class,'student_logout']);

//student dashboard--------
Route::get('/student_dashboard',[SubmitController::class,'student_dashboard']);

Route::get('/student_profile',[SubmitController::class,'student_profile']);

Route::post('/change_password',[SubmitController::class,'change_password']);

Route::get('/student_dashboard',[SubmitController::class,'fetch_student_data']);


// admin-login,logout-------------
Route::get('/admin_login',[SubmitController::class,'admin_login']);
Route::get('/admin',[submitController::class,'admin_home']);
Route::post('/admin_submit',[SubmitController::class,'admin_login_submit']);
Route::get('/admin_logout',[SubmitController::class,'admin_logout']);

//admin dashboard count-----------------

Route::get('/admin',[SubmitController::class,'admin_count']);
Route::get('/',[submitController::class,'popular_course']);
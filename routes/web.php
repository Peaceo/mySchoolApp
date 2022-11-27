<?php

use Illuminate\Support\Facades\Route;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Course;

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
    // return view('welcome');
    return view('layouts.index');
});


Route::get('/home', function(){
    return view('dashboard');
});

Route::get('/login2', function(){
    return view('auth2.login');
});

Route::get('register2', function(){
    return view('auth2.register');
});
// Route::post('posts', [App\Http\Controllers\RegisterController::class, 'store']);



Route::get('/dashboard', function () {
    // return view('dashboard');
    // return view('layouts.index');
    return view('pages.courses');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Multi authentication
Route::get('staff/register', [App\Http\Controllers\RegisterController::class, 'showLoginForm']);
Route::get('/staff', function(){
    return view('uploadResult');
});


Route::get('/courses', [App\Http\Controllers\CourseController::class, 'create']);
Route::post('/viewRegCourse', [App\Http\Controllers\CourseController::class, 'store']);
Route::get('/viewResult', [App\Http\Controllers\CourseController::class, 'regCourse']);



// Multi authentication
// Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
//   //All the admin routes will be defined here...
//   Route::get('/dashboard','HomeController@index')->name('home');
//   Route::get('/login','RegisterController@index')->name('home');
// });

/* Route::namespace('Auth')->group(function(){
        
    //Login Routes
    Route::get('/login','LoginController@showLoginForm')->name('login');
    Route::post('/login','LoginController@login');
    Route::post('/logout','LoginController@logout')->name('logout');

    //Forgot Password Routes
    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

}); */

// Route::get('linkFacultyandDep/{id}', function($id){
//     $faculty = Faculty::find($id);
//     // $departments = Faculty::all();
//      /* foreach($departments as $department){
//         echo $department;
//     } */
//     echo "Lists of departments in the faculty of " . $faculty->name . '<br>'; 
//      foreach($faculty->department as $department){
//         echo $department->name;
//         echo '<br>';
//     }
//     // return $departments;
// });

// Route::get('insertDepartments', function(){
//    /*  $dept = new Department(['name' => 'Basic Medical Sciences']);
// $faculty = Faculty::find(4); 
// $faculty->department()->save($dept);  */


// $faculty = Faculty::find(12);
 
// $faculty->department()->saveMany([
//     new Department(['name' => 'Demograpy Social Statistics']),
//     new Department(['name' => 'Political Science']),
//     new Department(['name' => 'Economics']),
//     new Department(['name' => 'Psychology']),
//     new Department(['name' => 'Geography']),
    
// ]);
// return "Departments has been successfully inserted";
// });

// Route::get('addCourses', function(){
//     $department = Department::find(4);
//     $department->courses()->saveMany([
//         new Course(['course_code'=>'POL 203', 'course_title'=> 'Political Thought: Plato to Machiavelli ', 'course_unit'=> 3, 'is_compulsory'=>1]),
//         new Course(['course_code'=>'ECN 201', 'course_title'=> 'Principles of Economics', 'course_unit'=> 3, 'is_compulsory'=>1]),
//         new Course(['course_code'=>'SSC 105 ', 'course_title'=> 'Mathematics for Social Scientists', 'course_unit'=> 3, 'is_compulsory'=>0]),
//         new Course(['course_code'=>'csC 200 ', 'course_title'=> 'Computer Appreciation', 'course_unit'=> 2, 'is_compulsory'=>1]),
//     ]);
//     return "Courses offered by ". $department->name . " has been successfully added";
// });


<?php

use App\Models\Student;
use App\Models\course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students/create', function () {
	$student = new Student();
	$student->first_name = 'John';
	$student->last_name = 'Doe';
	$student->email = 'johndoe@example.com';
	$student->age = 22;
	$student->save();
	return 'Student Created!';
});

Route::get('/students', function () {
	$students = student::all();
	return $students;
});

Route::get('/students/update', function () {
	$student = student::where('email', 'johndoe@example.com')->first();
	$student->email = 'john.doe@newmail.com';
	$student->age = 23;
	$student->save();
	return 'Student Updated!';
});

Route::get('/students/delete', function () {
	$student = student::where('email', 'john.doe@newmail.com')->first();
	$student->delete();
	return 'Student Deleted!';
});

Route::get('/courses/create', function () {
	$course = new Course();
	$course->course_name = 'Introduction to Databases';
	$course->save();
	return 'Course Crteated!';
});

Route::get('/course/{id}/students', function ($id) {
	$course = Course::find($id);
	return $course->student;
});


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
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GestionController as GestionController;

use App\Student;
use App\Course;
use App\Subscription;

/**
 * Get all students
 */
Route::get('students/', function () {
    return app('App\Http\Controllers\GestionController')->getStudents();
})->middleware('cors');

/**
 * Register a new student
 */
Route::post('student/', function() {
    app('App\Http\Controllers\GestionController')->registerStudent($_POST["firstName"], $_POST["lastName"], $_POST["id"]);
    return back();
})->middleware('cors');

/**
 * Get all courses where student is signed up
 */
Route::get('students/{student}/subscribed/', function ($student) {
    return app('App\Http\Controllers\GestionController')->getCoursesSubscribedByStudent($student);
})->middleware('cors');

/**
 * Get all courses student is not signed up
 */
Route::get('students/{student}/notSubscribed/', function ($student) {
    return app('App\Http\Controllers\GestionController')->getCoursesNotSubscribedByStudent($student);
})->middleware('cors');

/**
 * Get all courses
 */
Route::get('courses/', function() {
    return app('App\Http\Controllers\GestionController')->getCourses();
})->middleware('cors');

/**
 * Subscribe a student to a course
 */
Route::post('students/{student}/course/{course}/', function($student, $course) {
    return app('App\Http\Controllers\GestionController')->subscribeStudent($student, $course);
})->middleware('cors');

/**
 * Unsubscribe a student from a course
 */
Route::options('students/{student}/course/{course}/', function($student, $course) {
    return;
})->middleware('cors');
Route::delete('students/{student}/course/{course}/', function($student, $course) {
    return app('App\Http\Controllers\GestionController')->unsubscribeStudent($student, $course);
})->middleware('cors');

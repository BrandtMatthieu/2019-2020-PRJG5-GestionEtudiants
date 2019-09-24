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
    return app('App\Http\Controllers\GestionController')->allStudents();
})->middleware('cors');

/**
 * Register a new student
 */
Route::post('student/{student}/', function(Student $student) {
    return app('App\Http\Controllers\GestionController')->registerStudent();
})->middleware('cors');

/**
 * Get all courses where student is signed up
 */
Route::get('student/{student}/subscribed', function ($student) {
    return app('App\Http\Controllers\GestionController')->getCoursesOfStudent($student);
})->middleware('cors');

/**
 * Get all courses student is not signed up
 */
Route::get('student/{student}/notSubscribed', function (Student $student) {
    return app('App\Http\Controllers\GestionController')->getMissingCoursesOfStudents();
})->middleware('cors');

/**
 * Get all courses
 */
Route::get('courses', function() {
    return app('App\Http\Controllers\GestionController')->allCourses();
})->middleware('cors');

/**
 * Subscribe a student to a course
 */
Route::post('student/{student}/course/{course}', function() {
    return app('App\Http\Controllers\GestionController')->allCourses();
})->middleware('cors');

/**
 * Unsubscribe a student from a course
 */
Route::delete('student/{student}/course/{course}', function() {
    return app('App\Http\Controllers\GestionController')->unsubscribeFromCourse();
})->middleware('cors');
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GestionController as GestionController;

use App\Student;

/**
 * Get all students
 */
Route::get('students/', function () {
    app('App\Http\Controllers\GestionController')->allStudents();
});

/**
 * Register a new student
 */
Route::post('student/{student}/', function() {
    app('App\Http\Controllers\GestionController')->registerStudent();
});

/**
 * Get all courses where student is signed up
 */
Route::get('student/{student}/subscribed', function (Student $student) {
    app('App\Http\Controllers\GestionController')->getCoursesOfStudent();
});

/**
 * Get all courses student is not signed up
 */
Route::get('student/{student}/notSubscribed', function (Student $student) {
    app('App\Http\Controllers\GestionController')->getMissingCoursesOfStudents();
});

/**
 * Get all courses
 */
Route::get('courses', function() {
    app('App\Http\Controllers\GestionController')->allCourses();
});

/**
 * Subscribe a student to a course
 */
Route::post('student/{student}/course/{course}', function() {
    app('App\Http\Controllers\GestionController')->allCourses();
});

/**
 * Unsubscribe a student from a course
 */
Route::delete('student/{student}/course/{course}', function() {
    app('App\Http\Controllers\GestionController')->unsubscribeFromCourse();
});
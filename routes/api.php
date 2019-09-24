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
});

/**
 * Register a new student
 */
Route::post('student/{student}/', function(Student $student) {
    return app('App\Http\Controllers\GestionController')->registerStudent();
});

/**
 * Get all courses where student is signed up
 */
Route::get('student/{student}/subscribed', function ($student) {
    return app('App\Http\Controllers\GestionController')->getCoursesOfStudent($student);
});

/**
 * Get all courses student is not signed up
 */
Route::get('student/{student}/notSubscribed', function (Student $student) {
    return app('App\Http\Controllers\GestionController')->getMissingCoursesOfStudents();
});

/**
 * Get all courses
 */
Route::get('courses', function() {
    return app('App\Http\Controllers\GestionController')->allCourses();
});

/**
 * Subscribe a student to a course
 */
Route::post('student/{student}/course/{course}', function() {
    return app('App\Http\Controllers\GestionController')->allCourses();
});

/**
 * Unsubscribe a student from a course
 */
Route::delete('student/{student}/course/{course}', function() {
    return app('App\Http\Controllers\GestionController')->unsubscribeFromCourse();
});
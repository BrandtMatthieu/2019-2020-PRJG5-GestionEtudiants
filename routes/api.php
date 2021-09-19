<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GestionController as GestionController;

use App\Student;
use App\Course;
use App\Subscription;

Route::group(['middleware' => 'cors'], function() {

    Route::prefix('students')->group(function() {

        /**
         * Get all students
         */
        Route::get('/', function () {
            return app('App\Http\Controllers\GestionController')->getStudents();
        });

        /**
         * Get all courses where student is signed up
         */
        Route::get('/{idStudent}/subscribed/', function ($idStudent) {
            return app('App\Http\Controllers\GestionController')->getCoursesSubscribedByStudent($idStudent);
        });

        /**
         * Get all courses student is not signed up
         */
        Route::get('/{idStudent}/notSubscribed/', function ($idStudent) {
            return app('App\Http\Controllers\GestionController')->getCoursesNotSubscribedByStudent($idStudent);
        });

        /**
         * Subscribe a student to a course
         */
        Route::post('/{idStudent}/course/{idCourse}/', function($idStudent, $idCourse) {
            return app('App\Http\Controllers\GestionController')->subscribeStudent($idStudent, $idCourse);
        });

        /**
         * Unsubscribe a student from a course
         */
        Route::options('/{idStudent}/course/{idCourse}/', function($idStudent, $idCourse) {
            return;
        });
        Route::delete('/{idStudent}/course/{idCourse}/', function($idStudent, $idCourse) {
            return app('App\Http\Controllers\GestionController')->unsubscribeStudent($idStudent, $idCourse);
        });

    });

    /**
     * Get all courses
     */
    Route::get('courses/', function() {
        return app('App\Http\Controllers\GestionController')->getCourses();
    });

    Route::get('logs/', function() {
        return app('App\Http\Controllers\GestionController')->getLogs();
    });

});

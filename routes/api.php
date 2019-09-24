<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Controller\GestionController as GestionController;

use App\Student;

Route::get('students', function () {
    return GestionController::
});

Route::get('student/{student}', function (Student $student) {
    return $student;
});

Route::get('courses', function() {
    return DB::table('courses')->get();
});

Route::post('signup', function() {
    // TODO
    return;
});

Route::post('registerToCourse', function() {
    // TODO
    return;
});

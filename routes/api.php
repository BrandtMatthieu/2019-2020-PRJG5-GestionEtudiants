<?php

use Illuminate\Http\Request;

use App\Student;

Route::get('students', function () {
    // TODO
    return;
});

Route::get('student/{student}', function (Student $student) {
    return $student;
});

Route::get('courses', function() {
    // TODO
    return;
});

Route::post('signup', function() {
    // TODO
    return;
});

Route::post('registerToCourse', function() {
    // TODO
    return;
});
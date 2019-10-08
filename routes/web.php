<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/studentsList', function () {
    return view('studentsList');
});

Route::get('/registerStudent', function () {
    return view('registerStudent');
});

Route::get('/coursesList', function () {
    return view('coursesList');
});

Route::get('/signupToCourse', function () {
    return view('signupToCourse');
});

Route::get('/logs', function() {
    return view('logs');
});

?>

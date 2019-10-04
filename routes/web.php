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

Route::get('/coursesList', function () {
    return view('coursesList');
});

Route::get('/registerStudent', function () {
    return view('registerStudent');
});

Route::get('/signupToCourse', function () {
    return view('signupToCourse');
});

?>

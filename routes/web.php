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
Route::post('/registerStudent', function () {
    app('App\Http\Controllers\GestionController')->registerStudent($_POST["firstName"], $_POST["lastName"], $_POST["id"]);
    return view('studentsList');
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

Route::get('/login', function() {
    return view('login');
});

Route::get('/logout', function() {
    return view('logout');
});

?>

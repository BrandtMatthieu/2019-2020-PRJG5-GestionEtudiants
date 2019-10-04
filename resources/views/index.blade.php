@extends("layouts.template")

@section("title", "Accueil")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" >
<h1>Bienvenue</h1><br>
<a class="buttonLike" href="/studentsList">Liste des Étudiants</a>
<a class="buttonLike" href="/registerStudent">Inscrire un Étudiant</a>
<a class="buttonLike" href="/coursesList">Liste des Cours</a>
<a class="buttonLike" href="/signupToCourse">Inscrire un Étudiant à un Cours</a>
@endsection

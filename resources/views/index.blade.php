@extends("layouts.template")

@section("title", "Accueil")

@section("content")
<h1>Bienvenue</h1>
<div>
    <a class="buttonLike" href="/studentsList">Liste des Étudiants</a>
    <a class="buttonLike" href="/registerStudent">Enregistrer un Étudiant</a>
    <a class="buttonLike" href="/coursesList">Liste des Cours</a>
    <a class="buttonLike" href="/signupToCourse">Inscrire un Étudiant à un Cours</a>
</div>
@endsection

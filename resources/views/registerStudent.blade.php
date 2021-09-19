@extends("layouts.template")

@section("title", "Enregistrer Étudiant")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}" >
<h1>Enregistrer un Étudiant</h1>
<form action="registerStudent" method="post">
    <label for="lastName">Nom de l'Étudiant :</label><br>
    <input type="text" name="lastName" id="lastName" placeholder="Nom de famille" required><br><br>
    <label for="firstName">Prénom de l'Étudiant :</label><br>
    <input type="text" name="firstName" id="firstName" placeholder="Prénom" required><br><br>
    <label for="id">Maticule de l'Étudiant (optionnel) :</label><br>
    <input type="number" name="id" id="id" placeholder="Matricule" min="1" max="99999"><br><br>
    <input type="reset" class="buttonLike danger" value="Tout effacer">
    <input type="submit" class="buttonLike" id="submit" value="Enregistrer">
</form>
@endsection

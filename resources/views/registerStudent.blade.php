@extends("layouts.template")

@section("title", "Inscrire Étudiant")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}" >
<h1>Enregistrer un Étudiant</h1>
<form action="#" method="post">
    <label for="lastName">Nom de l'Étudiant :</label><br>
    <input type="text" name="lastName" placeholder="Nom de famille" pattern="[A-Z\- ]{1,40}" required><br><br>
    <label for="firstName">Prénom de l'Étudiant :</label><br>
    <input type="text" name="firstName" placeholder="Prénom" pattern="[A-Za-z\- ]{1,40}" required><br><br>
    <label for="id">Maticule de l'Étudiant (optionnel) :</label><br>
    <input type="number" name="id" placeholder="Matricule" min="1" max="99999"><br><br>
    <input type="reset" class="buttonLike danger" value="Tout effacer">
    <input type="submit" class="buttonLike" value="Envoyer">
</form>
@endsection
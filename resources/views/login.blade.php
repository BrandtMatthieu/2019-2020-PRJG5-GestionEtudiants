@extends("layouts.template")

@section("title", "Connexion")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}" >
<h1>Connexion</h1>
<form action="http://api.localhost:8000/login/" method="post">
    <label for="login">Login :</label><br>
    <input type="text" name="login" id="login" placeholder="Login" required><br><br>
    <label for="password">Mot de passe :</label><br>
    <input type="password" name="password" id="password" placeholder="Mot de passe" required><br><br>
    <input type="reset" class="buttonLike danger" value="Tout effacer">
    <input type="submit" class="buttonLike" id="submit" value="Se connecter">
</form>
@endsection

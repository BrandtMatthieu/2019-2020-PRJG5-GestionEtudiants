<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}" >
    <title>Gestionaire Étudiant - @yield("title")</title>
</head>
<body>
    <nav>
        <a href="/">Accueil</a>
        <a href="/studentsList">Liste des Étudiants</a>
        <a href="/registerStudent">Enregistrer un Étudiant</a>
        <a href="/coursesList">Liste des Cours</a>
        <a href="/signupToCourse">Inscrire un Étudiant à un Cours</a>
    </nav>
    <main>
        @yield("content")
    </main>
</body>
</html>
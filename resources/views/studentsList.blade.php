@extends("layouts.template")

@section("title", "Liste des Étudiants")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
<h1>Liste des Étudiants</h1>
<table>
    <tr>
        <th>
            <span title="Trier par matricule">Matricule</span>
            <span title="Trier par matricule croissant" class="sortDown">⇩</span>
            <span title="Trier par matricule décroissant" class="sortUp">⇧</span>
        </th>
        <th>
            <span title="Trier par nom">Nom</span>
            <span title="Trier nom par ordre alphabétique"class="sortDown">⇩</span>
            <span title="Trier nom par ordre alphabétique inverse" class="sortUp">⇧</span>
        </th>
        <th>
            <span title="Trier par prénom">Prénom</span>
            <span title="Trier prénom par ordre alphabétique"class="sortDown">⇩</span>
            <span title="Trier prénom par ordre alphabétique inverse" class="sortUp">⇧</span>
        </th>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
</table>
@endsection

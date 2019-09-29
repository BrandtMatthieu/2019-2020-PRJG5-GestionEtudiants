@extends("layouts.template")

@section("title", "Liste des Étudiants")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
<script src={{ asset('js/sort.js')}}></script>
<script src={{ asset('js/listStudents.js')}}></script>
<script src={{ asset('js/utils/xhr.js')}}></script>
<h1>Liste des Étudiants</h1>
<table id="table">
    <tr class="tableHeader">
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
</table>
@endsection

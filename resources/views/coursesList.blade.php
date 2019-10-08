@extends("layouts.template")

@section("title", "Liste des Cours")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
<script src={{ asset('js/sort.js')}}></script>
<script src={{ asset('js/listCourses.js')}}></script>
<script src={{ asset('js/utils/xhr.js')}}></script>
<h1>Liste des Cours</h1>
<table id="table">
    <tr>
        <th>
            <span>Id</span>
            <span title="Trier par id croissant" class="sortDown">⇩</span>
            <span title="Trier par id décroissant" class="sortUp">⇧</span>
        </th>
        <th>
            <span>Label</span>
            <span title="Trier label par ordre alphabétique"class="sortDown">⇩</span>
            <span title="Trier label par ordre alphabétique inverse" class="sortUp">⇧</span>
        </th>
        <th>
            <span>Description</span>
            <span title="Trier description par ordre alphabétique"class="sortDown">⇩</span>
            <span title="Trier description par ordre alphabétique inverse" class="sortUp">⇧</span>
        </th>
    </tr>
</table>
@endsection

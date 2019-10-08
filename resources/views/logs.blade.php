@extends("layouts.template")

@section("title", "Historique")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
<script src={{ asset('js/sort.js')}}></script>
<script src={{ asset('js/logs.js')}}></script>
<script src={{ asset('js/utils/xhr.js')}}></script>
<h1>Historique des modifications</h1>
<table id="table">
    <tr>
        <th>
            <span>Date</span>
            <span title="Trier par date croissante" class="sortDown">⇩</span>
            <span title="Trier par date décroissante" class="sortUp">⇧</span>
        </th>
        <th>
            <span>Auteur</span>
            <span title="Trier auteur par ordre alphabétique"class="sortDown">⇩</span>
            <span title="Trier auteur par ordre alphabétique inverse" class="sortUp">⇧</span>
        </th>
        <th>
            <span>Action</span>
            <span title="Trier action par ordre alphabétique"class="sortDown">⇩</span>
            <span title="Trier action par ordre alphabétique inverse" class="sortUp">⇧</span>
        </th>
    </tr>
</table>
@endsection

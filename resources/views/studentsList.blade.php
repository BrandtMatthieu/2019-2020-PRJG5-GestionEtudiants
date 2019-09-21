@extends("layouts.template")

@section("title", "Liste des Étudiants")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
<script src={{ asset('js/sort.js')}}></script>
<h1>Liste des Étudiants</h1>
<table>
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
    <tr>
        <td>15634</td>
        <td>AAAA</td>
        <td>Nom 1</td>
    </tr>
    <tr>
        <td>56165</td>
        <td>BBBB</td>
        <td>Nom 8</td>
    </tr>
    <tr>
        <td>64551</td>
        <td>ZZZZ</td>
        <td>Nom 5</td>
    </tr>
    <tr>
        <td>45645</td>
        <td>CCC</td>
        <td>Nom 4</td>
    </tr>
    <tr>
        <td>34845</td>
        <td>HHHH</td>
        <td>Nom 2</td>
    </tr>
    <tr>
        <td>146857</td>
        <td>III</td>
        <td>Nom 3</td>
    </tr>
</table>
@endsection

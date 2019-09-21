@extends("layouts.template")

@section("title", "Liste des Cours")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
<script src={{ asset('js/sort.js')}}></script>
<h1>Liste des Cours</h1>
<table>
    <tr>
        <th>
            <span>Id</span>
            <span title="Trier par id croissant" class="sortDown">⇩</span>
            <span title="Trier par id décroissant" class="sortUp">⇧</span>
        </th>
        <th>
            <span>Libellé</span>
            <span title="Trier libellé en ordre alphabétique"class="sortDown">⇩</span>
            <span title="Trier libellé en ordre alphabétique inverse" class="sortUp">⇧</span>
        </th>
    </tr>
    <tr>
        <td>dev</td>
        <td>1ère - dev</td>
    </tr>
    <tr>
        <td>atl</td>
        <td>2ème - atl</td>
    </tr>
    <tr>
        <td>per</td>
        <td>3ème - per</td>
    </tr>
    <tr>
        <td>mob</td>
        <td>3ème - mob</td>
    </tr>
    <tr>
        <td>web</td>
        <td>1ère - web</td>
    </tr>
    <tr>
        <td>sys</td>
        <td>2ème - sys</td>
    </tr>
</table>
@endsection

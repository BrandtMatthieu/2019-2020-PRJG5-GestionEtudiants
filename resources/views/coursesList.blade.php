@extends("layouts.template")

@section("title", "Liste des Cours")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
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
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
    <tr>
        <td>exemple</td>
        <td>exemple</td>
    </tr>
</table>
@endsection

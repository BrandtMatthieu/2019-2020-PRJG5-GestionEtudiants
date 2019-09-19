@extends("layouts.template")

@section("title", "Inscrire Étudiant")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
<style>
table>tbody>tr>td:nth-last-child(1) {
    background-color: transparent;
}
</style>
<h1>Inscrire un Étudiant à un Cours</h1>
<table>
    <tr>
        <td>
            <select>
                <option>12345 - NOM Prénom</option>
                <option>12345 - NOM Prénom</option>
                <option>12345 - NOM Prénom</option>
                <option>12345 - NOM Prénom</option>
                <option>12345 - NOM Prénom</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Cours</th>
        <th>Libellé</th>
    </tr>

    <tr>
        <td>DEV1</td>
        <td>Développement 1</td>
        <td><button class="buttonLike danger" title="Désinscrire">X</button></td>
    </tr>
    <tr>
        <td>DEV1</td>
        <td>Développement 1</td>
        <td><button class="buttonLike danger" title="Désinscrire">X</button></td>
    </tr>
    <tr>
        <td>DEV1</td>
        <td>Développement 1</td>
        <td><button class="buttonLike danger" title="Désinscrire">X</button></td>
    </tr>
    <tr>
        <td>DEV1</td>
        <td>Développement 1</td>
        <td><button class="buttonLike danger" title="Désinscrire">X</button></td>
    </tr>
    <tr>
        <td>DEV1</td>
        <td>Développement 1</td>
        <td><button class="buttonLike danger" title="Désinscrire">X</button></td>
    </tr>
    <tr>
        <td>DEV1</td>
        <td>Développement 1</td>
        <td><button class="buttonLike danger" title="Désinscrire">X</button></td>
    </tr>

    <tr>
        <td>
            <select>
                <option>Exemple Cours</option>
                <option>Exemple Cours</option>
                <option>Exemple Cours</option>
                <option>Exemple Cours</option>
                <option>Exemple Cours</option>
            </select>
        </td>
        <td>
            <button class="buttonLike safe" title="Inscrire">Inscrire</button>
        </td>
        <td></td>
    </tr>
</table>
@endsection
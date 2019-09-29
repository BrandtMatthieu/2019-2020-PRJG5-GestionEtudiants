@extends("layouts.template")

@section("title", "Inscrire Étudiant")

@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}" >
<script src={{ asset('js/subscribeStudent.js')}}></script>
<script src={{ asset('js/utils/xhr.js')}}></script>
<style>
    table>tbody>tr>td:nth-last-child(1) {
        background-color: transparent;
    }
</style>
<h1>Inscrire un Étudiant à un Cours</h1>
<table>
    <tr>
        <td>
            <select id="students">
            </select>
        </td>
    </tr>
    <tr>
        <th>Cours</th>
        <th>Libellé</th>
    </tr>

    <tr id="signupControls">
        <td>
            <select id="notSubscribedCourses">
            </select>
        </td>
        <td>
            <button class="buttonLike safe" title="Inscrire" id="signup">Inscrire</button>
        </td>
        <td></td>
    </tr>
</table>
@endsection

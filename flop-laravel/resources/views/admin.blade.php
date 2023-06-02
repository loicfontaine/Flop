@extends("template")


@section("content")
<div class="title m-b-md">
    <!--  Vérifier si rôle admin -->

    @can('isAdmin')
    {{Auth::user()->nickname}} est un admin
    @endcan

    <!--  Vérifier si rôle user (normalement inutile) -->
    @can('isUser')
    <!--  pour récupérer une info d'un utilisateur loggé-->
    {{Auth::user()->nickname}} est un user

    <!-- {"Variables: id":8,"lastname":"user","firstname":"user","nickname":"user","email":"user@me.me","phone_number":"12312312","color_coins":10,"address":"asd","email_verified_at":null,"created_at":"2023-06-0-->
    @endcan
    All Auth info:
    <br>
    <!--  Pour toutes les informations d'un utilisateur loggé-->
    {{Auth::user()}}

    <br>
    <!--  Vérifier si l'utilisateur est loggé-->
    @if (Auth::check())
    tu es loggé
    <!-- affiche qqch si pas loggé-->
    @else
    tu n'es pas loggé
    @endif


</div>
@endsection
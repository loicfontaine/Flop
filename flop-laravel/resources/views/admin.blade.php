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
    @endcan
    All Auth info:
    <br>
    <!--  Pour toutes les informations d'un utilisateur loggé-->
    {{Auth::user()}}

    <br>
    <!--  Vérifier si l'utilisateur est loggé-->
    @if (Auth::check())
    tu es loggé
    @endif


</div>
@endsection
@extends('template')
@section('css')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

@endsection
@section('content')

<div class='FontInter'>

    <hr id='separation'>

    <div class='input-container'>
        <div class='FontInterBlack'>
            <h2 class='titreNombreDeColorCoins'>ColorCoins</h2>
        </div>
        <img src="img/Icone-ColorCoins.png" class="ColorCoinsImage">
        <div class="FontInterBlack">
            <h2 class="nombreDeColorCoins">75</h2>
        </div>


    </div>
    @endsection
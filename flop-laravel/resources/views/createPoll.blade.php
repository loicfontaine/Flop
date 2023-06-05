@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <h2 style="color: white" class="center">Créer un sondage</h2>
        <form class="col s12" method="post" action="{{route('poll.store')}}">

        @csrf
        <div class="row">
        </div>
            <div class="row">
                <div>
                    <label style="color: white" for="title">Titre</label>
                    <input required="required" name="title" id="title" type="text" class="validate">
                    @error('title')
                    {{$message}}
                    @enderror
                </div>

                <div>
                    <label style="color: white" for="description">Description</label>
                    <input required="required" name="description" id="description" type="text" class="validate">
                    @error('description')
                    {{$message}}
                    @enderror
                </div>

                <div>
                    <label style="color: white" for="title">Heure de début</label>
                    <input required="required" type="datetime-local" class="timepicker" placeholder="start time" name="start_time">
                </div>
            </div>

            @php
            $a=[1,2,3,4];
            @endphp
            <div class="row col s12" x-data="{
                optionsNumber:2
            }">
                <h4 style="color: white">
                    Options
                </h4>
                <template x-for="i,index in optionsNumber">
                    <div class="row">
                        <div class="col s6">
                            <input required="required" name="options[][content]" id="title" type="text" class="validate" :placeholder="`Option` + i">
                        </div>
                        
                        <div class="col s6">
                                <button type="button" id="i" onclick="document.body.removeChild(this.parentNode)">Supprimer</button>
                        </div>
                    </div>
            </div>
            </template>
            <button type="button" id="i" onclick="document.body.template.appendChild(this.parentNode)">Ajouter un champ</button>
            <hr>
            <div class="center">

                <button class="waves-effect waves-light btn cyan darken-2" type="submit">
                    Create
                </button>
            </div>
    </div>
    </form>
</div>
</div>

<script>
</script>
@endsection
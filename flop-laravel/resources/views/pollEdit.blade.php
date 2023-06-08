@extends('template')
@section('content')
<!-- Afficher les éléments du sondage -->
<form action="{{ route('poll.update', $dernierSondage->id) }}" method="POST">
@foreach ($dernierSondage->elements as $element)
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

    <!-- Afficher les options de l'élément -->
    <ul>
        @foreach ($element->options as $option)
            <li>{{ $option->libelle }}</li>
        @endforeach
    </ul>
@endforeach
</form>
@endsection
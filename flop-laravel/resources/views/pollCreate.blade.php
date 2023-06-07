@extends("template")
@section('css')
<link rel="stylesheet" href="{{asset('css/admin_dashboard.css')}}">
@endsection
@section('content')
<div class="container">
  <div class="row">
    <h2 class="center">Créer un sondage</h2>
    <form class="col s12" method="post" action="{{route('poll.store')}}">

      @csrf
      <div class="row">
      </div>
      <div class="row">
        <div>
          <label for="title">Titre</label>
          <input required="required" name="title" id="title" type="text" class="validate">
          @error('title')
          {{$message}}
          @enderror
        </div>

        <div>
          <label for="description">Description</label>
          <input required="required" name="description" id="description" type="text" class="validate">
          @error('description')
          {{$message}}
          @enderror
        </div>

        <div>
          <label for="title">Durée en minutes</label>
          <input required="required" type="integer" class="timepicker" name="duration" value="">
        </div>
      </div>

      <label>Options :</label>
      <div id="conteneur-options">
        <input type="text" name="options[]" placeholder="Option" required>
      </div>
      
      <section>
        <button type="button" onclick="ajouterOption()">Ajouter une option</button>
        <button type="button" onclick="supprimerOption()">Supprimer une option</button>
      </section>

      <section>
        <button type="submit">Soumettre</button>
      </section>

  </div>
  </form>
</div>
</div>

<script>
  function ajouterOption() {
    var conteneurOptions = document.getElementById('conteneur-options');

    // Créer un nouvel élément de champ de texte
    var nouvelInput = document.createElement('input');
    nouvelInput.type = 'text';
    nouvelInput.name = 'options[]';
    nouvelInput.placeholder = 'Option';

    // Ajouter le nouvel élément au conteneur d'options
    conteneurOptions.appendChild(nouvelInput);
  }

  // Vérifier si le champ de texte de l'option est vide
  var optionsVides = Array.from(conteneurOptions.querySelectorAll('input')).some(function(input) {
    return input.value.trim() === '';
  });

  if (!optionsVides) {
    conteneurOptions.appendChild(nouvelInput);
  } else {
    alert("Veuillez remplir toutes les options existantes avant d'en ajouter une nouvelle.");
  }


  function supprimerOption() {
    var conteneurOptions = document.getElementById('conteneur-options');

    // Vérifier s'il y a plus d'une option
    if (conteneurOptions.children.length > 1) {
      // Supprimer le dernier élément de champ de texte
      conteneurOptions.removeChild(conteneurOptions.lastChild);
    }
  }
</script>
@endsection
<div class="container">
  <div class="row">
    <h2 class="center">Créer un sondage</h2>
    <form method="POST" action="{{route('poll.store')}}" accept-charset="UTF-8">
      
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
      
      <section>
        <button type="button" onclick="ajouterOption()">Ajouter une option</button>
        <button type="button" onclick="supprimerOption()">Supprimer une option</button>
      </section>

      <section>
        <button type="submit">Soumettre</button>
      </section>

  </div>
  </form>
  <form method="POST" action="{{ route('createMusic') }}">
    @csrf
    <div class="form-submit">
        <button type="submit" class="submit buttonLabel">Créer un sondage de musique</button>
    </div>
</form>
</div>
</div>

// form that contains a button to ceate a MusicPoll through the method poll.createMusic

<form method="POST" action="{{route('poll.createMusic')}}" accept-charset="UTF-8">
    <button type="submit">Créer un sondage de musique</button>
</form>
<div>
    <h2>{{ $challenge->title }}</h2>
    <!-- Affichez d'autres détails du challenge -->
    <h3>Participations :</h3>
    @foreach ($participations as $participation)
    <div></div>
        <p>{{ $participation->user->name }}</p>
        <p>{{ $participation->content->text }}</p>
    @endforeach
</div>
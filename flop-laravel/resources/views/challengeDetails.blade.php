<div>
    <h2>{{ $challenge->title }}</h2>
    <!-- Affichez d'autres détails du challenge -->
    <h3>Participations :</h3>
    @foreach ($participations as $participation)
        <p>{{ $participation->user->name }}</p>
        <p>{{ $participation->content->title }}</p>
        <p>{{ $participation->content->description }}</p>
        <p>{{ $participation->content->url }}</p>
        <p>{{ $participation->content->type }}</p>
    @endforeach
</div>

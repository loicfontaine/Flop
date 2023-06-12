@extends("template")
@section('css')
<link rel="stylesheet" href="{{asset('css/homepage.css')}}">
 @endsection
     
 @section('content')



<div id="app"></div>

<div>
  <div id="app"></div>
  <div id="test-form"></div>

<div class="square-container">

  <div class="square">
    <img src="{{asset('img/directAudio.jpg')}}" alt="Image" class="square-image">
    <div class="gray-bar gris">
      <img src="{{asset('img/iconeDirectAudio.png')}}"/>
      <p class="text FontMonserrat">Direct audio</p>
    </div>
  </div>

  <div class="square">
    <img src="{{asset('img/directVideo.jpg')}}" alt="Image" class="square-image">
    <div class="gray-bar gris"> 
      <img src="{{asset('img/iconeDirectVideo.png')}}"/>
      <p class="text FontMonserrat">Direct vidéo</p>
    </div>
  </div>

</div>


<h1 class="FontInter">Actualité</h1>
<div class="actualiteContainer">
  <div class="articleContainer">
    <img src="{{asset('img/article1.jpg')}}" alt="Article 1">
    <h2 class="titreInfo">Nouvelle émission radio</h2>
    <p class="texteInfo">Le DJ et producteur DC Salas vous fait découvrir le meilleur de la scène belge sur Couleur 3. 
      En collaboration avec Jam, la nouvelle radio musicale de la RTBF, une heure de 
      voyage entre electro, hip hop et tout ce qu'il se passe de passionnant entre deux."</p>
  </div>

  <div class="articleContainer">
    <img src="{{asset('img/article2.jpg')}}" alt="Article 2">
    <h2 class="titreInfo">Les joueurs mettent les buts, Couleur 3 met l’ambiance!</h2>
    <p class="texteInfo">Footaises est de retour à l’occasion des matchs de la Suisse, des 
        demi-finales et de la finale de la Coupe du Monde! Fidèles au poste, Fantin Moreno, Blaise Bersinger et 
        Charles Nouveau vont nous faire vibrer.</p>
  </div>
</div>

  <div id="videos">
    <h1 class="FontInter">Vidéos</h1>
    <div class="videoContainer">
      <a href="https://www.youtube.com/watch?v=ftQmxlv3sUU&pp=ygUcY291bGV1ciAzIGJvbiBiZW4gdm9pbGEgbmV3cw%3D%3D">
      <img src="{{asset('img/video1.jpg')}}" alt="Vidéo 1"></a>
      <a href="https://www.youtube.com/watch?v=x8oiLuEG9sw&pp=ygUOY291bGV1cjMgZGlzaXo%3D">
      <img src="{{asset('img/video2.jpg')}}" alt="Vidéo 2">
      </a>  
    </div>
  </div>




<div class="buttonContainer">
<button class="FontMontserrat rose"><a href="https://www.youtube.com/@Couleur3">Toutes les vidéos</a></button>
</div>
@endsection





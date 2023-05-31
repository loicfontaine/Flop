@extends("template")
@section('css')
<link rel="stylesheet" href="{{asset('css/homepage.css')}}">
 @endsection
     
 @section('content')
<!--  <div id='img'>
<img src="img/logoCouleur3.jpg" class='logoC3'>
</div> -->
<div>
  <h1 class="FontInter">Actualité</h1>
  <div class="actualiteContainer">
    <!-- Afficher les images des articles -->
     <img src="{{asset('img/article1.jpg')}}" alt="Article 1">
     <h2 class="titreInfo">Nouvelle émission radio</h2>
     <p class="texteInfo">Le DJ et producteur DC Salas vous fait découvrir le meilleur de la scène belge sur Couleur 3. 
      En collaboration avec Jam, la nouvelle radio musicale de la RTBF, une heure de 
      voyage entre electro, hip hop et tout ce qu'il se passe de passionnant entre deux."</p>
    <img src="{{asset('img/article2.jpg')}}" alt="Article 2">
    <h2 class="titreInfo">Les joueurs mettent les buts, Couleur 3 met l’ambiance!</h2>
     <p class="texteInfo">Footaises est de retour à l’occasion des matchs de la Suisse, des 
      demi-finales et de la finale de la Coupe du Monde! Fidèles au poste, Fantin Moreno, Blaise Bersinger et 
      Charles Nouveau vont nous faire vibrer.</p>
   </div>
  </div>

  <div>
    <h1 class="FontInter">Vidéos</h1>
    <div class="videoContainer">
    <img src="{{asset('img/video1.jpg')}}" alt="Vidéo 1">
    <img src="{{asset('img/video2.jpg')}}" alt="Vidéo 2">
</div>
  </div>
@endsection





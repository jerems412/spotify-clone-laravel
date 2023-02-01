@extends('welcomeHome')

@section('content')
<div class="part1" style="background:rgb(25, 230, 140);">
    <div class="content">
        <img src="Home/img/computer.svg" alt="">
        <h1>Télécharger Spotify</h1>
        <p>Écoutez des millions de titres et de podcasts sur votre appareil.</p>
        <a href="SpotifySetup.exe">Télécharger</a>
    </div>
</div>
<div class="part2" style="background:white;">
    <div class="content">
        <div class="haut">
            <h3>Écoutez aussi votre musique sur votre mobile et votre tablette.</h3>
            <p>Écouter sur votre téléphone ou votre tablette est gratuit, facile et amusant.</p>
        </div>
        <br>
        <div class="bas">
            <img src="Home/img/app-store.svg" alt="Télécharger sur l'App&nbsp;Store">
            <img src="Home/img/google-play.svg" alt="Télécharger sur Google&nbsp;Play" style="margin: -8px; height: 57px;">
            <img src="Home/img/microsoft.png" alt="Télécharger via Microsoft">
        </div>
    </div>
</div>
<div class="part3" style="background:#2c2c2c;">
    <div class="content">
        <img src="Home/img/part3.svg" alt="devices">
        <h3>Un compte pour écouter partout.</h3>
        <ul>
            <li>MOBILE</li>
            <li>ORDINATEUR</li>
            <li>TABLETTE</li>
            <li><a href="#">VOITURE</a></li>
            <li><a href="#">PLAYSTATION®</a></li>
            <li><a href="#">XBOX</a></li>
            <li><a href="#">TÉLÉVISION</a></li>
            <li><a href="#">ENCEINTE</a></li>
            <li><a href="#">LECTEUR WEB</a></li>
        </ul>
    </div>
</div>
@endsection
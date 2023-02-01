@extends('welcomeAuthentification')

@section('content')
<div class="container">
    <div class="content">
        <h1 class="logo"><span><a href="http://127.0.0.1:8000" style="text-decoration:none;color:black;"><i class="fab fa-spotify" style="font-size:50px"></i>Spotify</a></span></h1>
        <hr>
        <div class="sites">
            <a href="#" style="background:#4267B2;"><i class="fa fa-facebook" style="color:white;"></i> CONTINUONS AVEC FACEBOOK</a><br>
            <a href="#" style="background:black;"><i class="fa fa-apple"></i> CONTINUONS AVEC APPLE</a><br>
            <a href="#" style="border: 1px solid black;color:#919496;"><i class="fa fa-google"></i> CONTINUONS AVEC GOOGLE</a><br><br>
            <span>
                <hr> &nbsp OU &nbsp
                <hr>
            </span>
        </div>
        <div class="form">
            <form action="{{ url('logon') }}" method="post">
                @csrf
                <label for="">Adresse email ou nom d'utilisateur</label>
                <input type="text" name="email"  placeholder="Adresse email ou nom d'utilisateur" value="{{ $email }}">
                <label for="">Mot de passe</label>
                <input type="password" name="password"  placeholder="Mot de passe" value="{{ $password }}">
                <label for=""><a href="#">Mot de passe oublie ?</a></label>
                <div class="logDiv">
                    <input type="checkbox" name="" id="">
                    <label for="" class="check">Se souvenir de moi</label>
                    <input type="submit" value="SE CONNECTER">
                </div>
                <br><hr>
                <h2>Vous n'avez pas de compte ?</h2>
                <a href="{{ url('register') }}" class="jnp">JE N'AI PAS SPOTIFY</a>
            </form>
        </div>
    </div>
</div>
@endsection
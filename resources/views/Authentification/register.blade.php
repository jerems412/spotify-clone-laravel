@extends('welcomeAuthentification')

@section('content')
<div class="container">
    <div class="content">
    <h1 class="logo"><span><a href="http://127.0.0.1:8000/" style="text-decoration:none;color:black;"><i class="fab fa-spotify" style="font-size:50px"></i>Spotify</a></span></h1>
        <h1>Inscrivez-vous gratuitement <br> pour lancer la lecture.</h2>
        <div class="sites">
            <a href="#" style="background:#4267B2;"><i class="fa fa-facebook" style="color:white;"></i> CONTINUONS AVEC FACEBOOK</a><br>
            <a href="#" style="border: 1px solid black;color:#919496;"><i class="fa fa-google"></i> CONTINUONS AVEC GOOGLE</a><br><br>
            <span>
                <hr> &nbsp OU &nbsp
                <hr>
            </span>
        </div>
        <div class="form">
            <form action="" method="post">
                @csrf
                <h2>Inscrivez-vous avec votre adresse e-mail</h2>
                <label for="">Quelle est votre adresse e-mail ?</label>
                <input type="email" name="Email" id="" placeholder="Saisissez votre adresse e-mail." value="" required>
                <label for="">Confirmez votre adresse e-mail</label>
                <input type="email" name="Email1" id="" placeholder="Saisissez de nouveau votre adresse e-mail." value="" required>
                <label for="">Créez un mot de passe</label>
                <input type="password" name="mdp" id="" minlength="4" placeholder="Creez un mot de passe." value="" required>
                <label for="">Comment doit-on vous appeler ?</label>
                <input type="text" name="name" id="" maxlength="10" placeholder="Saisissez un nom de profil." value="" required>
                <label for="" style="font-weight: 100;">Celui-ci apparaît sur votre profil.</label>
                <label for="" class="check">Quelle est votre date de naissance ?</label>
                <input type="date" name="birth" id="" value="" required>
                <label for="" class="check">Quel est votre sexe ?</label>
                <div class="sexe">
                    <input type="radio" name="genre" id="Masculin" value="masculin">
                    <label for="Masculin" class="check" style="margin-top:3%;">Masculin</label>
                    <input type="radio" name="genre" id="Feminin" value="feminin">
                    <label for="Feminin" class="check" style="margin-top:3%;">Feminin</label>
                    <input type="radio" name="genre" id="Non-Binaire" value="non binaire">
                    <label for="Non-Binaire" class="check" style="margin-top:3%;">Non binaire</label>
                </div>
                <div class="sexe">
                    <input type="checkbox" name="accept" id="" required>
                    <label for="" class="check" style="font-size: 14px;font-weight: 100;margin-top: 1.8%;">J'accepte de recevoir des actualités et des offres de Spotify</label>
                </div>
                <div class="sexe">
                    <input type="checkbox" name="accptt" id="" style="width:88px">
                    <label for="" class="check" style="font-size: 14px;font-weight: 100;margin-top: 1.8%;">Partagez les données sur mon inscription avec les fournisseurs de contenu de Spotify à des fins de marketing. Notez que vos données peuvent être transférées vers des pays en dehors de l'Espace économique européen, comme précisé dans notre Politique de confidentialité.</label>
                </div>
                <p>En cliquant sur le bouton d'inscription, vous acceptez les <a href="#">Conditions générales d'utilisation de Spotify.</a></p>
                <p>Pour en savoir plus sur la façon dont Spotify recueille, utilise, partage et protège vos données personnelles, veuillez consulter la <a href="#">Politique de confidentialité de Spotify.</a></p>
                <div>
                    <input type="submit" value="S'INSCRIRE">
                </div>
                <p style="font-size: 16px;">Vous avez déjà un compte ? <a href="{{ url('login') }}" style="font-size: 16px;">Connectez-vous.</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
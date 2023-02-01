@extends('welcomeHome')

@section('content')
<div class="part1Assistance" style="background:#0c67d3;background-image: url(public/Home/img/search-desktop.webp);background-size: cover;">
    <div class="content">
        <h1>Que pouvons-nous faire <br> pour vous ?</h1>
        <input type="text" name="search" id="" placeholder="Rechercher">
        <div class="list">
            <dl class="L1">
                <dt>CONNEXION</dt>
                <dd>Réinitialisation du mot de <br> passe impossible</dd>
            </dl>
            <dl class="L2">
                <dt>RÉSOLUTION DES PROBLÈMES</dt>
                <dd>Mon compte n'a pas l'air <br> d'être le bon</dd>
            </dl>
            <dl class="L3">
                <dt>CONNEXION</dt>
                <dd>J'ai oublié mes identifiants</dd>
            </dl>
            <dl class="L4">
                <dt>ABONNEMENTS DISPONIBLES</dt>
                <dd>Démarrer ou rejoindre un <br> abonnement Famille</dd>
            </dl>
        </div>
    </div>
</div>
<div class="part2Assistance" style="background:#dedede;">
    <div class="content">
        <div class="list1">
            <dl class="L1">
                <dt><h3>Aide relative aux paiements</h3></dt>
                <dd>Gérer les paiements</dd>
                <dd>Modes de paiement</dd>
                <dd>Aide relative à la facturation</dd>
            </dl>
            <dl class="L2">
                <dt><h3>Aide relative aux abonnements</h3></dt>
                <dd>Abonnements disponibles</dd>
                <dd>Préférences d'abonnement</dd>
                <dd>Premium Famille et Spotify Kids</dd>
                <dd>Premium Duo</dd>
                <dd>Premium Étudiants</dd>
            </dl>
            <dl class="L3">
                <dt><h3>Aide relative à l'appli</h3></dt>
                <dd>Préférences de l'appli</dd>
                <dd>Résolution des problèmes</dd>
                <dd>Playlists</dd>
                <dd>Fonctionnalités</dd>
                <dd>Fonctionnalités de partage</dd>
                <dd>Assistants vocaux</dd>
            </dl>
        </div>
        <div class="list2">
            <dl class="L1">
                <dt><h3>Aide relative aux appareils</h3></dt>
                <dd>Enceintes</dd>
                <dd>Montres intelligentes</dd>
                <dd>TV</dd>
                <dd>Gaming</dd>
                <dd>Voitures</dd>
            </dl>
            <dl class="L2">
                <dt><h3>Données et confidentialité</h3></dt>
                <dd>Confidentialité d'écoute</dd>
                <dd>Informations relatives aux <br> données et à la confidentialité</dd>
            </dl>
            <dl class="L3">
                <dt><h3>Aide relative aux comptes</h3></dt>
                <dd>Connexion</dd>
                <dd>Aide relative au profil</dd>
                <dd>Paramètres du compte</dd>
                <dd>Sécurité</dd>
            </dl>
        </div>
    </div>
</div>
<div class="part3Assistance" style="background:white;">
    <div class="content">
        <h1>Consultez la communauté</h1>
        <p>Vous avez des questions ? Trouvez une réponse auprès de <br> notre communauté mondiale de fans experts !</p>
        <a href="#">Trouver des réponses</a>
    </div>
    <br>
</div>
@endsection
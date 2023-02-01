<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spotify</title>
        <link rel="icon" href="icon.svg" type="image/icon svg">
        <link rel="stylesheet" href="Home/css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="antialiased">
        <div class="container" style="background-image:url('public/Home/img/font-1.svg');background-color: rgb(41, 65, 171);background-size: 153%;background-position: center top 30%;background-repeat: no-repeat;background-size: 200%;">
            <div class="menu" style="background:black;">
                <nav>
                <span><a href="http://127.0.0.1:8000" style="text-decoration:none;color:White;"><i class="fab fa-spotify" style="font-size:40px"></i>Spotify</a></span>
                    <ul>
                        <li><a href="{{ url('premium') }}">Premium</a></li>
                        <li><a href="{{ url('assistance') }}">Assistance</a></li>
                        <li><a href="{{ url('telecharger') }}">Telecharger</a></li>
                        <li> | </li>
                        <li><a href="{{ url('register') }}">Inscription</a></li>
                        <li><a href="{{ route('login') }}">Connexion</a></li>
                    </ul>
                </nav>
            </div>
            @yield('content')
            <div class="footerHome" style="background: black;">
                <footer>
                    <div class="logo">
                    <span><i class="fab fa-spotify" style="font-size:40px"></i>Spotify</span>
                    </div>
                    <div class="list">
                        <dl class="left">
                            <dt>SOCIETE</dt>
                            <dd>A propos</dd>
                            <dd>Offres d'emploi</dd>
                            <dd>For the Record</dd>
                        </dl>
                        <dl class="center">
                            <dt>COMMUNAUTES</dt>
                            <dd>Espace artiste</dd>
                            <dd>Developpeurs</dd>
                            <dd>Campagnes <br> publicitaires</dd>
                            <dd>Investissement</dd>
                            <dd>Fournisseurs</dd>
                        </dl>
                        <dl class="right">
                            <dt>LIENS UTILES</dt>
                            <dd>Assistance</dd>
                            <dd>Lecteur Web</dd>
                            <dd>Appli mobile gratuite</dd>
                        </dl>
                    </div>
                    <div class="socialMedia">
                        <ul>
                            <li><span><i class="fa fa-instagram"></i></span></li>
                            <li><span><i class="fa fa-twitter"></i></span></li>
                            <li><span><i class="fa fa-facebook"></i></span></li>
                        </ul>
                    </div>
                    <div class="country">
                        <p>Senegal</p>
                    </div>
                    <div class="year">  
                        <ul>
                            <li>Légal</li>
                            <li>Centre de confidentialité</li>
                            <li>Protection des données</li>
                            <li>Paramètres des cookies</li>
                            <li>À propos des pubs</li>
                        </ul>
                        <span>© 2022 Spotify AB</span>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>

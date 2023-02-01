<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spotify {{ $title }}</title>
        <!-- Liens -->
    <link rel="icon" href="{{ asset('icon.svg') }}" type="image/icon svg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('SpaceUser/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('SpaceUser/css/fontawesome/css/all.css')}}">
    </head>
    <body class="antialiased" style="background: rgb(30 30 30);">
        <div class="container" id="container">
            <section class="menu" style="background:black;">
                <div class="logo">
                    <span><i class="fab fa-spotify"></i>
                        <p>Spotify</p>
                    </span>
                </div>
                <div class="liensMenu">
                    <ul>
                        <li><a href="{{ route('space_user') }}" style="{{ $active1 }}" ><i class="fa-solid fa-house"></i>&nbsp&nbsp&nbspHome</a></li>
                        <li><a href="{{ route('search') }}" style="{{ $active2 }}" ><i class="fa-solid fa-magnifying-glass"></i>&nbsp&nbsp&nbspSearch</a></li>
                        <li><a href="{{ route('playlist') }}" style="{{ $active3 }}" ><i class="fa-solid fa-book-open"></i>&nbsp&nbsp&nbspYour Library</a></li>
                    </ul>
                </div><br>
                <div class="other">
                    <ul>
                        <li><a href="{{ route('add_playlist') }}" style="{{ $active4 }}" ><i class="fa-solid fa-square-plus"></i>&nbsp&nbsp&nbspCreate Playlist</a></li>
                        <li><a href="{{ route('liked_song') }}" style="{{ $active5 }}" ><i class="fa-solid fa-heart"></i>&nbsp&nbsp&nbspLiked Songs</a></li>
                    </ul>
                </div>
                <hr>
                <br><br><br><br><br><br><br><br><br><br>
                <div class="other">
                    <ul>
                        <li><a href="{{ asset('SpotifySetup.exe ') }}"><i class="fa-solid fa-circle-arrow-down"></i>&nbsp&nbsp&nbspInstall App</a></li>
                    </ul>
                </div>
            </section>
            @yield('content')
            <div class="SignOut" id="SignOutId" style="background: #282828;display:none;position:fixed;">
                <a href="#">Account</a>
                <a href="{{ route('profil') }}">Profile</a>
                <a href="#">Upgrade to Premium</a>
                <a href="http://127.0.0.1:8000">Log out</a>
            </div>
        </div>
        <section class="playMusic" style="background: #181818;">
            <div class="gauchePM">
                <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt="">
                <ul>
                    <li>{{ $ecoute -> titre }}</li>
                    <li style="cursor:pointer;"><a style="color: #b3b3b3;font-size: 13px;text-decoration:none;" href="{{ route('space_artist',['id'=>$ecoute->idArtist]) }}">{{ $ecoute -> nameArtist }}</a></li>
                </ul>
                <i class="fa-solid fa-heart" style="cursor:pointer;color:
                @if($like == true)
                    #1ed760
                @else
                    white
                @endif;margin-left:15%;" id="like" onclick="likeEcoute('{{ route('like_musique',['id'=>$ecoute->id]) }}')"></i>
            </div>
            <div class="centerPM">
                <div class="hautPM">
                    <i class="fa-solid fa-shuffle" style="color:#696969;font-size:18px;"></i>
                    <i class="fa-solid fa-backward-step" style="color:#696969;font-size:22px;" onclick="prev('{{ route('prev') }}')"></i>
                    <i class="fa-solid fa-circle-play" style="color:white;" id="play"></i>
                    <i class="fa-solid fa-forward-step" style="color:#696969;font-size:22px;" onclick="next('{{ route('next') }}')"></i>
                    <i class="fa-solid fa-repeat" style="color:#696969;font-size:18px;" id="repeat"></i>
                </div><br>
                <div class="basPM">
                    <span id="curr_time">00:00</span>&nbsp
                    <input type="range" name="" id="rangeM">
                    &nbsp<span id="total_time">{{ $ecoute -> duree }}</span>
                </div>
            </div>
            <div class="droitePM">
                <i class="fa-solid fa-microphone" style="color:white;"></i>
                <i class="fa-solid fa-list" style="color:white;"></i>
                <i class="fa-solid fa-music" style="color:white;"></i>
                <i class="fa-solid fa-volume-low" style="color:white;" id="blockVolume"></i>
                <input type="range" name="" id="volume" min="0" max="1" step="0.1">
            </div>
            <audio src="{{ asset('musics/'.$ecoute->nameCategorie.'/'.$ecoute->titre.'.mp3') }}" id="music"  min="0" max="100" step="1"></audio>
        </section>
    </body>
    <script src="{{ asset('SpaceUser/js/menu.js') }}"></script>
    <script src="{{ asset('SpaceUser/ajax/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('SpaceUser/ajax/app.js') }}"></script>
</html>

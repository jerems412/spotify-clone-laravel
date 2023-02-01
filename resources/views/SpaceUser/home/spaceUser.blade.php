@extends('welcomeSpaceUser')

@section('content')
<section class="content">
    <nav>
        <span style="cursor:no-drop"><i class="fa-solid fa-chevron-left"></i></span>
        <span id="avancer"><i class="fa-solid fa-chevron-right"></i></span>
        <a href="#">UPGRADE</a>
        <button id="account"><i class="fa-solid fa-circle-user" style="color:#b3b3b3;font-size:20px;"></i>&nbsp&nbsp{{ $user -> name }}&nbsp<i class="fa-solid fa-caret-down"></i></button>
    </nav><br><br><br>
    <div class="content1">
        <div class="recent">
            <h1>Recently played</h1>
            <div class="list">
                @foreach ($listMusicRecent as $value)
                    <a href="{{ route('playmusic',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2, 48).'.jpg') }}" alt=""><br>
                        <h4>
                            @if(strlen($value->titre)>=16)
                                {{substr($value->titre,0,14)}}{{ '...' }}
                            @else 
                                {{ $value->titre}}
                            @endif
                        </h4>
                        <p>{{ $value -> nameArtist }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="recent">
            <h1>Popular new releases</h1>
            <div class="list">
                @foreach ($listPopularMusic as $value)
                    <a href="{{ route('playmusic',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2, 48).'.jpg') }}" alt=""><br>
                        <h4>
                            @if(strlen($value->titre)>=16)
                                {{substr($value->titre,0,14)}}{{ '...' }}
                            @else 
                                {{ $value->titre}}
                            @endif
                        </h4>
                        <p>{{ $value -> nameArtist }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="recent">
            <h1>Recommended for today</h1>
            <h1 style="font-weight: 100px;font-size:13px;color:#b3b3b3;margin-top: -1%;">Inspired by your recent activity.</h1>
            <div class="list">
                @foreach ($listMusic as $value)
                    <a href="{{ route('playmusic',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2, 48).'.jpg') }}" alt=""><br>
                        <h4>
                            @if(strlen($value->titre)>=16)
                                {{substr($value->titre,0,14)}}{{ '...' }}
                            @else 
                                {{ $value->titre}}
                            @endif
                        </h4>
                        <p>{{ $value -> nameArtist }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="recent">
            <h1>Spotify Playlists</h1>
            <div class="list">
                @foreach ($listSpotifyPlaylist as $value)
                    <a href="{{ route('space_spotify_playlist',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2, 48).'.jpg') }}" alt=""><br>
                        <h4>
                            @if(strlen($value->namePlaylist)>=16)
                                {{substr($value->namePlaylist,0,14)}}{{ '...' }}
                            @else 
                                {{ $value->namePlaylist}}
                            @endif
                        </h4>
                        <p>
                            @if(strlen($value->description)>=18)
                                {{substr($value->description,0,16)}}{{ '...' }}
                            @else 
                                {{ $value->description}}
                            @endif
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="recent">
            <h1>Popular album</h1>
            <div class="list">
                @foreach ($listPopularAlbum as $value)
                    <a href="{{ route('space_album',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2, 48).'.jpg') }}" alt=""><br>
                        <h4>
                            @if(strlen($value->nameAlbum)>=16)
                                {{substr($value->nameAlbum,0,14)}}{{ '...' }}
                            @else 
                                {{ $value->nameAlbum}}
                            @endif
                        </h4>
                        <p>{{ $value -> nameArtist }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="recent">
            <h1>Popular Artist</h1>
            <div class="list">
                @foreach ($listPopularArtist as $value)
                    <a href="{{ route('space_artist',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2, 48).'.jpg') }}" alt="" style="border-radius: 100px;"><br>
                        <h4>{{ $value -> nameArtist }}</h4>
                        <p></p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
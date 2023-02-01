@extends('welcomeSpaceUser')

@section('content')
<section class="content">
    <nav class="libraryLink">
        <span id="retour"><i class="fa-solid fa-chevron-left"></i></span>
        <span id="avancer"><i class="fa-solid fa-chevron-right"></i></span>
        <a href="{{ route('playlist') }}" style="background: #333333;">Playlists</a>
        <a href="{{ route('podcast') }}">Podcasts</a>
        <a href="{{ route('artist') }}">Artists</a>
        <a href="{{ route('album') }}">Albums</a>
        <button style="margin-left: 28%;" id="account"><i class="fa-solid fa-circle-user" style="color:#b3b3b3;font-size:20px;"></i>&nbsp&nbsp{{ $user -> name }}&nbsp<i class="fa-solid fa-caret-down"></i></button>
    </nav><br><br><br>
    <div class="content1">
        <div class="recent">
            <h1>Playlists</h1>
            <div class="list">
                @foreach($listPlaylist as $value)
                    <a href="{{ route('space_playlist',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt=""><br>
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
            <h1>Spotify Playlists Like</h1>
            <div class="list">
                @foreach($listPlaylistSpotifyLike as $value)
                    <a href="{{ route('space_spotify_playlist',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt=""><br>
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
    </div>
</section>
@endsection
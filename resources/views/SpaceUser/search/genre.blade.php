@extends('welcomeSpaceUser')

@section('content')
<section class="content">
    <nav style="background:black;">
        <span><i class="fa-solid fa-chevron-left"></i></span>
        <span id="avancer"><i class="fa-solid fa-chevron-right"></i></span>
        <a href="#">UPGRADE</a>
        <button id="account"><i class="fa-solid fa-circle-user" style="color:#b3b3b3;font-size:20px;"></i>&nbsp&nbsp{{ $user -> name }}&nbsp<i class="fa-solid fa-caret-down"></i></button>
    </nav><br>
    <div class="content1">
        <div class="recent">
            <h1 class="genre">{{ $genre }}</h1>
            <h1 style="margin-top: -3%;">Popular Playlists</h1>
            <div class="list">
                @foreach($playlist as $value)
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
                            @if(strlen($value->description)>=16)
                                {{substr($value->description,0,14)}}{{ '...' }}
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
@extends('welcomeSpaceUser')

@section('content')
<section class="content">
    <nav>
        <span id="retour"><i class="fa-solid fa-chevron-left"></i></span>
        <span id="avancer"><i class="fa-solid fa-chevron-right"></i></span>
        <a href="#">UPGRADE</a>
        <button id="account"><i class="fa-solid fa-circle-user" style="color:#b3b3b3;font-size:20px;"></i>&nbsp&nbsp{{ $user -> name }}&nbsp<i class="fa-solid fa-caret-down"></i></button>
    </nav><br><br><br>
    <div class="content1">
        <div class="part1">
            <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt="" style="width:210px;height: 210px;">
            <ul>
                <li>PROFILE</li>
                <li>{{ $user -> name }}</li>
                <li>{{ $nbPlaylist }} Public Playlist {{ $nbAbonnement }} Following</li>
            </ul>
        </div>
        <div class="recent" style="width:97%;">
            <h1>Public Playlist</h1>
            <div class="list">
                @foreach ($listPlaylist as $value)
                    <a href="{{ route('space_playlist',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt=""><br>
                        <h4>{{ $value -> namePlaylist }}</h4>
                        <p>Vous</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="recent" style="width:97%;">
            <h1>Following</h1>
            <div class="list">
                @foreach ($listFollowing as $value)
                    <a href="{{ route('space_artist',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt="" style="border-radius: 100px;"><br>
                        <h4>{{ $value -> nameArtist }}</h4>
                        <p></p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
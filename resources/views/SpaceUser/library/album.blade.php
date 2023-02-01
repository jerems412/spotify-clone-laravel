@extends('welcomeSpaceUser')

@section('content')
<section class="content">
    <nav class="libraryLink">
        <span id="retour"><i class="fa-solid fa-chevron-left"></i></span>
        <span id="avancer"><i class="fa-solid fa-chevron-right"></i></span>
        <a href="{{ route('playlist') }}">Playlists</a>
        <a href="{{ route('podcast') }}">Podcasts</a>
        <a href="{{ route('artist') }}">Artists</a>
        <a href="{{ route('album') }}" style="background: #333333;">Albums</a>
        <button style="margin-left: 28%;" id="account"><i class="fa-solid fa-circle-user" style="color:#b3b3b3;font-size:20px;"></i>&nbsp&nbsp{{ $user -> name }}&nbsp<i class="fa-solid fa-caret-down"></i></button>
    </nav><br><br><br>
    <div class="content1">
        <div class="recent">
            <h1>Albums</h1>
            <div class="list">
                @foreach ($listAlbum as $value)
                    <a href="{{ route('space_album',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt=""><br>
                        <h4>{{ $value -> nameAlbum }}</h4>
                        <p>{{ $value -> nameArtist }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="recent">
            <h1>Albums Like</h1>
            <div class="list">
                @foreach ($listAlbumLike as $value)
                    <a href="{{ route('space_album',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt=""><br>
                        <h4>{{ $value -> nameAlbum }}</h4>
                        <p>{{ $value -> nameArtist }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
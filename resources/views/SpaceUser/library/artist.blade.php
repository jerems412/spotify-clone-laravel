@extends('welcomeSpaceUser')

@section('content')
<section class="content">
    <nav class="libraryLink">
        <span id="retour"><i class="fa-solid fa-chevron-left"></i></span>
        <span id="avancer"><i class="fa-solid fa-chevron-right"></i></span>
        <a href="{{ route('playlist') }}">Playlists</a>
        <a href="{{ route('podcast') }}">Podcasts</a>
        <a href="{{ route('artist') }}" style="background: #333333;">Artists</a>
        <a href="{{ route('album') }}">Albums</a>
        <button style="margin-left: 28%;" id="account"><i class="fa-solid fa-circle-user" style="color:#b3b3b3;font-size:20px;"></i>&nbsp&nbsp{{ $user -> name }}&nbsp<i class="fa-solid fa-caret-down"></i></button>
    </nav><br><br><br>
    <div class="content1">
        <div class="recent">
            <h1>Artists</h1>
            <div class="list">
                @foreach ($listArtist as $value)
                    <a href="{{ route('space_artist',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt="" style="border-radius:30px;"><br>
                        <h4>{{ $value->nameArtist }}</h4>
                        <p></p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
@extends('welcomeSpaceUser')

@section('content')
<section class="content">
    <nav class="libraryLink">
        <span id="retour"><i class="fa-solid fa-chevron-left"></i></span>
        <span id="avancer"><i class="fa-solid fa-chevron-right"></i></span>
        <a href="{{ route('playlist') }}">Playlists</a>
        <a href="{{ route('podcast') }}" style="background: #333333;">Podcasts</a>
        <a href="{{ route('artist') }}">Artists</a>
        <a href="{{ route('album') }}">Albums</a>
        <button style="margin-left: 28%;" id="account"><i class="fa-solid fa-circle-user" style="color:#b3b3b3;font-size:20px;"></i>&nbsp&nbsp{{ $user -> name }}&nbsp<i class="fa-solid fa-caret-down"></i></button>
    </nav><br><br><br>
    <div class="content1">
        <div class="recent">
            <h1>Podcasts</h1>
            <div class="list">
                @for($i=0;$i<15;$i++)
                    <a href="#">
                        <img src="{{ asset('SpaceUser/img/bg18.jpg') }}" alt=""><br>
                        <h4>Titre</h4>
                        <p>Artiste</p>
                    </a>
                @endfor
            </div>
        </div>
    </div>
</section>
@endsection
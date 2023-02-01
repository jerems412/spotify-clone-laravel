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
            <img src="{{ asset('SpaceUser/img/bg1.png') }}" alt="" style="width:210px;height: 210px;">
            <ul>
                <li>PLAYLIST</li>
                <li>Liked Songs</li>
                <li>{{ $user -> name }} . {{ $nbLikedSong }} songs</li>
            </ul>
        </div>
        <div class="part2" style="background: #121212;">
            <table>
                <thead>
                    
                </thead>
                <tbody>
                    <tr>
                        <th style="font-size: 40px;min-width: 100px;"><i class="fa-solid fa-circle-play" style="color:#1ed760;" id="playA"></i></th>
                    </tr>
                    <tr style="border-bottom: .6px solid #b3b3b3;">
                        <th>&nbsp&nbsp#</th>
                        <th style="min-width: 350PX;">TITLE</th>
                        <th style="min-width: 290PX;">ALBUM</th>
                        <th style="min-width: 100PX;">DATE ADDED</th>
                        <th></th>
                        <th style="min-width: 60px; text-align:center;"><i class="fa-regular fa-clock"></i></th>
                        <th></th>
                    </tr>
                    @foreach ($listMusicLike as $value )
                        <tr class="trMusique">
                            <td style="border-radius: 4px 0 0 4px;cursor:pointer;">&nbsp&nbsp<a href="{{ route('playmusic',['id'=>$value->id]) }}"><i class="fa-solid fa-play" style="color:white;font-size:20px;"></i></a></td>
                            <td>{{ $value -> titre }} <br><a href="{{ route('space_artist',['id'=>$value->idArtist]) }}" style="cursor:pointer;">{{ $value -> nameArtist }}</a></td>
                            <td><a href="{{ route('space_album',['id'=>$value->idAlbum]) }}" style="cursor:pointer;">{{ $value -> nameAlbum }}</a></td>
                            <td>{{ $value -> dateLike }}</td>
                            <td><i class="fa-solid fa-heart" style="color:#1ed760;"></i></td>
                            <td style="text-align:center;">{{ $value -> duree }}</td>
                            <td style="padding-right: 10px;border-radius: 0 4px 4px 0;"><i class="fa-solid fa-circle-info"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
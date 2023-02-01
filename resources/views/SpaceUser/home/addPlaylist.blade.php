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
                <li style="margin-bottom:1%;">PLAYLIST</li>
                <li style="margin-bottom:1%;"><input id="namePlaylistCreate" style="background:transparent;border:0;outline:none;color:white;font-weight:bold;font-size: 80px;width:100%;" type="text" value="{{ $playlist ->namePlaylist }}" onblur="updateNamePlaylist('http://127.0.0.1:8000/updatePlaylist{{ $playlist->id }}',this)"></li>
                <li>{{ $user -> name }} <span style="font-size:30px">.</span> <input style="background:transparent;border:0;outline:none;color:white;font-weight:bold;font-size: 13px;width:90%;" type="text" placeholder="Description" value="{{ $playlist ->description }}" onblur="updateDescPlaylist('http://127.0.0.1:8000/updateDescription{{ $playlist->id }}',this)"></li>
            </ul>
        </div>
        <div class="part2" style="background: #121212;">
            <table style="overflow: auto;height: 70vh;" id="tableAjoutmxp">
                <tbody>
                    <tr>
                        <th style="font-size: 22px;color:White;font-weight:bold;">Recommended <br> </th>
                    </tr>
                    @foreach ($listMusic as $value)
                        <tr class="trMusique" id="musicAjout{{ $value -> id }}">
                            <td style="border-radius: 4px 0 0 4px;">&nbsp&nbsp<a href="{{ route('playmusic',['id'=>$value->id]) }}"><i class="fa-solid fa-play" style="color:white;font-size:20px;"></i></a></td>
                            <td style="min-width: 350px;text-align:left;;">{{ $value->titre}} <br><a href="{{ route('space_artist',['id'=>$value->idArtist]) }}" style="cursor:pointer;">{{ $value->nameArtist}}</a></td>
                            <td style="min-width: 290PX;"><a href="{{ route('space_album',['id'=>$value->idAlbum]) }}" style="cursor:pointer;">{{ $value->nameAlbum}}</a></td>
                            <td style="padding-right: 10px;border-radius: 0 4px 4px 0;"><button style="background:transparent;border:1px solid white;font-weight:bold;border-radius:20px;width:70px;color:white;padding:8px;cursor:pointer;" onclick="addMusicXPlaylist('{{ route('add_music_playlist',['id'=>$value->id,'idplaylist'=>$playlist->id]) }}',{{ $value->id }})">Add</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
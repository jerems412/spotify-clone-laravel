@extends('welcomeSpaceUser')

@section('content')
<section class="content">
    <nav>
        <span><i class="fa-solid fa-chevron-left"></i></span>
        <span id="avancer"><i class="fa-solid fa-chevron-right"></i></span>
        <a href="#">UPGRADE</a>
        <button id="account"><i class="fa-solid fa-circle-user" style="color:#b3b3b3;font-size:20px;"></i>&nbsp&nbsp{{ $user -> name }}&nbsp<i class="fa-solid fa-caret-down"></i></button>
    </nav><br><br><br>
    <div class="content1">
        <div class="part1">
            <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt="" style="width:210px;height: 210px;">
            <ul>
                <li>ALBUM</li>
                <li>{{ $album -> nameAlbum }}</li>
                <li>{{ $album -> nameArtist }}</li>
            </ul>
        </div>
        <div class="part2" style="background: #121212;">
            <table>
                <thead>
                    
                </thead>
                <tbody>
                    <tr>
                        <th style="font-size: 40px;min-width: 100px;"><i class="fa-solid fa-circle-play" style="color:#1ed760;" id="playA"></i>&nbsp<i class="fa-solid fa-heart" style="color:
                        @if($likeA == true)
                            #1ed760
                        @else
                            white
                        @endif" id="likeAlbum" onclick="likeAlbumSpotify('{{ route('like_album',['id'=>$album->id]) }}')"></i></th>
                    </tr>
                    <tr style="border-bottom: .6px solid #b3b3b3;">
                        <th>&nbsp&nbsp#</th>
                        <th style="min-width: 720px;">TITLE</th>
                        <th></th>
                        <th style="min-width: 60px; text-align:center;"><i class="fa-regular fa-clock"></i></th>
                        <th></th>
                        <th> </th>
                    </tr>
                    <tr>
                        <th style="font-weight: bold;padding-top:5%;"><i class="fa-solid fa-compact-disc"></i>&nbspDISC1</th>
                    </tr>
                    @foreach($listMusic as $value)
                        <tr class="trMusique">
                            <td style="border-radius: 4px 0 0 4px;">&nbsp&nbsp<a href="{{ route('playmusic',['id'=>$value->id]) }}"><i class="fa-solid fa-play" style="color:white;font-size:20px;"></i></a></td>
                            <td>{{ $value -> titre }} <br><a href="{{ route('space_artist',['id'=>$value->idArtist]) }}" style="cursor:pointer;">{{ $value -> nameArtist }}</a></td>
                            <td><i class="fa-solid fa-heart"></i></td>
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
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
            <ul style="margin-left: -7%;">
                <li><i class="fa-solid fa-certificate" style="color:#3d91f4;font-size:20px;"></i>&nbsp&nbsp&nbspVerified Artist</li>
                <li>{{ $artist -> nameArtist }}</li>
                <li>{{ $listener }} listener <span style="font-size:30px">.</span> <span id="nbFollowers">{{ $followers }}</span> Followers</li>
            </ul>
        </div>
        <div class="part2" style="background: #181818;">
            <table style="margin-left: -5%;">
                <thead>
                    
                </thead>
                <tbody>
                    <tr>
                        <th style="font-size: 60px;min-width: 100px;"><i class="fa-solid fa-circle-play" style="color:#1ed760;" id="playA"></i>&nbsp</th>
                        <th>
                            <button id="buttonFollow" onclick="addAbo('{{ route('follow',['id'=>$artist->id]) }}')">
                                @if($follow == false)
                                    FOLLOWING
                                @else
                                    FOLLOW
                                @endif
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <th style="font-size: 22px;font-weight:600;color:white;">Popular</th>
                    </tr>
                    @foreach ($listMusic as $value)
                        <tr class="trMusique">
                            <td style="border-radius: 4px 0 0 4px;">&nbsp&nbsp<a href="{{ route('playmusic',['id'=>$value->id]) }}"><i class="fa-solid fa-play" style="color:white;font-size:20px;"></i></a></td>
                            <td style="min-width: 450px;text-align:left;">{{ $value -> titre }} <br>E</td>
                            <td style="min-width: 200px;">{{ $value -> nb }}</td>
                            <td><i class="fa-solid fa-heart"></i></td>
                            <td style="padding-right: 10px;text-align:center;border-radius: 0 4px 4px 0;">&nbsp&nbsp{{ $value -> duree }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="recent" style="margin-left: 0;">
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
    </div>
</section>
@endsection
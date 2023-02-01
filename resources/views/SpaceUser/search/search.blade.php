@extends('welcomeSpaceUser')

@section('content')
<section class="content">
    <nav style="background:black;">
        <span id="retour"><i class="fa-solid fa-chevron-left"></i></span>
        <span id="avancer"><i class="fa-solid fa-chevron-right"></i></span>
        <div class="inputSearch" style="background:white;">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="" id="" placeholder="Artists, songs, or podcasts" onkeyup="SearchValeur('http://127.0.0.1:8000/searchVal',this);SearchValeurArtist('http://127.0.0.1:8000/searchArtist',this)" onblur="addSearchVal('http://127.0.0.1:8000/addSearch',this)" />
        </div>
        <button id="account"><i class="fa-solid fa-circle-user" style="color:#b3b3b3;font-size:20px;"></i>&nbsp&nbsp{{ $user -> name }}&nbsp<i class="fa-solid fa-caret-down"></i></button>
    </nav><br><br>
    <div class="content1">
        <div class="Search">
            <h1>Recents search</h1>
            <div class="list">
                @foreach ($recentSearch as $value)
                    <a href="{{ route('playmusic',['id'=>$value->id]) }}">
                        <img src="{{ asset('SpaceUser/img/bg'.rand(2,48).'.jpg') }}" alt=""><br>
                        <h4>
                            @if(strlen($value->titre)>=16)
                                {{substr($value->titre,0,14)}}{{ '...' }}
                            @else
                                {{ $value->titre}}
                            @endif
                        </h4>
                        <p>{{ $value -> nameArtist }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="Search">
            <h1>Your top genres</h1>
            <div class="listTopGenre">
                @foreach ($listCategorie as $value)
                    <a href="{{ route('genre',['name'=>$value-> nameCategorie]) }}" style="background: {{ $value -> color }};" value="">{{ $value -> nameCategorie }}</a>
                @endforeach
            </div>
        </div>
        <div class="Search">
            <h1>Browse all</h1>
            <div class="listBrowse">
                @foreach ($categorie as $value)
                    <a href="{{ route('genre',['name'=>$value-> nameCategorie]) }}" style="background: {{ $value -> color }};" value="">{{ $value -> nameCategorie }}</a>
                @endforeach
            </div>
        </div>
        <div class="recent" style="display:none;" id="divSearchResult">
            <h1>Search Result</h1>
            <div class="list" id="listSearchResult">
            
            </div>
        </div>
        <div class="recent" style="display:none;" id="divSearchResult1">
            <h1>Search Result Artist</h1>
            <div class="list" id="listSearchResult1">
            
            </div>
        </div>
    </div> 
</section>
@endsection
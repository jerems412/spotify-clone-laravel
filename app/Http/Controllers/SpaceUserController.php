<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musique;
use App\Models\MusicXPlaylist;
use App\Models\Ecoute;
use App\Models\Artist;
use App\Models\User;
use App\Models\Album;
use App\Models\Playlist;
use App\Models\SpotifyPlaylist;
use App\Models\Like;
use App\Models\Search;
use App\Models\LikeAlbum;
use App\Models\LikePlaylist;
use App\Models\Abonnement;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class SpaceUserController extends Controller
{
    //play musics

    public function playMusic(Request $request,$id)
    {
        $user = User::find(session('user')->id);
        $musique = Musique::find($id);
        $ecoute = new Ecoute();
        $ecoute -> user_id = $user->id;
        $ecoute -> musique_id = $musique->id;
        $ecoute -> save();
        return back();
    }

    //like music
    public function likeMusique(Request $request,$id)
    {
        if($this->likeMusiqueExist($request,$id)){
            $like = DB::select('SELECT * FROM likes l WHERE l.musique_id=:id AND l.user_id=:id1',['id'=>$id,'id1'=> session('user')->id]);
            $like = Like::find($like[0]->id);
            $like -> delete();
        }else{
            $user = User::find(session('user')->id);
            $musique = Musique::find($id);
            $like = new Like();
            $like -> user_id = $user->id;
            $like -> musique_id = $musique->id;
            $like -> dateLike = date('d-m-Y');
            $like -> save();
        }
        //return back();
    }

    //like album
    public function likeAlbum(Request $request,$id)
    {
        if($this->likeAlbumExist($request,$id)){
            $like = DB::select('SELECT * FROM likealbums l WHERE l.album_id=:id AND l.user_id=:id1',['id'=>$id,'id1'=> session('user')->id]);
            $like = LikeAlbum::find($like[0]->id);
            $like -> delete();
        }else{
            $user = User::find(session('user')->id);
            $album = Album::find($id);
            $like = new LikeAlbum();
            $like -> user_id = $user->id;
            $like -> album_id = $album->id;
            $like -> dateLike = date('d-m-Y');
            $like -> save();
        }
    }

    //like playlist
    public function likePlaylist(Request $request,$id)
    {
        if($this->likePlaylistExist($request,$id)){
            $like = DB::select('SELECT * FROM likeplaylists l WHERE l.playlist_id=:id AND l.user_id=:id1',['id'=>$id,'id1'=> session('user')->id]);
            $like = LikePlaylist::find($like[0]->id);
            $like -> delete();
        }else{
            $user = User::find(session('user')->id);
            $playlist = SpotifyPlaylist::find($id);
            $like = new LikePlaylist();
            $like -> user_id = $user->id;
            $like -> playlist_id = $playlist->id;
            $like -> dateLike = date('d-m-Y');
            $like -> save();
        }
    }

    //like music exist
    public function likeMusiqueExist(Request $request,$id)
    {
        $var = DB::select('SELECT * from likes l WHERE l.user_id = :id AND l.musique_id = :id1',['id'=>session('user')->id,'id1'=>$id]);
        if(!empty($var))
        {
            return true;
        }else{
            return false;
        }
    }

    //like playlist exist
    public function likePlaylistExist(Request $request,$id)
    {
        $var = DB::select('SELECT * from likeplaylists l WHERE l.user_id = :id AND l.playlist_id = :id1',['id'=>session('user')->id,'id1'=>$id]);
        if(!empty($var))
        {
            return true;
        }else{
            return false;
        }
    }

    //like album exist
    public function likeAlbumExist(Request $request,$id)
    {
        $var = DB::select('SELECT * from likealbums l WHERE l.user_id = :id AND l.album_id = :id1',['id'=>session('user')->id,'id1'=>$id]);
        if(!empty($var))
        {
            return true;
        }else{
            return false;
        }
    }

    //get pages
    //home

    public function addPlaylist(Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', session('create_playlist')+1);
        $listMusic = $this -> listMusic();
        if(session('create_playlist') == 1)
        {
            $nbPlaylist = Playlist::where('user_id',session('user')->id)->count() + 1;
            $name = "MY PLAYLIST #".$nbPlaylist;
            $playlist = new Playlist();
            $playlist -> dateCreation = date('d-m-Y');
            $playlist -> namePlaylist = $name;
            $playlist -> description = '';
            $user = User::find(session('user')->id);
            $playlist -> user_id = $user->id;
            $playlist -> save();
            $request->session()->put('spaceCreate', $playlist);
        }
        return view('SpaceUser.home.addPlaylist',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => '',
            'active2' => '',
            'active3' => '',
            'active4' => 'color:white;',
            'active5' => '',
            'title' => ' - '.session('spaceCreate')->namePlaylist,
            'listMusic' => $listMusic,
            'playlist' => session('spaceCreate'),
        ]);
    }

    public function likedSong(Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $nbLikedSong = Like::where('user_id',session('user')->id)->count();
        $listMusicLike = $this -> listMusicLike();
        return view('SpaceUser.home.likedSong',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => '',
            'active2' => '',
            'active3' => '',
            'active4' => '',
            'active5' => 'color:white;',
            'title' => ' - Liked Songs',
            'nbLikedSong' => $nbLikedSong,
            'listMusicLike' => $listMusicLike,
        ]);
    }

    public function profil(Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $nbPlaylist = Playlist::where('user_id',session('user')->id)->count();
        $listPlaylist = Playlist::where('user_id',session('user')->id)->get();
        $listFollowing = $this -> listFollowing();
        $nbAbonnement = Abonnement::where('user_id',session('user')->id)->count();
        return view('SpaceUser.home.profil',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => 'color:white;',
            'active2' => '',
            'active3' => '',
            'active4' => '',
            'active5' => '',
            'title' => ' - '.session('user')->name,
            'nbPlaylist' => $nbPlaylist,
            'listPlaylist' => $listPlaylist,
            'listFollowing' => $listFollowing,
            'nbAbonnement' => $nbAbonnement,
        ]);
    }

    public function spaceArtist($id,Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $artist = Artist::find($id);
        $listener = $this -> listener($id);
        $followers = Abonnement::where('artist_id',$id)->count();
        $listMusic = $this -> listMusicArtist($id);
        $listAlbum = $this-> listAlbumArtist($id);
        $follow = $this -> existFollow($id);
        return view('SpaceUser.home.spaceArtist',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => 'color:white;',
            'active2' => '',
            'active3' => '',
            'active4' => '',
            'active5' => '',
            'title' => ' - '.$artist->nameArtist,
            'artist' => $artist,
            'listener' => $listener,
            'followers' => $followers,
            'follow' => $follow,
            'listMusic' => $listMusic,
            'listAlbum' => $listAlbum,
        ]);
    }

    public function spacePlaylistSpotify($id,Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $playlist = SpotifyPlaylist::find($id);
        $likeP = $this ->likePlaylistExist($request,$playlist->id);
        $listMusic = $this -> listMusicXSpotifyPlaylist($id);
        return view('SpaceUser.home.spacePlaylistSpotify',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'likeP' => $likeP,
            'active1' => 'color:white;',
            'active2' => '',
            'active3' => '',
            'active4' => '',
            'active5' => '',
            'title' => ' - '.$playlist->namePlaylist,
            'playlist' => $playlist,
            'listMusic' => $listMusic,
        ]);
    }

    public function spaceUser(Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $listMusicRecent = $this -> recentPlayedMusic();
        $listPopularMusic = $this -> popularMusic();
        $listPopularArtist = $this -> popularArtist();
        $listPopularAlbum = $this -> popularAlbum();
        $listSpotifyPlaylist = $this -> spotifyPlaylist();
        $listMusic = $this -> listMusic();
        return view('SpaceUser.home.spaceUser',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => 'color:white;',
            'active2' => '',
            'active3' => '',
            'active4' => '',
            'active5' => '',
            'title' => ' - Web Player',
            'listMusicRecent' => $listMusicRecent,
            'listPopularMusic' => $listPopularMusic,
            'listPopularArtist' => $listPopularArtist,
            'listPopularAlbum' => $listPopularAlbum,
            'listSpotifyPlaylist' => $listSpotifyPlaylist,
            'listMusic' => $listMusic,
        ]);
    }

    //library

    public function album(Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $listAlbum = $this ->listUserAlbum();
        $listAlbumLike = $this ->listUserAlbumLike();
        return view('SpaceUser.library.album',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => '',
            'active2' => '',
            'active3' => 'color:white;',
            'active4' => '',
            'active5' => '',
            'title' => ' - Your Library',
            'listAlbum' => $listAlbum,
            'listAlbumLike' => $listAlbumLike,
        ]);
    }

    public function artist(Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $listArtist = $this ->listUserArtist();
        return view('SpaceUser.library.artist',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => '',
            'active2' => '',
            'active3' => 'color:white;',
            'active4' => '',
            'active5' => '',
            'title' => ' - Your Library',
            'listArtist' => $listArtist,
        ]);
    }

    public function playlist(Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $listPlaylist = $this -> listUserPlaylist();
        $listPlaylistSpotifyLike = $this -> listUserPlaylistSpotifyLike();
        return view('SpaceUser.library.playlist',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => '',
            'active2' => '',
            'active3' => 'color:white;',
            'active4' => '',
            'active5' => '',
            'title' => ' - Your Library',
            'listPlaylist' => $listPlaylist,
            'listPlaylistSpotifyLike' => $listPlaylistSpotifyLike,
        ]);
    }

    public function podcast(Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        return view('SpaceUser.library.podcast',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => '',
            'active2' => '',
            'active3' => 'color:white;',
            'active4' => '',
            'active5' => '',
            'title' => ' - Your Library',
        ]);
    }

    //search

    public function genre($name,Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $playlist = $this -> PlaylistGenre($name);
        $genre = $name;
        return view('SpaceUser.search.genre',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => '',
            'active2' => 'color:white;',
            'active3' => '',
            'active4' => '',
            'active5' => '',
            'title' => ' - '.$genre->nameCategorie,
            'playlist' => $playlist,
            'genre' => $genre,
        ]);
    }

    public function spaceAlbum($id,Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $album = $this -> albumSpaceAlbum($id);
        $likeA = $this ->likeAlbumExist($request,$album->id);
        $listMusic = $this -> listMusicAlbum($id);
        return view('SpaceUser.search.spaceAlbum',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'likeA' => $likeA,
            'active1' => '',
            'active2' => 'color:white;',
            'active3' => '',
            'active4' => '',
            'active5' => '',
            'title' => ' - '.$album->nameAlbum,
            'album' => $album,
            'listMusic' => $listMusic,
        ]);
    }

    public function spacePlaylist($id,Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $playlist = Playlist::find($id);
        $recommander = $this -> listMusic();
        $listMusic = $this -> listMusicPlaylist($id);
        return view('SpaceUser.search.spacePlaylist',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => '',
            'active2' => 'color:white;',
            'active3' => '',
            'active4' => '',
            'active5' => '',
            'title' => ' - '.$playlist->namePlaylist,
            'playlist' => $playlist,
            'recommander' => $recommander,
            'listMusic' => $listMusic,
        ]);
    }

    public function search(Request $request)
    {
        $ecoute = $this ->LastEcoute(session('user')->id);
        $like = $this ->likeMusiqueExist($request,$ecoute[0]->id);
        $request->session()->put('ecoute', $ecoute[0]);
        $request->session()->put('create_playlist', 0);
        $categorie = Categorie::all();
        $listCategorie = $this -> YourCategorie();
        $recentSearch = $this -> RecentSearch();
        return view('SpaceUser.search.search',[
            'user' => session('user'),
            'ecoute' => session('ecoute'),
            'like' => $like,
            'active1' => '',
            'active2' => 'color:white;',
            'active3' => '',
            'active4' => '',
            'active5' => '',
            'title' => ' - Search',
            'categorie' => $categorie,
            'listCategorie' => $listCategorie,
            'recentSearch' => $recentSearch,
        ]);
    }

    //other functions

    public function recentPlayedMusic()
    {
        return $musics = DB::select('SELECT DISTINCT m.id,m.titre,m.duree,aa.nameArtist,e.dateEcoute 
                                    FROM musiques m,artists aa,ecoutes e 
                                    WHERE m.artist_id=aa.id AND m.id=e.musique_id AND e.user_id= :id 
                                    ORDER BY e.created_at DESC',['id'=>session('user') -> id]);
    }

    public function popularMusic()
    {
        return $musics = DB::select('SELECT DISTINCT m.id,m.titre,m.duree,a.nameArtist,aa.nameAlbum,c.nameCategorie, count(e.id) nb 
                                    FROM musiques m,albums aa, artists a,categories c, ecoutes e 
                                    WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id AND m.id=e.musique_id 
                                    GROUP BY m.id ORDER BY nb DESC');
    }

    public function spotifyPlaylist()
    {
        return $playlist = SpotifyPlaylist::all();
    }

    public function popularAlbum()
    {
        return $album = DB::select('SELECT DISTINCT a.id,a.nameAlbum,aa.nameArtist,count(e.id) nb 
                                    FROM albums a,artists aa,musiques m,ecoutes e 
                                    WHERE a.artist_id=aa.id AND a.id=m.album_id AND aa.id=m.artist_id AND m.id=e.musique_id 
                                    GROUP BY m.id ORDER BY nb DESC');
    }

    public function popularArtist()
    {
        return $artist = DB::select('SELECT DISTINCT aa.id,aa.nameArtist,count(e.id) nb 
                                    FROM artists aa,musiques m,ecoutes e 
                                    WHERE aa.id=m.artist_id AND m.id=e.musique_id 
                                    GROUP BY m.id ORDER BY nb DESC');
    }

    public function listMusic()
    {
        return $music = DB::select('SELECT m.id,m.titre,m.duree,a.nameArtist,a.id idArtist,aa.nameAlbum,aa.id idAlbum,c.nameCategorie 
                                    FROM musiques m,albums aa, artists a,categories c 
                                    WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id');
    }

    public function listMusicLike()
    {
        return $music = DB::select('SELECT DISTINCT m.id,m.titre,m.duree,a.nameArtist,a.id idArtist,aa.id idAlbum,aa.nameAlbum,c.nameCategorie,k.dateLike 
                                    FROM musiques m,albums aa, artists a,categories c,likes k 
                                    WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id AND m.id=k.musique_id AND k.user_id=:id',['id'=>session('user')->id]);
    }

    public function listFollowing()
    {
        return $music = DB::select('SELECT DISTINCT a.id,a.nameArtist 
                                    FROM artists a,abonnements aa 
                                    WHERE a.id=aa.artist_id AND aa.user_id=:id',['id'=>session('user')->id]);
    }

    public function listMusicArtist($id)
    {
        return $music = DB::select('SELECT DISTINCT m.id,m.titre,m.duree,a.nameArtist,aa.nameAlbum,c.nameCategorie, count(e.id) nb 
                                    FROM musiques m,albums aa, artists a,categories c, ecoutes e 
                                    WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id AND m.id=e.musique_id AND m.artist_id=:id 
                                    GROUP BY m.id ORDER BY nb DESC',['id'=>$id]);
    }

    public function listAlbumArtist($id)
    {
        return $album = DB::select('SELECT DISTINCT a.id,a.nameAlbum,aa.nameArtist 
                                    FROM albums a,artists aa
                                    WHERE a.artist_id=aa.id AND aa.id = :id 
                                    GROUP BY a.id ORDER BY a.id',['id'=> $id]);
    }

    public function listener($id)
    {
        $listener = DB::select('SELECT count(e.id) nb 
                                    FROM ecoutes e,musiques m 
                                    WHERE e.musique_id=m.id AND m.artist_id = :id',['id'=> $id]);
        return (!empty($listener[0]->nb)) ? $listener[0]->nb : 0;
    }

    public function existFollow($id)
    {
        $var = DB::select('SELECT * from abonnements a WHERE a.user_id = :id AND a.artist_id = :id1',['id'=>session('user')->id,'id1'=>$id]);
        if(empty($var))
        {
            return true;
        }else{
            return false;
        }
    }

    public function listMusicXSpotifyPlaylist($id)
    {
        return $album = DB::select('SELECT m.id,m.titre,m.duree,a.nameArtist,a.id idArtist,aa.id idAlbum,aa.nameAlbum,c.nameCategorie,mp.dateAjout 
                                    FROM musiques m,albums aa, artists a,categories c,musicxplaylistspotifys mp 
                                    WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id AND m.id=mp.musique_id AND mp.spotifyplaylist_id=:id',['id'=> $id]);
    }

    public function albumSpaceAlbum($id)
    {
        $album = DB::select('SELECT a.id,a.nameAlbum,aa.nameArtist 
                                    FROM albums a,artists aa 
                                    WHERE a.artist_id=aa.id AND a.id = :id',['id'=> $id]);
        return $album[0];
    }

    public function listMusicAlbum($id)
    {
        return $music = DB::select('SELECT m.id,m.titre,m.duree,a.nameArtist,a.id idArtist,aa.nameAlbum,c.nameCategorie 
                                    FROM musiques m,albums aa, artists a,categories c 
                                    WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id AND aa.id=:id',['id'=> $id]);
    }

    public function listMusicPlaylist($id)
    {
        return $music = DB::select('SELECT m.id,m.titre,m.duree,a.nameArtist,a.id idArtist,aa.id idAlbum,aa.nameAlbum,c.nameCategorie,mp.dateAjout 
                                    FROM musiques m,albums aa, artists a,categories c,musicxplaylists mp 
                                    WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id AND m.id=mp.musique_id AND mp.playlist_id=:id',['id'=> $id]);
    }

    public function YourCategorie()
    {
        return $categorie = DB::select('SELECT c.id,c.nameCategorie,c.color,count(e.id) nb 
                                        FROM categories c,musiques m,ecoutes e 
                                        WHERE c.id=m.categorie_id AND m.id=e.musique_id AND e.user_id=:id 
                                        GROUP BY c.id ORDER BY nb DESC',['id'=> session('user')->id]);
    }

    public function PlaylistGenre($name)
    {
        return $categorie = DB::select('SELECT p.id,p.namePlaylist,p.dateCreation,p.description 
                                        FROM spotifyplaylists p 
                                        WHERE p.genre=:id',['id'=> $name]);
    }

    public function RecentSearch()
    {
        return $music = DB::select('SELECT DISTINCT m.id,m.titre,m.duree,a.nameArtist,a.id idArtist,aa.nameAlbum,aa.id idAlbum,c.nameCategorie 
                                    FROM musiques m,albums aa, artists a,categories c,searchs s 
                                    WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id AND s.user_id=:id AND m.titre 
                                    LIKE s.valSearch
                                    ORDER BY s.created_at DESC',['id'=> session('user')->id]);
    }

    public function listUserAlbum()
    {
        return $album = DB::select('SELECT DISTINCT a.id,a.nameAlbum,aa.nameArtist 
                                    FROM albums a,artists aa,musiques m,ecoutes e 
                                    WHERE a.id=m.album_id AND a.artist_id=aa.id AND m.id=e.musique_id AND e.user_id=:id',['id'=> session('user')->id]);
    }

    public function listUserAlbumLike()
    {
        return $album = DB::select('SELECT a.id,a.nameAlbum,aa.nameArtist 
                                    FROM albums a,artists aa,likealbums l 
                                    WHERE a.artist_id=aa.id AND a.id=l.album_id AND l.user_id=:id',['id'=> session('user')->id]);
    }

    public function listUserArtist()
    {
        return $artist = DB::select('SELECT DISTINCT a.id,a.nameArtist 
                                    FROM artists a,musiques m,ecoutes e 
                                    WHERE a.id=m.artist_id AND m.id=e.musique_id AND e.user_id=:id',['id'=> session('user')->id]);
    }

    public function listUserPlaylist()
    {
        return $playlist = DB::select('SELECT p.id,p.dateCreation,p.namePlaylist,p.description 
                                    FROM playlists p WHERE p.user_id=:id',['id'=> session('user')->id]);
    }

    public function listUserPlaylistSpotifyLike()
    {
        return $playlist = DB::select('SELECT p.id,p.namePlaylist,p.dateCreation,p.description,p.genre 
                                        FROM spotifyplaylists p,likeplaylists l 
                                        WHERE p.id=l.playlist_id AND l.user_id=:id',['id'=> session('user')->id]);
    }

    public function LastEcoute($id)
    {
        $ecoute = DB::select('SELECT * FROM ecoutes WHERE id=(SELECT max(id) FROM ecoutes e WHERE e.user_id=:id)',['id'=>$id]);
        return $music = DB::select('SELECT m.id,m.titre,m.duree,a.nameArtist,a.id idArtist,aa.nameAlbum,aa.id idAlbum,c.nameCategorie 
                                    FROM musiques m,albums aa, artists a,categories c 
                                    WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id AND m.id = :id',['id'=> $ecoute[0]->musique_id]);
    }

    public function deletePlaylist($id)
    {
        $mxp = MusicXPlaylist::where('playlist_id','=',$id);
        $mxp -> delete();
        $playlist = Playlist::find($id);
        $playlist -> delete();
    }

    public function deleteMusicXPlaylist($id,$idplaylist)
    {
        $mxp = DB::select('DELETE FROM musicxplaylists WHERE musique_id=:idd AND playlist_id = :id',['idd'=>$id,'id'=>$idplaylist]);
    }

    public function addMusicXPlaylist($id,$idplaylist)
    { 
        $music = Musique::find($id);
        $playlist = Playlist::find($idplaylist);
        $mxp = new MusicXPlaylist();
        $mxp -> dateAjout = date('d-m-Y');
        $mxp -> musique_id = $music -> id;
        $mxp -> playlist_id = $playlist -> id;
        $mxp -> save();
    }

    public function follow($id)
    { 
        $var = DB::select('SELECT * from abonnements a WHERE a.user_id = :id AND a.artist_id = :id1',['id'=>session('user')->id,'id1'=>$id]);
        if(!empty($var))
        {
            $abo = Abonnement::find($var[0]->id);
            $abo -> delete();
        }else{
            $user = User::find(session('user')->id);
            $artist = Artist::find($id);
            $abo = new Abonnement();
            $abo -> dateAbonnement = date('d-m-Y');
            $abo -> user_id = $user -> id;
            $abo -> artist_id = $artist -> id;
            $abo -> save();
        }
    }

    public function updatePlaylist1($id,$name)
    { 
        $playlist = Playlist::find($id);
        $playlist -> namePlaylist = $name;
        $playlist -> save();
    }

    public function updatePlaylist2($id,$description)
    { 
        $playlist = Playlist::find($id);
        $playlist -> description = $description;
        $playlist -> save();
    }

    public function searchVal($val)
    {
        $var = DB::select("SELECT m.id,m.titre,m.duree,a.nameArtist,a.id idArtist,aa.nameAlbum,aa.id idAlbum,c.nameCategorie 
        FROM musiques m,albums aa, artists a,categories c 
        WHERE m.album_id=aa.id AND m.artist_id=a.id AND m.categorie_id=c.id AND m.titre 
        LIKE '%".$val."%'");
        if (empty($var)) {
            echo json_encode("0");
        } else {
            echo json_encode($var);
        }
    }

    public function searchArtist($value)
    {
        $var = DB::select("SELECT a.id,a.nameArtist FROM artists a WHERE a.nameArtist LIKE '%".$value."%'");
        if (empty($var)) {
            echo json_encode("0");
        } else {
            echo json_encode($var);
        }
    }

    //ajout search
    public function addSearch($val)
    {
        $search = new Search();
        $user = User::find(session('user')->id);
        $search -> user_id = $user -> id;
        $search -> valSearch = $val;
        $search -> save();
    }

    //ajout search
    public function next(Request $request)
    {
        $listMusic = $this -> listMusic();
        $nb = rand(0,count($listMusic));
        $request->session()->put('preview', session('ecoute'));
        $request->session()->put('ecoute', $listMusic[$nb]);
        $request->session()->put('nextPrev', 1);
        $this -> playMusic($request,session('ecoute')->id);
    }

    //ajout search
    public function prev(Request $request)
    {
        if(session('preview')){
            $request->session()->put('ecoute', session('preview'));
            $this -> playMusic($request,session('ecoute')->id);
        }
    }
}

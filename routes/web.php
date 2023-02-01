<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EcouteController;
use App\Http\Controllers\LikeAlbumController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LikePlaylistController;
use App\Http\Controllers\MusicXPlaylistController;
use App\Http\Controllers\MusicXPlaylistSpotifyController;
use App\Http\Controllers\MusiqueController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SpaceAdminController;
use App\Http\Controllers\SpaceUserController;
use App\Http\Controllers\SpotifyPlaylistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['home'])->group(function () {
    //Access url for login
    Route::get('/login', [AuthentificationController::class, 'login'])->name('login');
    Route::post('/logon', [AuthentificationController::class, 'loginOn']);
    Route::get('/register', [AuthentificationController::class, 'register']);
    Route::post('/register/persist', [AuthentificationController::class, 'register_persist']);
    Route::get('/forget', [AuthentificationController::class, 'forget']);

    //Access url for home
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/premium', [HomeController::class, 'premium']);
    Route::get('/telecharger', [HomeController::class, 'telecharger']);
    Route::get('/assistance', [HomeController::class, 'assistance']);
});

//Access url for user
Route::middleware(['spaceUser'])->group(function () {
    //play music
    Route::get('/playmusic{id}', [SpaceUserController::class, 'playMusic'])-> name('playmusic');
    Route::get('/next', [SpaceUserController::class, 'next'])-> name('next');
    Route::get('/prev', [SpaceUserController::class, 'prev'])-> name('prev');
    Route::get('/searchVal{val}', [SpaceUserController::class, 'searchVal'])-> name('search_val');
    Route::get('/searchArtist{value}', [SpaceUserController::class, 'searchArtist'])-> name('search_valartist');
    Route::get('/addSearch{val}', [SpaceUserController::class, 'addSearch'])-> name('add_search');
    Route::get('/likeMusique{id}', [SpaceUserController::class, 'likeMusique'])-> name('like_musique');
    Route::get('/likeAlbum{id}', [SpaceUserController::class, 'likeAlbum'])-> name('like_album');
    Route::get('/likePlaylist{id}', [SpaceUserController::class, 'likePlaylist'])-> name('like_playlist');
    Route::get('/deletePlaylist{id}', [SpaceUserController::class, 'deletePlaylist'])-> name('delete_playlist');
    Route::get('/deleteMusicXPlaylist{id}/{idplaylist}', [SpaceUserController::class, 'deleteMusicXPlaylist'])-> name('delete_music_playlist');
    Route::get('/addMusicXPlaylist{id}/{idplaylist}', [SpaceUserController::class, 'addMusicXPlaylist'])-> name('add_music_playlist');
    Route::get('/uploadPlaylist{id}', [SpaceUserController::class, 'uploadPlaylist'])-> name('uploadplaylist');
    Route::get('/follow{id}', [SpaceUserController::class, 'follow'])-> name('follow');
    Route::get('/updatePlaylist{id}/{name}', [SpaceUserController::class, 'updatePlaylist1'])-> name('update_playlist_name');
    Route::get('/updateDescription{id}/{name}', [SpaceUserController::class, 'updatePlaylist2'])-> name('update_playlist_desc');

    Route::prefix('home')->group(function () {
        Route::get('/addPlaylist', [SpaceUserController::class, 'addPlaylist'])-> name('add_playlist');
        Route::get('/likedSong', [SpaceUserController::class, 'likedSong']) -> name('liked_song');
        Route::get('/profil', [SpaceUserController::class, 'profil'])-> name('profil');
        Route::get('/spaceArtist{id}', [SpaceUserController::class, 'spaceArtist'])-> name('space_artist');
        Route::get('/spacePlaylistSpotify{id}', [SpaceUserController::class, 'spacePlaylistSpotify'])-> name('space_spotify_playlist');
        Route::get('/spaceUser', [SpaceUserController::class, 'spaceUser'])-> name('space_user');
        
    });

    Route::prefix('library')->group(function () {
        Route::get('/album', [SpaceUserController::class, 'album'])-> name('album');
        Route::get('/artist', [SpaceUserController::class, 'artist'])-> name('artist');
        Route::get('/playlist', [SpaceUserController::class, 'playlist'])-> name('playlist');
        Route::get('/podcast', [SpaceUserController::class, 'podcast'])-> name('podcast');
    });

    Route::prefix('search')->group(function () {
        Route::get('/genre{name}', [SpaceUserController::class, 'genre'])-> name('genre');
        Route::get('/search', [SpaceUserController::class, 'search'])-> name('search');
        Route::get('/spaceAlbum{id}', [SpaceUserController::class, 'spaceAlbum'])-> name('space_album');
        Route::get('/spacePlaylist{id}', [SpaceUserController::class, 'spacePlaylist'])-> name('space_playlist');
    });
});


//Access url for admin
Route::middleware(['spaceAdmin'])->group(function () {

    Route::prefix('homeAdmin')->group(function () {
        Route::get('/index', [SpaceAdminController::class, 'index'])-> name('index');
        Route::get('/listAlbum', [SpaceAdminController::class, 'listAlbum'])-> name('list_album');
        Route::get('/listArtist', [SpaceAdminController::class, 'listArtist'])-> name('list_artist');
        Route::get('/listSpotifyPlaylist', [SpaceAdminController::class, 'listSpotifyPlaylist'])-> name('list_spotify_playlist');
        Route::get('/listUser', [SpaceAdminController::class, 'listUser'])-> name('list_user');
        Route::get('/userInfos{id}', [SpaceAdminController::class, 'userInfos'])-> name('user_infos');
    });

});


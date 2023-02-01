<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Role_User;
use App\Models\Album;
use App\Models\Artist;
use App\Models\SpotifyPlaylist;

class SpaceAdminController extends Controller
{
    public function index()
    {
        return view('SpaceAdmin.index',[
            'user' => session('user'),
        ]);
    }

    public function listAlbum()
    {
        $listAlbum = Album::all();
        return view('SpaceAdmin.listAlbum',[
            'listAlbum' => $listAlbum,
            'user' => session('user'),
        ]);
    }

    public function listArtist()
    {
        $listArtist = Artist::all();
        return view('SpaceAdmin.listArtist',[
            'listArtist' => $listArtist,
            'user' => session('user'),
        ]);
    }

    public function listSpotifyPlaylist()
    {
        $listSpotifyPlaylist = SpotifyPlaylist::all();
        return view('SpaceAdmin.listSpotifyPlaylist',[
            'listSpotifyPlaylist' => $listSpotifyPlaylist,
            'user' => session('user'),
        ]);
    }

    public function listUser()
    {
        $listUser = User::with('roles')-> get();
        return view('SpaceAdmin.listUser',[
            'listUser' => $listUser,
            'user' => session('user'),
        ]);
    }

    public function userInfos($id)
    {
        $user = User::find($id);
        return view('SpaceAdmin.userInfo',[
            'userFind' => $user,
            'user' => session('user'),
        ]);
    }
}

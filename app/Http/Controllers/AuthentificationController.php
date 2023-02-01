<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Role_User;

class AuthentificationController extends Controller
{
    public function login()
    {
            return view('Authentification.login', [
                'email' => '',
                'password' => '',
                'error' => '',
            ]);
    }

    public function register()
    {
            return view('Authentification.register', [
                'email' => '',
                'password' => '',
                'error' => '',
            ]);
    }

    public function register_persist(Request $request)
    {
        if($request->method() == "POST")
        {
            $user = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'genre' => $request -> genre,
            'birth' => $request -> birth,
            'state' => 0,
            'connexionNumber' => 0,
            'password' => md5($request -> password),
            ]);
            $role = Role::find(2) -> id;
            $role_user = new Role_User();
            $role_user -> users_id = $user;
            $role_user -> roles_id = $role;
            $role_user -> save();
            return $this -> login($request);
        }
    }

    public function loginOn(Request $request)
    {
        $listUser = User::with('roles')-> get();
        $trouve = false;
        foreach ($listUser as $value) {
        if($value-> email == $request -> email && $value -> password == md5($request -> password)) {
            $request->session()->put('user', $value);
            if($value -> roles[0] -> id == 1){
                $trouve = true;
                return redirect()->route('index');
            }else if($value -> roles[0] -> id == 2) {
                $trouve = true;
                $request->session()->put('create_playlist', 0);
                return redirect()->route('space_user');
            }
        }
        }
        if($trouve == false) {
                return view('Authentification.login', [
                    'email' => $request -> email,
                    'password' => $request -> password,
                    'error' => 'Incorrect password or email !',
                ]);
        }
    }
}

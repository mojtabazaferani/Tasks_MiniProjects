<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TddController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $create = Client::create([
            'email' => $request->email,
            'password' => Hash::make($request->pass)
        ]);

        if($create) {
            return redirect()->route('login');
        }else {
            //
        }
    }

    public function login()
    {
        return view('login');
    }

    public function check(Request $request)
    {
        $email = $request->email;

        $password = $request->pass;

        $user = Client::where('email', $email)->first();

        if($user != null) {

            $userPassword = $user->password;

            if(Hash::check($password, $userPassword)) {

                $userUpdating = Client::find($user->id);

                $userUpdating->logged = 'yes';

                $userUpdating->save();

                cookie()->queue('successfully', 'ok', 20);

                return redirect()->route('welcome');
                
            }else {
                return redirect()->route('login');
            }
        } else {
            
            cookie()->queue('error', 'login_failed', 20);

            return redirect()->route('login');
            
        }
    }
}

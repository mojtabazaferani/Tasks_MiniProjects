<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AmazonController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $create = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'mobile_no' => $request->mobile_no,
         'password' => Hash::make($request->password)
        ]);

        if($create) {

            cookie()->queue('name', $request->name, 10080);

            cookie()->queue('email', $request->email, 10080);

            cookie()->queue('mobile_no', $request->mobile_no, 10080);

            cookie()->queue('password', $request->password, 10080);

            cookie()->queue('seeLogin', 'Login', 10080);

            return redirect()->route('home');

        }else {
            
        }

    }

    public function login()
    {
      $cookieEmail = request()->cookie('email');

      $cookiePassword = request()->cookie('password');

      return view('auth.login', compact('cookieEmail', 'cookiePassword'));
    }

    public function check(Request $request)
    {
        $email = $request->email;

        $password = $request->password;

        $user = User::where('email', $email)
        ->where('password', Hash::check($password, $password))
        ->first();

        if($user != null) {

            $id = $user->id;

            $userUpdate = User::find($id);

            $userUpdate->logged = 'yes';

            $userUpdate->save();

            cookie()->queue('seeLogin', 'Profile', 10080);

            cookie()->queue('id', $id, 10080);

            return redirect()->route('Profile');

        }else {
            return redirect()->route('Login');
        }
    }

    public function profile()
    {
        $cookieId = request()->cookie('id');

        $cookieName = request()->cookie('name');

        $cookieEmail = request()->cookie('email');

        $cookieMobileNo = request()->cookie('mobile_no');

        return view('auth.profile', compact('cookieId', 'cookieName', 'cookieEmail', 'cookieMobileNo'));
    }

    public function logout()
    {
        cookie()->queue(cookie()->forget('name'));

        cookie()->queue(cookie()->forget('email'));

        cookie()->queue(cookie()->forget('mobile_no'));

        cookie()->queue(cookie()->forget('password'));

        cookie()->queue('seeLogin', 'Login', 10080);

        return redirect()->route('home');
    }

    public function edit()
    {
        $cookieId = request()->cookie('id');

        $cookieName = request()->cookie('name');

        $cookieEmail = request()->cookie('email');

        $cookieEmail = request()->cookie('mobile_no');

        return view('auth.edit', compact('cookieId', 'cookieName', 'cookieEmail', 'cookieEmail'));
    }

    public function update(Request $request)
    {
        $cookieId = request()->cookie('id');

        // $cookieName = request()->cookie('name');

        $cookieEmail = request()->cookie('email');

        $cookiePassword = request()->cookie('password');

        // $cookieMobileNo = request()->cookie('mobile_no');

        $user = User::where('email', $cookieEmail)
        ->where('password', Hash::check($cookiePassword, $cookiePassword))
        ->first();

        if($user != null) {
            $editUser = User::find($cookieId);

            $editUser->name = $request->name;
            cookie()->queue('name', $request->name, 10080);

            $editUser->email = $request->email;
            cookie()->queue('email', $request->email, 10080);

            $editUser->password = $request->password;
            cookie()->queue('password', $request->password, 10080);

            $editUser->mobile_no = $request->mobile_no;
            cookie()->queue('mobile_no', $request->mobile_no, 10080);

            $editUser->save();

            return redirect()->route('Profile');

        }else {
            //
        }
    }

    public function delete()
    {
        $cookieId = request()->cookie('id');

        $cookieName = request()->cookie('name');

        $cookieEmail = request()->cookie('email');

        $cookieMobileNo = request()->cookie('mobile_no');

        return view('auth.delete-account', compact('cookieId', 'cookieName', 'cookieEmail', 'cookieMobileNo'));
    }

    public function deleteAccount(Request $request)
    {
        if(isset($request->yes)) {
            cookie()->queue(cookie()->forget('name'));

            cookie()->queue(cookie()->forget('email'));

            cookie()->queue(cookie()->forget('mobile_no'));

            cookie()->queue(cookie()->forget('password'));

            cookie()->queue('seeLogin', 'Register', 10080);

            User::destroy(request()->cookie('id'));

            return redirect()->route('home');

        }else {
            return redirect()->route('Profile');
        }
    }

    public function home()
    {

        function get_client_ip()
        {
            
            foreach (array(
                        'HTTP_CLIENT_IP',
                        'HTTP_X_FORWARDED_FOR',
                        'HTTP_X_FORWARDED',
                        'HTTP_X_CLUSTER_CLIENT_IP',
                        'HTTP_FORWARDED_FOR',
                        'HTTP_FORWARDED',
                        'REMOTE_ADDR') as $key) {
                if (array_key_exists($key, $_SERVER) === true) {
                    foreach (explode(',', $_SERVER[$key]) as $ip) {
                        $ip = trim($ip);
                        if ((bool) filter_var($ip, FILTER_VALIDATE_IP,
                                        FILTER_FLAG_IPV4 |
                                        FILTER_FLAG_NO_PRIV_RANGE |
                                        FILTER_FLAG_NO_RES_RANGE) !== false) {
                            return $ip;
                        }
                    }
                }
            }
        }

        $ip = get_client_ip();

        $location = file_get_contents("http://ip-api.com/json/$ip");

        $location = json_decode($location, true);

        $locationName = $location['country'];

        $name = request()->cookie('name');

        $seeLogin = request()->cookie('seeLogin');

        if($seeLogin == 'Login') {
            $seeLogin = 'Login';
        }

        elseif($seeLogin == 'Profile') {
            $seeLogin = 'Profile';
        }

        else {
            $seeLogin = 'Register';
        }

        return view('amazoon.home', compact('locationName', 'name', 'seeLogin'));
    }

    public function del()
    {
        cookie()->queue(cookie()->forget('seeLogin'));

        // print_r(Cookie::get());
    }
}

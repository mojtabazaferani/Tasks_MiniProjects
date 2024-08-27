<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use App\Notifications\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class TripController extends Controller
{
    public function home()
    {
        $seeLogin = request()->cookie('seeLogin');

        $name = request()->cookie('first_name');

        $image = request()->cookie('image');

        if($seeLogin == 'ورود') {
            $route = 'login';
        }
        elseif($seeLogin == '') {
            $route = 'register';
            
            $seeLogin = 'ثبت نام';
        }
        elseif($seeLogin == 'پروفایل') {
            $route = 'profile';
        }

        $trips = DB::table('trips')
        ->where('active', '=', 'yes')
        ->get();

        $trips = json_decode($trips, true);

        return view('page.home', compact('seeLogin', 'route', 'name', 'image', 'trips'));
    }

    public function register()
    {
        return view('page.register');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');

        $imageName = $image->getClientOriginalName();

        $create = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile_no' => $request->mobile_no,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imageName
        ]);

        if($create) {

            cookie()->queue('first_name', $request->first_name, 10080);

            cookie()->queue('last_name', $request->last_name, 10080);

            cookie()->queue('mobile_no', $request->mobile_no, 10080);

            cookie()->queue('username', $request->username, 10080);

            cookie()->queue('email', $request->email, 10080);

            cookie()->queue('seeLogin', 'ورود', 10080);

            cookie()->queue('image', $imageName, 10080);

            $image->move('images-users', $imageName);

            return redirect()->route('home');

        }else {
            //
        }
    }

    public function login()
    {
        $cookieUsername = request()->cookie('username');

        $cookieEmail = request()->cookie('email');

        return view('page.login', compact('cookieEmail', 'cookieUsername'));
    }

    public function check(Request $request)
    {
        $email = $request->email;

        $username = $request->username;

        $password = $request->password;

        $user = User::where('email', $email)
        ->where('password', Hash::check($password, $password))
        ->where('username', $username)
        ->first();

        if($user != null) {

            $id = $user->id;

            $userUpdate = User::find($id);

            $userUpdate->logged = 'yes';

            $userUpdate->save();

            cookie()->queue('id', $id, 10080);

            cookie()->queue('seeLogin', 'پروفایل', 10080);

            return redirect()->route('profile');

        }else {
            return redirect()->route('login');
        }
    }

    public function profile()
    {
        $cookieId = request()->cookie('id');

        $cookieFirstName = request()->cookie('first_name');

        $cookieLastName = request()->cookie('last_name');

        $cookieEmail = request()->cookie('email');

        $cookieMobileNo = request()->cookie('mobile_no');

        $cookieUsername = request()->cookie('username');

        $image = request()->cookie('image');

        $user = User::where('username', $cookieUsername)
        ->where('email', $cookieEmail)
        ->first();

        $countNotifications = count($user->unreadNotifications); 

        return view('page.profile', compact('cookieId', 'cookieFirstName', 'cookieLastName', 'cookieEmail', 'cookieMobileNo', 'cookieUsername', 'image', 'countNotifications'));
    }

    public function logout()
    {
        cookie()->queue(cookie()->forget('first_name'));

        cookie()->queue(cookie()->forget('last_name'));

        cookie()->queue(cookie()->forget('email'));

        cookie()->queue(cookie()->forget('mobile_no'));

        cookie()->queue(cookie()->forget('username'));

        cookie()->queue('seeLogin', 'ورود', 10080);

        return redirect()->route('home');
    }

    public function trip()
    {
        return view('page.trip');
    }

    public function createTrip(Request $request)
    {
        $cookieUsername = request()->cookie('username');

        $cookieEmail = request()->cookie('email');

        $user = User::where('username', $cookieUsername)
        ->where('email', $cookieEmail)
        ->first();

        if($user != null) {
            $image = $request->file('image');

            $imageName = $image->getClientOriginalName();

            $createTrip = Trip::create([
                'username' => $user->username,
                'email' => $user->email,
                'mobile_no' => $request->mobile_no,
                'location' => $request->location,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'capacity' => $request->capacity,
                'price' => $request->price,
                'image' => $imageName
            ]);

            $image->move('images-trip', $imageName);

            if($createTrip) {

                $id = $createTrip->id;

                $findTrip = Trip::find($id);

                $findTrip->active = 'yes';

                $findTrip->save();

                $invoice = [
                    'user_id' => $id,
                    'username' => $createTrip->username,
                    'location' => $createTrip['location']
                ];

                $userAll = User::all();

                Notification::send($userAll, new Customer($invoice));

                return redirect()->route('home');
            }
        }
    }

    public function notification()
    {

        $email = request()->cookie('email');

        $usernameCookie = request()->cookie('username');

        $user = User::where('username', $usernameCookie)
        ->where('email', $email)
        ->first();

        $id = User::find($user['id']);

        $countNotifications = count($id->notifications);

        $notifications = $user->notifications;

        return view('page.notifications', compact('notifications', 'countNotifications'));

    }

    public function deleteNotification($id)
    {
        cookie()->queue('idNotification', $id, 10080);

        return view('page.question');
    }

    public function delete(Request $request)
    {
        if(isset($request->yes)) {

            $id = request()->cookie('id');

            $user = User::find($id);

            $user->notifications()->where('data->id', request()->cookie('idNotification'))->delete();

            return redirect()->route('profile');
        }else {
            return redirect()->route('home');
        }
    }

    public function readNotification($id, $username, $post)
    {
        $idUser = request()->cookie('id');

        $user = User::find($idUser);

        $readNotification = $user->notifications()->where('data->id', $id)
        ->where('data->username', $username)
        ->where('data->post', $post)
        ->first();

        if($readNotification) {
            $readNotification->markAsRead();

            return redirect()->route('profile');
        }
    }

}

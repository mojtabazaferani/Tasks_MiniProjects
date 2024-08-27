<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\verificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthOtpController extends Controller
{
    public function login()
    {
        $cookieMobileNo = request()->cookie('mobile_no');

        return view('auth.otp-login', compact('cookieMobileNo'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'mobile_no' => 'required|exists:users,mobile_no'
        ]);

        $verificationCode = $this->generateOtp($request->mobile_no);

        $message = "Your OTP To Login is - ". $verificationCode->otp;

        cookie()->queue('message', $message, 2);

        return redirect()->route('otp.verification', ['user_id' => $verificationCode->user_id]);
    }

    public function generateOtp($mobile_no)
    {
        $user = User::where('mobile_no', $mobile_no)->first();

        $verificationCode = verificationCode::where('user_id', $user->id)->latest()->first();

        $now = Carbon::now();

        if($verificationCode && $now->isBefore($verificationCode->expire_at)) {
            return $verificationCode;
        }

        return verificationCode::create([
            'user_id' => $user->id,
            'otp' => rand(123456, 999999),
            'expire_at' => Carbon::now()->addMinutes(2)
        ]);
    }

    public function verification($user_id)
    {
        $cookieMessage = request()->cookie('message');

        return view('auth.otp-verification')->with([
            'user_id' => $user_id,
            'message' => $cookieMessage
        ]);
    }

    public function loginWithOtp(Request $request)
    {
        #Validation
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required'
        ]);

        #Validation Logic
        $verificationCode   = VerificationCode::where('user_id', $request->user_id)->where('otp', $request->otp)->first();

        $now = Carbon::now();

        if (!$verificationCode) {
            return redirect()->back()->with('error', 'Your OTP is not correct');

        }elseif($verificationCode && $now->isAfter($verificationCode->expire_at)){
            cookie()->queue(cookie()->forget('message'));

            return redirect()->route('otp.login')->with('error', 'Your OTP has been expired');
        }

        $user = User::where('id', $request->user_id)->first();

        if($user != null) {
            $userUpdate = User::find($request->user_id);

            $userUpdate->logged = 'yes';

            $userUpdate->save();

            cookie()->queue('seeLogin', 'Profile', 10080);

            cookie()->queue('id', $request->user_id, 10080);

            return redirect()->route('Profile');
        }else {
            return redirect()->route('otp.login')->with('error', 'Your Otp is not correct');
        }
    }
}

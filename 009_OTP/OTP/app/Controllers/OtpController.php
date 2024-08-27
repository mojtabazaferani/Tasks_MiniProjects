<?php

namespace App\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Validation\Factory;
use Illuminate\Container\Container;

class OtpController
{
    public function send(Request $request)
    {

        $loader = new FileLoader(new Filesystem, 'lang');

        $translator = new Translator($loader, 'en');

        $validation = new Factory($translator, new Container);

        $validator = $validation->make($request->all(), [
            'mobile' => 'required|min:10|max:20'
        ]);

        if($validator->fails()) {

            return [
                'Error' => true,

                'Errors' => $validator->errors()
            ];
        }

        $mobile = $request->input('mobile');

        $otp = mt_rand(100000, 999999);

        DB::connection('mysql')->table('otp_table')->where('mobile', $mobile)->update([
            'is_used' => 1
        ]);

        DB::connection('mysql')->table('otp_table')->insert([
            'mobile' => $mobile,
            'code' => $otp,
            'expired_at' => Carbon::now('Asia/Tehran')->addMinutes(2)->format('Y-m-d H:i:s')
        ]);

        return [
            'Success' => true,
            'Message' => 'OTP Sent'
        ];

        $this->sendOtpWithSMS($mobile, $otp);
    }

    public function verify(Request $request)
    {
        $loader = new FileLoader(new Filesystem, 'lang');

        $translator = new Translator($loader, 'en');

        $validation = new Factory($translator, new Container);

        $validator = $validation->make($request->all(), [
            'mobile' => 'required|min:10|max:20',
            'code' => 'required|int'
        ]);

        if($validator->fails()) {

            return [
                'Error' => true,

                'Errors' => $validator->errors()
            ];
        }

        $exists = DB::connection('mysql')->table('otp_table')
            ->where('mobile', $request->input('mobile'))
            ->where('code', $request->input('code'))
            ->where('is_used', 0)
            ->where('expired_at', '>', Carbon::now()->format('Y-m-d H:i:s'))
            ->exists();

        if(! $exists) {
            return [
                'Error' => true,
                'Message' => 'Code Is Invalid'
            ];
        }

        DB::connection('mysql')->table('otp_table')
            ->where('mobile', $request->input('mobile'))
            ->where('code', $request->input('code'))
            ->where('is_used', 0)
            ->update([
                'is_used' => 1
            ]);

        return [
            'Success' => true,
            'Message' => 'Verifyed',
            'token' => 'TOKEN'
        ];
    }

    private function sendOtpWithSMS(string $mobile, int $otp): void
    {

    }
}

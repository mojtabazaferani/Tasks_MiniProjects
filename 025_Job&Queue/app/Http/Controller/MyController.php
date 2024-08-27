<?php

namespace App\Http\Controllers;

use App\Jobs\MyJob2;

class TripController extends Controller
{
    public function test()
    {
        MyJob2::dispatch();
    }

}
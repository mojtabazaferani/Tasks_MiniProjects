<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\URLShort;

class UrlController extends Controller
{
    public function short(Request $request, $id)
    {
        $url = URLShort::whereUrl($request->url)->first();

        $this->click($id);

        if($url == null) {
            $short = $this->generateShortUrl();

            URLShort::create([
                'url' => $request->url,
                'short' => $short
            ]);

            $url = URLShort::whereUrl($request->url)->first();

        }

        return view('short_url', compact('url'));
    }

    public function shortLink($link)
    {
        $url = URLShort::whereShort($link)->first();

        return redirect($url->url);
    }

    public function generateShortUrl()
    {
        $result = base_convert(rand(1000, 99999), 10, 36);

        $data = URLShort::whereShort($result)->first();

        if($data != null) {
            $this->generateShortUrl();
        }

        return $result;
    }

    public function click($id)
    {
        URLShort::find($id)->increment('click');
    }

}

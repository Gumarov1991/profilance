<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();

        return view('home', compact('shortLinks'));
    }

    public function store(LinkRequest $request)
    {
        $data = [
            'link'  => $request['link'],
            'token' => Str::random(6)
        ];

        $link = ShortLink::create($data);

        return redirect('/')
            ->with('success', 'Short link generated successfully! Your short link: ' . $request->root() . '/' . $link->token);
    }

    public function shortLink($token)
    {
        $link = ShortLink::where('token', $token)->first();
        $url = $link->link;

        return redirect($url);
    }
}

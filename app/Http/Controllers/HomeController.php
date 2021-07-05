<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $url = "http://10.10.63.31:8080/api/urls/";
        $client = new Client();

        if (Auth::user()->hasRole('admin')) {
            $request = $client->request('GET', $url);
            $usersUrls = json_decode($request->getBody()->getContents(), true);
            return view('home', compact('usersUrls'));
        }

        $userID = Auth::user()->id;
        $url = "http://10.10.63.31:8080/api/urls/".$userID;
        $request = $client->request('GET', $url);
        $userUrls = json_decode($request->getBody()->getContents(), true);

        /*foreach ($usersUrls as $usersUrl) {
            dump($usersUrl['userId']);
        }*/

        return view('home', compact('userUrls'));
    }
}

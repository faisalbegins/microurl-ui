<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $url = "http://10.10.63.31:8080/api/urls/".$userID;
        $client = new Client();
        $request = $client->request('GET', $url);
        $userUrls = json_decode($request->getBody()->getContents(), true);

        return view('url.index', compact('userUrls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('url.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'longUrl'    =>  ['required', 'string', 'url'],
        ];

        $this->validate($request, $rules);

        //dump($request->longUrl);

        $client = new Client();
        $response = $client->request('POST', 'http://10.10.63.31:8080/api/url', [
            'json' => [
                'userId' => Auth::user()->id,
                'email'  => Auth::user()->email,
                'longUrl' => $request->longUrl,
                'expireDate' => '1625339822913'
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return redirect('urls')->with('success', 'Short URL successfully created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$client = new Client();
        $response = $client->request('POST', 'http://10.10.34.167:9080/api/url', [
            'json' => [
                'userId' => 4,
                'email'  => 'hilaly.mustafiz@hotmail.com',
                'longUrl' => 'https://www.google.com/maps/@41.0124018,-91.9783676,15z',
                'expireDate' => '1625339822913'
            ]
        ]);*/

        //$users = json_decode($response->getBody()->getContents(), true)['data'];
        //dump($response->getBody()->getContents());
        //return view('url.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // Ajax用の処理
    public function ajax(Request $request) {
        $posts = $request->all();
        $data  = Team::where('team_name','like', '%'.$posts['text'].'%')->get();

        return response()->json(
            [
              'data' => $data 
            ],
            200,[],
            JSON_UNESCAPED_UNICODE
        );        

    }

}

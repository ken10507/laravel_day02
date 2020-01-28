<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;
use Auth;
use Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // チームを全て取得
        $teams = Team::get();

        return view('teams',[
            'teams' => $teams,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション 
        $validator = $request->validate( [
            'team_name' => 'required|string|max:16',  // 必須・文字列・16文字以内
        ]);


        
        //チーム名取得
        $team_name = $request->team_name;
        // dd($team_name);

        // 現在ログイン中のユーザーidを取得
        $user_id = Auth::user()->id;

        // チーム登録
        $team = new Team;
        $team->team_name = $team_name;
        $team->leader_id = $user_id;
        $team->save();

        $team->users()->attach($user_id);

        return redirect('teams');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //idからデータを取得
        $team = Team::where('id',$id)->first();
        // dd($team);

        return view('team_detail',[
            'team' => $team,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // クイックバリデーション 
        $validator = $request->validate([
            'team_name' => 'required|string|max:16',  // 必須・文字列・16文字以内
            'team_id' => 'required|integer|',  // 必須・文字列・16文字以内
            ]);


        $team = Team::where('id',$request->team_id)->first();
        $team->team_name = $request->team_name;
        $team->save();

        return redirect('team/'.$team->id);
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

    // チーム参加処理
    public function join(Request $request)
    {
        //チームを取得
        $team = Team::where('id',$request->team_id)->first();
        
        // ログインユーザー取得
        $user = Auth::user();

        $team->users()->attach($user->id);;

        return redirect('teams');
    }





}

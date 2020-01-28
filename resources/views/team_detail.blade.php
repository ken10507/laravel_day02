@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">チーム詳細</div>

                <h1>{{ $team->team_name }}</h1>

                <!-- 所属メンバーの名前一覧 -->
                @foreach($team->users as $user)
                    <p>{{ $user->name }}</p>
                @endforeach


                @if(Auth::check())
                    @if($team->users()->where('user_id',Auth::user()->id)->exists() === false)
                     <!-- チーム参加ボタン -->
                     <form action="{{ url('team/join') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="team_id" value="{{$team->id}}">
                        <button type="submit" class="btn btn-primary">チーム参加</button>
                    </form>
                    @endif
                @endif 


                @if ($errors->any())
                <div class="errors">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @can('leader-only',$team)
                    <form action="{{ url('team/edit') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" name="team_name" value="{{$team->team_name}}">
                        <input type="hidden" name="team_id" value="{{$team->id}}">
                        <button type="submit" class="btn btn-primary">チーム名変更</button>
                    </form>
                @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

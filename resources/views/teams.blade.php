@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">チーム</div>

                <div class="panel-body">
                @if ($errors->any())
                <div class="errors">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                
                <!-- チーム作成機能 -->
                @if(Auth::check())
                <h2>チーム追加</h2>
                <form action="{{ url('team/store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">チーム名</label>
                        <input type="text" name="team_name" class="form-control" id="exampleInputEmail1" placeholder="チーム名">
                    </div>
                    <button type="submit" class="btn btn-primary">チーム作成する</button>
                </form>
                @endif

                <!-- チーム一覧表示 -->
                <h2>チーム一覧表示</h2>
                @foreach($teams as $team)

                    <p><a href="{{ url('team/'.$team->id) }}">{{$team->team_name}}</a></p>

                @endforeach

                <button id="btn" class="btn btn-primary" >検索</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

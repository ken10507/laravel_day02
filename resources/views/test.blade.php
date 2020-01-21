@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ユーザー情報</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>{{ $user->name }}</h1>
                    <h2>{{ $user->role->role_name }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

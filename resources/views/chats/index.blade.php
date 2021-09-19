@extends('layouts.app')

@section('content')
<div class="container">
    <h1>チャット一覧</h1>
    @foreach($users as $user)
        <a href="/chats/{{ $user->id }}">{{ $user->name }}</a><br>
    @endforeach
</div>
@endsection
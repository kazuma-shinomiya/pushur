@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <todos-list
            :user_id="@json(Auth::id())" 
        ></todos-list>
    </div>
</div>
@endsection
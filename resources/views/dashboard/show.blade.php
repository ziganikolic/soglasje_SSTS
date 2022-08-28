@extends('layouts.app')

@section('content')
    <div class="m-auto">
            @if(Auth::check())
                <user-info-component  :userID="{{ $userID }}"></user-info-component>
            @endif
    </div>

@endsection

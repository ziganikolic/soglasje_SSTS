@extends('layouts.app')

@section('content')
    <div class="m-auto w-11/12 md:w-8/12 lg:w-7/12">
            @if(Auth::check())
                <dashboard-component  :users="{{ json_encode($users) }}" :user="{{Auth::user()}}"></dashboard-component>
            @endif
    </div>

@endsection

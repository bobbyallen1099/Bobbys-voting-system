@extends('layouts.app')

@section('content')

    <h1>Coming soon!</h1>

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('dashboard') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

@endsection
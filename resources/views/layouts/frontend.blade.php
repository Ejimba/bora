@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
@show

@section('body')
    <body class="text-center">
        <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <a href="{{ route('home.index') }}">
                        <h3 class="masthead-brand">{{ config('app.name') }}</h3>
                    </a>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                        <a class="nav-link" href="https://github.com/ejimba/bora" target="_blank" rel="noopener noreferrer">Source Code</a>
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @else
                            <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                        @endguest
                    </nav>
                </div>
            </header>
            @yield('content')
            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Cover template for <a href="https://getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap</a>, by <a href="https://twitter.com/mdo" target="_blank" rel="noopener noreferrer">@mdo</a>.</p>
                </div>
            </footer>
        </div>
    </body>
@endsection

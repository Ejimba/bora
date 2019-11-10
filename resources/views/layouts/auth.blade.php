@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@show

@section('body')
    <body>        
        @yield('content')
        @yield('scripts')
    </body>
@endsection

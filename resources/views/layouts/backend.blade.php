@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@show

@section('body')
    <body>
        <div id="app">
            @include('partials.nav')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        @section('scripts')
            <script src="{{ asset('js/app.js') }}" defer></script>
        @show
    </body>
@endsection

@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .dt-buttons {
            display: none;
        }
    </style>
@show

@section('body')
    <body>
        <div id="app">
            @include('partials.nav')
            <main class="py-4">
                @include('sweetalert::alert')
                @yield('content')
            </main>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        @stack('scripts')
    </body>
@endsection

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description')">
        <meta name="author" content="">
        <title>{{ config('app.name') }} - @yield('title')</title>
        @yield('styles')
    </head>
    @yield('body')
</html>
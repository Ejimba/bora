@extends('layouts.auth')

@section('title', __('Reset Password'))

@section('content')
    <form method="POST" action="{{ route('password.email') }}" class="form-signin">
        <div class="text-center mt-4 mb-4">
            <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name') }} {{ __('Reset Password') }}</h1>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @csrf
        <div class="form-label-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
            <label for="email">{{ __('E-Mail Address') }}</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="btn btn-lg btn-primary btn-block mb-2" type="submit">{{ __('Send Password Reset Link') }}</button>
        <a href="{{ route('login') }}">{{ __('auth.go_back_login') }}</a>
        <a href="{{ route('home.index') }}" class="float-right">{{ __('auth.go_back_home') }}</a>
        <p class="mt-3 mb-3 text-muted text-center">&copy; {{ date('Y') }}</p>
    </form>
@endsection

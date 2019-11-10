@extends('layouts.auth')

@section('title', __('Confirm Password'))

@section('content')
    <form method="POST" action="{{ route('password.confirm') }}" class="form-signin">
        <div class="text-center mt-4 mb-4">
            <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name') }} {{ __('Confirm Password') }}</h1>
        </div>
        {{ __('Please confirm your password before continuing.') }}
        @csrf
        <div class="form-label-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
            <label for="password">Password</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="btn btn-lg btn-primary btn-block {{ Route::has('password.request') ? 'mb-2':'' }}" type="submit">{{ __('Confirm Password') }}</button>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
        <a href="{{ route('home.index') }}" class="{{ Route::has('password.request') ? 'float-right':'' }}">{{ __('auth.go_back_home') }}</a>
        <p class="mt-3 mb-3 text-muted text-center">&copy; {{ date('Y') }}</p>
    </form>
@endsection

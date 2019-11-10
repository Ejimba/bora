@extends('layouts.auth')

@section('title', __('Reset Password'))

@section('content')
    <form method="POST" action="{{ route('password.update') }}" class="form-signin">
        <div class="text-center mt-4 mb-4">
            <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name') }} {{ __('Reset Password') }}</h1>
        </div>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-label-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
            <label for="email">{{ __('E-Mail Address') }}</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-label-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
            <label for="password">Password</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-label-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block mb-2" type="submit">{{ __('Reset Password') }}</button>
        <p class="mt-3 mb-3 text-muted text-center">&copy; {{ date('Y') }}</p>
    </form>
@endsection

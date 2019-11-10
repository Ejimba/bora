@extends('layouts.auth')

@section('title', __('Verify Your Email Address'))

@section('content')
    <form method="POST" action="{{ route('verification.resend') }}" class="form-signin">
        <div class="text-center mt-4 mb-4">
            <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name') }} {{ __('Verify Your Email Address') }}</h1>
        </div>
        @csrf
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <div class="form-label-group">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('click here to request another') }}</button>
        <a href="{{ route('home.index') }}" class="float-right">{{ __('auth.go_back_home') }}</a>
        <p class="mt-3 mb-3 text-muted text-center">&copy; {{ date('Y') }}</p>
    </form>
@endsection

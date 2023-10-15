@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 d-flex justify-content-center align-items-center vh-100">
            <div>
                <div class="mb-3">
                    <a href="/"><img src="/media/kofi-nook-icon.jpg" alt="" class="icon"></a>
                </div>

                <div class="text-center">
                    <h2>Reset Password</h2>
                </div>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <!-- Email input -->
                    <div class="form-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                            placeholder="Email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-group mb-3">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            placeholder="Password" autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Confirm Password input -->
                    <div class="form-group mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required placeholder="Confirm Password" autocomplete="new-password">
                    </div>

                    <!-- Submit button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn-burlywood">
                            {{ __('Reset Password') }}
                        </button>
                        <a href="{{ route('login') }}" class="regular btn btn-link">
                            {{ __('Back to Login') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

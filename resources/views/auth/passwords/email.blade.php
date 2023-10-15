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

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <!-- Email input -->
                    <div class="mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn-burlywood w-100">
                            {{ __('Send Password Reset Link') }}
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

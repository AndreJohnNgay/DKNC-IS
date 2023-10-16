@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 d-flex justify-content-center align-items-center vh-100">
            <div class="login">
                <div class="mb-3">
                    <a href="/"><img src="/media/kofi-nook-icon.jpg" alt="" class="icon"></a>
                </div>

                <div class="text-center">
                    <h2>Login</h2>
                </div>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3 form-floating">
                        
                        <input id="username" type="text"
                            class="form-control @error('username') is-invalid @enderror" name="username"
                            value="{{ old('username') }}" required autocomplete="username" autofocus
                            placeholder="Username">
                        <label for="username">Username</label>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3 form-floating">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-0 text-center">
                        <button type="submit" class="btn-burlywood">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

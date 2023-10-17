@extends('layouts.layout')
@section('content')
<div class="container mt-4 ps-0 pe-0">
    <div class="card">
        <div class="card-header bg-wheat text-center">
            @yield('card-header')
        </div>
        <div class="card-body">
            <div class="row mb-3">
                @yield('search-bar')
                @yield('buttons')
            </div>

            <div class="row">
                <div class="container">
                    @if ($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="container">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="container">
                    @if(session('accounts'))
                    @foreach(session('accounts') as $account)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Username: {{ $account['username'] }}, Password: {{ $account['password'] }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="row">
                @yield('table')
            </div>
            <div class="row">
                @yield('pagination')
            </div>
        </div>

    </div>
</div>
@endsection
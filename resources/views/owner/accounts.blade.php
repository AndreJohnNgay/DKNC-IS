@extends('layouts.tables_layout')
@include('components.modals.account.deleteAccountModal')
@include('components.modals.account.updateAccountModal')
@include('components.modals.account.addAccountModal')

@section('card-header')
<h3 class="">Accounts Table</h3>
@endsection

@section('search-bar')
<div class="col-md-10">
    <form class="d-flex" role="search">
        <input action="{{ route('account.index') }}" method="GET" class="form-control me-2" type="search"
            placeholder="Search by firstname or lastname" aria-label="Search" id="query" name="query">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>
@endsection

@section('buttons')
<div class="col-md-2">
    <button type="button" data-bs-toggle="modal" data-bs-target="#addAccountModal" class="btn btn-primary w-100">
        <span class="bi bi-plus-lg"></span> Generate Account
    </button>
</div>
@endsection

@section('table')
@include('components.tables.accountsTable')
@endsection

@section('pagination')
<div class="d-flex justify-content-center">
    {{ $users->links("pagination::bootstrap-4") }}
</div>
<div class="d-flex justify-content-center mt-3">
    Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
</div>
@endsection

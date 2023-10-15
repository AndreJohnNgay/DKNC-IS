@extends('layouts.tables_layout')

@include('components.modals.type.deleteTypeModal')
@include('components.modals.type.updateTypeModal')
@include('components.modals.type.addTypeModal')

@section('card-header')
<h3 class="">Types Table</h3>
@endsection

@section('search-bar')
<div class="col-md-10">
<form action="{{ route('type.index') }}" method="GET" class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search by item name" id="query"
        name="query">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-search"></i>
    </button>
</form>
</div>
@endsection

@section('buttons')
<div class="col-md-2">
    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addTypeModal">
        <span class="bi bi-plus-lg"></span> New Type
    </button>
</div>
@endsection

@section('table')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($types as $type)
            <tr>
                <th scope="row">{{ $type->id }}</th>
                <td>{{ $type->type_name }}</td>
                <td>{{ $type->description }}</td>

                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                            data-bs-target="#updateTypeModal{{ $type->id }}">
                            <span class="bi bi-pencil-square"></span> Update
                        </button>
                        <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                            data-bs-target="#deleteTypeModal{{ $type->id }}"><span class="bi bi-trash3-fill"></span>
                            Delete
                        </button>
                    </div>

                </td>
            <tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('pagination')
<div class="d-flex justify-content-center">
    {{ $types->links("pagination::bootstrap-4") }}
</div>
<div class="d-flex justify-content-center mt-3">
    Showing {{ $types->firstItem() }} to {{ $types->lastItem() }} of {{ $types->total() }} results
</div>
@endsection


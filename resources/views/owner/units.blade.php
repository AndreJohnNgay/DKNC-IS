@extends('layouts.tables_layout')
@include('components.modals.unit.deleteUnitModal')
@include('components.modals.unit.updateUnitModal')
@include('components.modals.unit.addUnitModal')

@section('card-header')
<h3 class="">Units Table</h3>
@endsection

@section('search-bar')
<div class="col-md-10">
    <form action="{{ route('unit.index') }}" method="GET" class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search by unit name"
            aria-label="Search by unit name" id="query" name="query">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>
@endsection

@section('buttons')
<div class="col-md-2">
    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addUnitModal">
        <span class="bi bi-plus-lg"></span> New Unit
    </button>
</div>
@endsection

@section('table')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Unit Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($units as $unit)
            <tr>
                <th scope="row">{{ $unit->id }}</th>
                <td>{{ $unit->unit_name }}</td>
                <td>{{ $unit->description }}</td>

                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                            data-bs-target="#updateUnitModal{{ $unit->id }}">
                            <span class="bi bi-pencil-square"></span> Update
                        </button>
                        <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                            data-bs-target="#deleteUnitModal{{ $unit->id }}"><span class="bi bi-trash3-fill"></span>
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
    {{ $units->links("pagination::bootstrap-4") }}
</div>
<div class="d-flex justify-content-center mt-3">
    Showing {{ $units->firstItem() }} to {{ $units->lastItem() }} of {{ $units->total() }} results
</div>
@endsection

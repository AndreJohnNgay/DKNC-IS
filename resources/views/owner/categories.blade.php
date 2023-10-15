@extends('layouts.tables_layout')
@include('components.modals.category.deleteCategoryModal')
@include('components.modals.category.updateCategoryModal')
@include('components.modals.category.addCategoryModal')
@section('content')

@section('card-header')
<h3 class="">Categories Table</h3>
@endsection

@section('search-bar')
<div class="col-md-10">
    <form action="{{ route('category.index') }}" method="GET" class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search by category name" aria-label="Search"
            id="query" name="query">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>
@endsection

@section('buttons')
<div class="col-md-2">
    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        <span class="bi bi-plus-lg"></span> New Category
    </button>
</div>
@endsection

@section('table')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->description }}</td>

                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                            data-bs-target="#updateCategoryModal{{ $category->id }}">
                            <span class="bi bi-pencil-square"></span> Update
                        </button>
                        <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                            data-bs-target="#deleteCategoryModal{{ $category->id }}"><span
                                class="bi bi-trash3-fill"></span>
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
    {{ $categories->links("pagination::bootstrap-4") }}
</div>
<div class="d-flex justify-content-center mt-3">
    Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }}
    results
</div>
@endsection

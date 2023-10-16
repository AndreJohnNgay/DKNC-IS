@extends('layouts.tables_layout')

@include('components.modals.item.deleteItemModal')
@include('components.modals.item.updateItemModal')
@include('components.modals.item.viewItemHistoryModal')
@include('components.modals.item.addItemModal')
@include('components.modals.item.deleteItemModal')

@section('card-header')
<h3 class="">Items Table</h3>
@endsection

@section('search-bar')
<div class="col-md-8">
    <form action="{{ route('item.index') }}" method="GET" class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search by item name" aria-label="Search" id="query"
            name="query">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>
@endsection

@section('buttons')
<div class="col-md-2 mb-2">
    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addItemModal">
        <span class="bi bi-plus-lg"></span> New Item
    </button>
</div>



<div class="col-md-2">
    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#restockModal">
        <span class="bi bi-printer-fill"></span> Print Reminders
    </button>
</div>
@endsection

@section('table')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Reminder</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($items as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>
                    @include('components.modals.item.viewItemModal')
                    <button type="button" class="btn btn-link" data-bs-toggle="modal"
                        data-bs-target="#viewItemModal{{ $item->id }}"><span
                            class="bi bi-eye-fill">{{ $item->item_name }}</span>
                    </button>
                </td>
                <td>{{ $item->stock }}</td>
                @if ($item->stock < $item->stock_used_per_day)
                    <td><button type="button" class="btn btn-danger w-75" disabled>Restock Today</button>
                    </td>
                    @elseif ($item->stock >= $item->stock_used_per_day && $item->stock < $item->
                        stock_used_per_day * 2)
                        <td><button type="button" class="btn btn-warning w-75" disabled>Restock
                                Tomorrow</button></td>
                        @elseif ($item->stock >= $item->stock_used_per_day * 2)
                        <td><button type="button" class="btn btn-success w-75" disabled>Restock in
                                {{ ceil($item->stock / $item->stock_used_per_day) }} days</button></td>


                        @endif

                        <td>
                            <div class="d-flex">
                                @include('components.modals.batch.updateStockModal')
                                <button type="button" class="btn btn-warning ms-2" data-bs-toggle="modal"
                                    data-bs-target="#updateStockModal{{ $item->id }}">
                                    <span class="bi bi-plus-slash-minus"></span> Stock
                                </button>
                                @include('components.modals.batch.addBatchModal')
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#addBatchModal{{ $item->id }}">
                                    <span class="bi bi-plus-lg"></span> New Batch
                                </button>
                                <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                                    data-bs-target="#updateItemModal{{ $item->id }}">
                                    <span class="bi bi-pencil-square"></span> Update
                                </button>
                                <button type="button" class="btn btn-info ms-2" data-bs-toggle="modal"
                                    data-bs-target="#viewItemHistoryModal{{ $item->id }}">
                                    <span class="bi bi-clock-history"></span> History
                                </button>
                                <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteItemModal{{ $item->id }}">
                                    <span class="bi bi-trash3-fill"></span> Delete
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
    {{ $items->links("pagination::bootstrap-4") }}
</div>
<div class="d-flex justify-content-center mt-3">
    Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }} results
</div>
@endsection

@extends('layouts.tables_layout')

@include('components.modals.item.deleteItemModal')
@include('components.modals.item.updateItemModal')
@include('components.modals.item.addItemModal')
@include('components.modals.item.viewItemModal')
@include('components.modals.batch.viewItemBatchModal')


@section('card-header')
<h3 class="">Items Table</h3>
@endsection

@section('search-bar')
<div class="col-md-12">
    <form action="{{ route('item.index') }}" method="GET" class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search by item name" aria-label="Search" id="query"
            name="query">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </form>
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
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($items as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td><button type="button" class="btn btn-link" data-bs-toggle="modal"
                        data-bs-target="#viewItemModal{{ $item->id }}"><span
                            class="bi bi-eye-fill">{{ $item->item_name }}</span>
                    </button>
                </td>
                <td>
      
                    <button type="button" class="btn btn-link" data-bs-toggle="modal"
                        data-bs-target="#viewItemBatchModal{{ $item->id }}"><span
                            class="bi bi-eye-fill">{{ $item->stock }}</span>
                    </button>
                </td>
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

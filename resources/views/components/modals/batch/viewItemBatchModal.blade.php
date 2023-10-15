@include('components.modals.batch.updateStockModal')
@include('components.modals.batch.deleteBatchModal')

@foreach($items as $item)
<div class="modal fade" id="viewItemBatchModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="viewItemBatchModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-wheat">
                <h1 class="modal-title fs-5" id="viewItemBatchModal{{ $item->id }}Label">View Batch</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Batch Number</th>
                                <th scope="col">Expiration Date</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($item_batches as $item_batch)
                            @if($item->id == $item_batch->item_id)
                            <tr>
                                <th scope="row">{{ $item_batch->id }}</th>
                                <th>{{ $item_batch->batch_no }}</th>
                                <td>{{ $item_batch->expiration_date }}</td>
                                <td>{{ $item_batch->stock }}</td>
                                <td>


                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#updateStockModal{{ $item_batch->id }}">
                                        <span class="bi bi-plus-slash-minus"></span> Stock
                                    </button>
                                    @if(Auth::user()->role == 'owner')
                                    <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                                        data-bs-target="#deleteBatchModal{{ $item_batch->id }}">
                                        <span class="bi bi-trash3-fill"></span> Delete
                                    </button>
                                    @endif
                                </td>
                            <tr>
                                @endif
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
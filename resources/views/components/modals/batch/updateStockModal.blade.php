<div class="modal fade" id="updateStockModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="updateStockModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-wheat">
                <h1 class="modal-title fs-5" id="updateStockModal{{ $item->id }}Label">Update Stock</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-linen">
                @foreach($item_batches as $item_batch)
                @if($item_batch->item_id == $item->id)
                <form action="{{ route('batch.update', $item_batch->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card mb-3">
                        <div class="card-header bg-wheat">
                            Update Batch {{ $item_batch->batch_no }}
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="item_id" value="{{ $item_batch->item_id }}">
                            <div class="form-group mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" value="{{ $item_batch->stock }}"
                                    disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="add_reduce" class="form-label">Add/Reduce</label>
                                <select class="form-select" aria-label="Default select example" id="add_reduce"
                                    name="add_reduce">
                                    <option value="add">Add</option>
                                    <option value="reduce">Reduce</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount">
                            </div>
                            @if(Auth::user()->role == 'owner')
                            <div class="form-group mb-3">
                                <label for="expiration_date" class="form-label">Expiration Date</label>
                                <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                                    value="{{ $item_batch->expiration_date }}">
                            </div>
                            @elseif(Auth::user()->role == 'employee')
                            <div class="form-group mb-3">
                                <label for="expiration_date" class="form-label">Expiration Date</label>
                                <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                                    value="{{ $item_batch->expiration_date }}" readonly>
                            </div>
                            @endif

                        </div>
                        <div class="card-footer d-flex justify-content-end bg-wheat">
                            @if(Auth::user()->role == 'owner')
                            <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                                data-bs-target="#deleteBatchModal{{ $item_batch->id }}">
                                <span class="bi bi-trash3-fill"></span> Delete
                            </button>
                            @endif
                            <button type="submit" class="btn btn-success ms-2"><span class="bi bi-pencil-square"></span>
                                Save changes</button>

                        </div>

                    </div>
                </form>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

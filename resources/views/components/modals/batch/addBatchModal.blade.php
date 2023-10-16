<form action="{{ route('batch.store') }}" method="POST">
    @csrf
    <div class="modal fade" id="addBatchModal{{ $item->id }}" tabindex="-1" aria-labelledby="addBatchModal{{ $item->id }}Label" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="addBatchModal{{ $item->id }}Label">Add Batch</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="item_id" value="{{ $item->id }}" hidden>
                    <div class="form-group mb-3">
                        <label for="expiration_date" class="form-label">Expiration Date</label>
                        <input type="date" class="form-control" id="expiration_date" name="expiration_date">
                    </div>
                    <div class="form-group mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock">
                    </div>
                </div>
                <div class="modal-footer bg-wheat">
                    <button type="submit" class="btn btn-success">
                        <span class="bi bi-plus-lg"></span> Add
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

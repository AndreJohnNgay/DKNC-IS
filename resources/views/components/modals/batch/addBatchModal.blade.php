<form action="{{ route('batch.store') }}" method="POST">
    @csrf
    <div class="modal fade" id="addBatchModal" tabindex="-1" aria-labelledby="addBatchModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="addBatchModalLabel">Add Batch</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="item_id" class="form-label">Item</label>
                        <select class="form-select" aria-label="Default select example" name="item_id" id="item_id">
                            @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->item_name }}</option>
                            @endforeach
                        </select>
                    </div>
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

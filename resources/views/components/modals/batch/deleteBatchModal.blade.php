@foreach($item_batches as $item_batch)
<form action="{{ route('batch.destroy', $item_batch->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <div class="modal fade" id="deleteBatchModal{{ $item_batch->id }}" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteBatchModal{{ $item_batch->id }}Label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="deleteBatchModal{{ $item_batch->id }}Label">Delete Batch</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="item_batch_id" value="{{ $item_batch->id }}">
    <input type="hidden" name="item_id" value="{{ $item_batch->item_id }}">
                    Are you sure you want to delete this batch?
                </div>
                <div class="modal-footer bg-wheat">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span
                            class="bi bi-x-circle-fill"></span> Close</button>
                    <button type="submit" class="btn btn-danger"><span class="bi bi-trash3-fill"></span> Delete</button>
                </div>

            </div>
        </div>
    </div>
</form>
@endforeach
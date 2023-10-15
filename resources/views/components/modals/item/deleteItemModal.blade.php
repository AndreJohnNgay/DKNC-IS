@foreach ($items as $item)
<form action="{{ route('item.destroy', ['item' => $item->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="deleteItemModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="deleteItemModal{{ $item->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="deleteItemModal{{ $item->id }}Label">Delete Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer bg-wheat">
                    <button type="submit" class="btn btn-danger"><span class="bi bi-trash3-fill"></span> Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

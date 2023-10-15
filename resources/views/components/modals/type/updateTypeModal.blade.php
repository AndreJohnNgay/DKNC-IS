@foreach($types as $type)
<form action="{{ route('type.update', $type->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="modal fade" id="updateTypeModal{{ $type->id }}" tabindex="-1"
        aria-labelledby="updateTypeModal{{ $type->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="updateTypeModal{{ $type->id }}Label">Update Type</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="type_name" class="form-label">Type Name</label>
                        <input type="text" class="form-control" id="type_name" name="type_name" value="{{ $type->type_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $type->description }}">
                    </div>
                </div>
                <div class="modal-footer bg-wheat">
                    <button type="submit" class="btn btn-success"><span class="bi bi-pencil-square"></span> Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

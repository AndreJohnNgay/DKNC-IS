@foreach($units as $unit)
<form action="{{ route('unit.update', $unit->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="modal fade" id="updateUnitModal{{ $unit->id }}" tabindex="-1"
        aria-labelledby="updateUnitModal{{ $unit->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="updateUnitModal{{ $unit->id }}Label">Update Unit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="unit_name" class="form-label">Unit Name</label>
                        <input type="text" class="form-control" id="unit_name" name="unit_name" value="{{ $unit->unit_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $unit->description }}" rows="5">
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

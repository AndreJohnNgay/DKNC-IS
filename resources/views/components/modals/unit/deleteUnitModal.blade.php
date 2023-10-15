@foreach($units as $unit)
<form action="{{ route('unit.destroy', $unit->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <div class="modal fade" id="deleteUnitModal{{ $unit->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deleteUnitModal{{ $unit->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="deleteUnitModal{{ $unit->id }}Label">Delete Unit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this unit?
                </div>
                <div class="modal-footer bg-wheat">
                    <button type="submit" class="btn btn-danger"><span class="bi bi-trash3-fill"></span> Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
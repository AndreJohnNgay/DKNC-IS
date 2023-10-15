@foreach($categories as $category)
<form action="{{ route('category.destroy', $category->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <div class="modal fade" id="deleteCategoryModal{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deleteCategoryModal{{ $category->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="deleteCategoryModal{{ $category->id }}Label">Delete Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this category?
                </div>
                <div class="modal-footer bg-wheat">
                    <button type="submit" class="btn btn-danger"><span class="bi bi-trash3-fill"></span> Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
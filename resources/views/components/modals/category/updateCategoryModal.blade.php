@foreach ($categories as $category)
<form action="{{ route('category.update', $category->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="modal fade" id="updateCategoryModal{{ $category->id }}" tabindex="-1"
        aria-labelledby="updateCategoryModal{{ $category->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="updateCategoryModal{{ $category->id }}Label">Update Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $category->description }}">
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
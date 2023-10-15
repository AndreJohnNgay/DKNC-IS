<form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="addItemModalLabel">Add Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/">
                    </div>
                    <div class="form-group mb-3">
                        <label for="stock_used_per_day" class="form-label">Stock Used per Day</label>
                        <input type="number" class="form-control" id="stock_used_per_day" name="stock_used_per_day">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost">
                    </div>

                    <div class="form-group mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select class="form-control" id="type_id" name="type_id">
                            <option selected>Choose Type</option>
                            @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->id }} - {{ $type->type_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="unit_id" class="form-label">Unit</label>
                        <select class="form-control" id="unit_id" name="unit_id">
                            <option selected>Choose Unit</option>
                            @foreach($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->id }} - {{ $unit->unit_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option selected>Choose Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->id }} - {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>
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
@foreach($items as $item)
<form action="{{ route('item.update', ['item' => $item->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="updateItemModal{{ $item->id }}" tabindex="-1"
        aria-labelledby="updateItemModal{{ $item->id }}Label" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="updateItemModal{{ $item->id }}Label">Update Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name"
                            value="{{ $item->item_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <div class="card mb-3">
                            <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}" alt="Image">
                            <div class="card-body">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/"
                                    value="{{ $item->image }}">
                            </div>
                        </div>

                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ $item->description }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="stock_used_per_day" class="form-label">Stock Used per Day</label>
                        <input type="number" class="form-control" id="stock_used_per_day" name="stock_used_per_day"
                            value="{{ $item->stock_used_per_day }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost" value="{{ $item->cost }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select class="form-control" id="type_id" name="type_id">
                            @foreach($types as $type)
                            @if($type->id == $item->type_id)
                            <option value="{{ $type->id }}" selected>{{ $type->id }} - {{ $type->type_name }}</option>
                            @else
                            <option value="{{ $type->id }}">{{ $type->id }} - {{ $type->type_name }}
                            @endif
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="unit_id" class="form-label">Unit</label>
                        <select class="form-control" id="unit_id" name="unit_id">
                            <option selected>Choose Unit</option>
                            @foreach($units as $unit)
                            @if($unit->id == $item->unit_id)
                            <option value="{{ $unit->id }}" selected>{{ $unit->id }} - {{ $unit->unit_name  }}</option>
                            @else
                            <option value="{{ $unit->id }}">{{ $unit->id }} - {{ $unit->unit_name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option selected>Choose Category</option>
                            @foreach($categories as $category)
                            @if($category->id == $item->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->id }} -
                                {{ $category->category_name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->id }} - {{ $category->category_name }}
                            </option>
                            @endif
                            @endforeach
                        </select>
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
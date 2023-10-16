<div class="modal fade" id="viewItemModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="viewItemModal{{ $item->id }}Label" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewItemModal{{ $item->id }}Label">{{ $item->item_name  }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}" alt="Image">
                                <div class="card-body">
                                    <p class="card-text"><b>{{ $item->item_name }}:</b> {{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="category" class="form-label">Category</label>
                                @foreach($categories as $category)
                                @if($category->id == $item->category_id)
                                <input type="text" class="form-control" id="category" name="category"
                                    value="{{ $category->category_name  }}" disabled>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="unit" class="form-label">Unit</label>
                                @foreach($units as $unit)
                                @if($unit->id == $item->unit_id)
                                <input type="text" class="form-control" id="unit" name="unit"
                                    value="{{ $unit->unit_name  }}" disabled>
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="type" class="form-label">Type</label>
                                @foreach($types as $type)
                                @if($type->id == $item->type_id)
                                <input type="text" class="form-control" id="type" name="type"
                                    value="{{ $type->type_name }}" disabled>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock"
                                    value="{{ $item->stock }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="stock_used_per_day" class="form-label">Stock Used Per Day</label>
                                <input type="number" class="form-control" id="stock_used_per_day"
                                    name="stock_used_per_day" value="{{ $item->stock_used_per_day }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="number" class="form-control" id="cost" name="cost"
                                    value="{{ $item->cost }}" disabled>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
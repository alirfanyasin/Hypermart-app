<form method="POST" id="save-to-cart-modal">
    @csrf
    <input type="hidden" name="product_id" value="{{ $data->id }}">

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="" value="{{ $data->name }}" disabled>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Stock</label>
                <input type="number" class="form-control" id="" value="{{ $data->stock }}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="size" class="form-label fw-bold">Size</label>
                <input type="text" class="form-control" id="size" name="size" value="{{ $data->size }}"
                    required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="count" class="form-label fw-bold">Count</label>
                <input type="number" class="form-control" id="count" name="count" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-dark">Save to cart <i class="fa-solid fa-cart-shopping"></i></button>
    </div>
</form>

@include('script_ajax.user.product_ajax')

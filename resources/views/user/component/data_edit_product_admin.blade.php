<form action="/my/dashboard/product/update/{{ $data->id }}" method="POST" id="update-product-form"
    enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-5">
            <img id="preview-img" src="/images/{{ $data->image }}" alt="no-image" width="100%" class="mb-4">
            <input class="form-control mt-5" type="file" id="file" accept="image/jpeg, image/jpg, image/png"
                name="image">
            <small class="text-danger fw-italic">Max : 2 MB</small>
        </div>
        <div class="col-md-7">
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $data->price }}">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label fw-bold">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $data->stock }}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label fw-bold">Category</label>
                <select class="form-select" id="category" name="category">
                    <option selected disabled>Choose</option>
                    <option value="Pakaian Pria" {{ $data->category == 'Pakaian Pria' ? 'selected' : '' }}>Pakaian Pria
                    </option>
                    <option value="Celana Pria" {{ $data->category == 'Celana Pria' ? 'selected' : '' }}>Celana Pria
                    </option>
                    <option value="Sepatu Pria" {{ $data->category == 'Sepatu Pria' ? 'selected' : '' }}>Sepatu Pria
                    </option>
                    <option value="Tas Pria" {{ $data->category == 'Tas Pria' ? 'selected' : '' }}>Tas Pria</option>
                    <option value="Aksesoris" {{ $data->category == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                    <option value="Jam Tangan" {{ $data->category == 'Jam Tangan' ? 'selected' : '' }}>Jam Tangan
                    </option>
                    <option value="Pakaian Wanita" {{ $data->category == 'Pakaian Wanita' ? 'selected' : '' }}>Pakaian
                        Wanita</option>
                    <option value="Fashion Muslimah" {{ $data->category == 'Fashion Muslimah' ? 'selected' : '' }}>
                        Fashion
                        Muslimah</option>
                    <option value="Tas Wanita" {{ $data->category == 'Tas Wanita' ? 'selected' : '' }}>Tas Wanita
                    </option>
                    <option value="Sepatu Wanita" {{ $data->category == 'Sepatu Wanita' ? 'selected' : '' }}>Sepatu
                        Wanita
                    </option>
                    <option value="Fashion Anak" {{ $data->category == 'Fashion Anak' ? 'selected' : '' }}>Fashion Anak
                    </option>
                    <option value="Sepatu Anak" {{ $data->category == 'Sepatu Anak' ? 'selected' : '' }}>Sepatu Anak
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="size" class="form-label fw-bold">Size</label>
                <input type="text" class="form-control" id="size" name="size"
                    placeholder="example: S, M, L, XL" value="{{ $data->size }}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-dark">Update Product</button>
    </div>
</form>

@include('script_ajax.admin.dashboard_product_ajax');

<script>
    // File Reader
    function previewImg() {
        const previewImage = document.getElementById("preview-img");
        const fileInput = document.getElementById("file");

        fileInput.addEventListener("change", function() {
            const fileReader = new FileReader();

            fileReader.readAsDataURL(this.files[0]);
            fileReader.onload = function() {
                previewImage.src = fileReader.result;
            };
        });
    }

    previewImg();
</script>

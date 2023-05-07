@extends('layouts.index')
@section('title')
    Product
@endsection
@section('content')
    {{-- Search --}}
    <div class="container my-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form method="POST" class="position-relative">
                    @csrf
                    <div>
                        <span class="position-absolute text-secondary fs-5" style="margin-left: 10px; line-height: 40px;">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="search" class="form-control border border-2 border-dark" autofocus autocomplete="off"
                            name="search" id="search" placeholder="Find your favorite product..."
                            style="padding-left: 40px" required minlength="3" maxlength="100" aria-label="Search products">
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- End Search --}}
    <div class="container my-5">
        <div class="row">
            {{-- Users Accsess --}}
            @auth
                @if (auth()->user()->role == 'user')
                    {{-- Product --}}
                    <div class="col-12">
                        <section>
                            <div class="row search-results" id="data_product">

                            </div>
                        </section>
                    </div>


                    <!-- Modal-->
                    <div class="modal fade" id="modal_product" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h1 class="modal-title fs-5" id="modal_product_label"></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="data_modal_product">
                                    {{-- view data_modal_detail_product --}}
                                </div>
                                <div class="modal-footer" id="button_modal_detail">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
            {{-- User Access --}}
        </div>



        {{-- Admin Acsess --}}
        @auth
            @if (auth()->user()->role == 'admin')
                <div class="mb-3">
                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#add_product">Add
                        Product</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Size</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle" id="product-table-body" class="search-results">
                        </tbody>
                    </table>
                </div>


                {{-- Modal Add Product --}}
                <div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/my/dashboard/add-product" method="POST" id="add-product-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    {{-- <div id="error-message" class="alert alert-danger" style="display:none"></div> --}}
                                    <div class="row">
                                        <div class="col-md-5">
                                            <img id="preview-image" src="/assets/img/no-image.jpg" alt="no-image" width="100%"
                                                class="mb-4">
                                            <input class="form-control mt-5" type="file" id="formFile"
                                                accept="image/jpeg, image/jpg, image/png" name="image">
                                            <small class="text-danger fw-italic">Max : 2 MB</small>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label for="name" class="form-label fw-bold">Name</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label fw-bold">Price</label>
                                                <input type="number" class="form-control" id="price" name="price">
                                            </div>
                                            <div class="mb-3">
                                                <label for="stock" class="form-label fw-bold">Stock</label>
                                                <input type="number" class="form-control" id="stock" name="stock">
                                            </div>
                                            <div class="mb-3">
                                                <label for="category" class="form-label fw-bold">Category</label>
                                                <select class="form-select" id="category" name="category">
                                                    <option selected disabled>Choose</option>
                                                    <option value="Pakaian Pria">Pakaian Pria</option>
                                                    <option value="Celana Pria">Celana Pria</option>
                                                    <option value="Sepatu Pria">Sepatu Pria</option>
                                                    <option value="Tas Pria">Tas Pria</option>
                                                    <option value="Aksesoris">Aksesoris</option>
                                                    <option value="Jam Tangan">Jam Tangan</option>
                                                    <option value="Pakaian Wanita">Pakaian Wanita</option>
                                                    <option value="Fashion Muslimah">Fashion Muslimah</option>
                                                    <option value="Tas Wanita">Tas Wanita</option>
                                                    <option value="Sepatu Wanita">Sepatu Wanita</option>
                                                    <option value="Fashion Anak">Fashion Anak</option>
                                                    <option value="Sepatu Anak">Sepatu Anak</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="size" class="form-label fw-bold">Size</label>
                                                <input type="text" class="form-control" id="size" name="size"
                                                    placeholder="example: S, M, L, XL">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal Edit Product --}}
                <div class="modal fade" id="edit-product" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="data_edit_product_admin">
                                {{-- data_edit_product_admin --}}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal Detail Product --}}
                <div class="modal fade" id="product-detail-modal" tabindex="-1"
                    aria-labelledby="product-detail-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title" id="product-detail-modal-label">Detail Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="data_show"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
        {{-- Admin Acsess --}}
    </div>


    @include('user.component.loading')

    @include('script_ajax.admin.dashboard_product_ajax')
    @include('script_ajax.user.product_ajax')



    <script>
        // search
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "POST",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        query: query
                    },
                    success: function(data) {
                        $('.search-results').html(data);
                    }
                });
            });
        });


        // File Reader
        function showPreviewImage() {
            const previewImage = document.getElementById("preview-image");
            const fileInput = document.getElementById("formFile");

            fileInput.addEventListener("change", function() {
                const fileReader = new FileReader();

                fileReader.readAsDataURL(this.files[0]);
                fileReader.onload = function() {
                    previewImage.src = fileReader.result;
                };
            });
        }

        showPreviewImage();
    </script>
@endsection

    @foreach ($data as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card position-relative">
                <img src="/images/{{ $product->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="fs-5"><sub>Rp.</sub> {{ number_format($product->price, 0, ',', '.') }}</p>
                    <span class="rating text-warning">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        <i class="fa-regular fa-star"></i>
                    </span>
                    <br><br>
                    <div class="btn-group d-flex gap-2">
                        <a onclick="detail_product({{ $product->id }})" class="btn btn-warning btn-block">Detail</a>
                        @if (auth()->user()->role == 'admin')
                            <button type="button" onclick="onError()" class="btn btn-dark"><i
                                    class="fa-solid fa-cart-shopping"></i></button>
                        @endif
                        @if (auth()->user()->role == 'user')
                            <button type="button" onclick="modal_cart({{ $product->id }})" class="btn btn-dark"><i
                                    class="fa-solid fa-cart-shopping"></i></button>
                        @endif

                    </div>
                </div>
                <div id="new-label">
                    <div class="label-one bg-warning text-center"><span>New</span></div>
                    <div class="label-two bg-warning"></div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Modal-->
    <div class="modal fade" id="modal_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5" id="modal_product_label"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

    <script>
        function onError() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Product tidak tersedia untuk admin!',
            })
        }
    </script>

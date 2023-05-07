<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="table-responsive">
    <table class="table table-striped" style="vertical-align: middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Size</th>
                <th scope="col">Count</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $total = 0;
            @endphp

            @foreach ($data as $product)
                @if (auth()->user()->id == $product->user_id)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td><img src="/images/{{ $product->product->image }}" alt="cart-img" width="40px"></td>
                        <td style="white-space: nowrap;">{{ $product->product->name }}</td>
                        <td>{{ $product->product->stock }}</td>
                        <td style="white-space: nowrap;">{{ $product->product->price }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->count }}</td>
                        <td><a type="button" onclick="delete_product_cart({{ $product->id }})"
                                class="text-danger fs-4"><i class="fa-solid fa-xmark"></i></a></td>
                    </tr>
                    @php
                        $total += $product->product->price * $product->count;
                    @endphp
                @endif
            @endforeach

        </tbody>
    </table>
</div>

<div class="btn-checkout d-flex justify-content-end">
    <div class="mt-2 mx-3"><span class="fw-bold">Total : </span><sub>Rp. </sub> {{ number_format($total, 0, ',', '.') }}
    </div>
    <button type="button" class="btn btn-warning px-4" data-bs-toggle="modal"
        data-bs-target="#checkoutModal">Checkout</button>
</div>





<!-- Tambahkan modal checkout -->

<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @foreach ($data as $product)
                @if (auth()->user()->id == $product->user_id)
                    <form action="/my/order/store" method="POST" id="add-to-order" class="product-form" hidden>
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="product_count" id="product_count" class="product_count"
                                value="">
                            <input type="hidden" name="user_id" id="user_id" class="user_id"
                                value="{{ auth()->user()->id }}">
                            <input type="text" name="name" id="name" class="name"
                                value="{{ $product->product->name }}">
                            <input type="hidden" name="stock" id="stock" class="stock"
                                value="{{ $product->product->stock }}">
                            <input type="hidden" name="price" id="price" class="price"
                                value="{{ $product->product->price }}">
                            <input type="hidden" name="category" id="category" class="category"
                                value="{{ $product->product->category }}">
                            <input type="hidden" name="sold" id="sold" class="sold"
                                value="{{ $product->product->sold }}">
                            <input type="hidden" name="count" id="count" class="count"
                                value="{{ $product->count }}">
                            <input type="hidden" name="size" id="size" class="size"
                                value="{{ $product->size }}">
                            <input type="hidden" name="status" id="status" class="status" value="Pending">
                            <input type="hidden" name="image" id="image" class="image"
                                value="{{ $product->product->image }}">
                            <input type="hidden" name="payment" id="payment" class="payment" value="Null">

                        </div>
                    </form>
                @endif
            @endforeach

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name"
                                value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email"
                                value="{{ auth()->user()->email }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label fw-bold">Transfer Via Bank</label>
                        <div class="row">
                            <div class="col-md-4 col-4 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/bank-logo-bri.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-4 col-4 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/bank-logo-bni.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-4 col-4 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/bank-logo-bca.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-4 col-4 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/bank-logo-jatim.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-4 col-4 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/bank-logo-mandiri.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-4 col-4 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/bank-logo-bsi.png"
                                        width="100%" alt=""></a></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label fw-bold">Transfer Via
                            E-Wallet</label>
                        <div class="row">
                            <div class="col-md-3 col-3 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/ewallet-shopeepay.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-3 col-3 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/ewallet-gopay.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-3 col-3 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/ewallet-dana.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-3 col-3 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/ewallet-ovo.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-3 col-3 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/ewallet-linkaja.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-3 col-3 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/ewallet-flip.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-3 col-3 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/ewallet-doku.png"
                                        width="100%" alt=""></a></div>
                            <div class="col-md-3 col-3 mb-3"><a href="#" class="d-block"
                                    onclick="alert_payment_error()"><img src="/assets/img/ewallet-isaku.png"
                                        width="100%" alt=""></a></div>
                        </div>
                    </div>


                    <div class="col-12 mb-3">
                        <label for="manual_transfer" class="form-label fw-bold mt-3">Manual Transfer
                            Payment</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" class="form-control" id="manual_transfer_payment" required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <span><span class="fw-bold">Total : </span> <sub>Rp. </sub>
                    <span>{{ number_format($total, 0, ',', '.') }}</span></span>
                <input type="number" hidden id="total" value="{{ $total }}">
                <button type="button" onclick="order_store()" class="btn btn-dark">Checkout <i
                        class="fa-brands fa-shopify"></i></button>
            </div>
        </div>
    </div>
</div>


<script>
    function validation_paymnet() {

    }




    function read_cart() {
        $.get("{{ url('my/cart/read') }}", {}, function(data, status) {
            $("#data_cart").html(data);
        })
    }

    function order_store() {
        // Validation payment
        var total = $("#total").val();
        var payment = $("#manual_transfer_payment").val();

        // Validasi input pembayaran
        if (Number.isNaN(payment)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Pembayaran harus berupa angka!',
            })
            console.log("Pembayaran harus berupa angka.");
            return;
        }

        // Validasi apakah jumlah pembayaran lebih besar dari 0
        if (payment <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Pembayaran harus lebih besar dari Rp. 0!',
            })
            return;
        }

        if (total > payment) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Uang anda tidak cukup!',
            })

            return;
        }

        if (total == payment || total < payment) {

            var products = [];
            $('.product-form').each(function(index, element) {
                var product = {
                    user_id: $('#user_id').val(),
                    name: $(element).find('.name').val(),
                    stock: $(element).find('.stock').val(),
                    price: $(element).find('.price').val(),
                    category: $(element).find('.category').val(),
                    sold: $(element).find('.sold').val(),
                    count: $(element).find('.count').val(),
                    size: $(element).find('.size').val(),
                    status: $(element).find('.status').val(),
                    image: $(element).find('.image').val(),
                    payment: $(element).find('#payment').val(),

                };
                products.push(product);
            });

            // console.log(products);

            // Set nilai product_count pada input field checkout
            $('#product_count').val(products.length);

            $.ajax({
                type: 'post',
                url: '/my/order/store',
                data: {
                    products: products,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(response) {
                    $('#checkoutModal').modal('hide');
                    read_cart()
                    Swal.fire({
                        icon: 'success',
                        title: 'Pembayaran berhasil',
                        text: 'Kembaliannya: ' + (payment - total).toLocaleString('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        })
                    })
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No product selected!',
                    })
                }
            });

            console.log("Lunas");
            return;
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Uang anda tidak cukup!',
            })
        }





    }



    // Alert Error Payment via bank and via E-Wallet
    function alert_payment_error() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Payment not available!',
        })
    }
</script>

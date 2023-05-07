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

    <div class="container my-5">
        <div class="row">
            <div class="col">
                <section>
                    <div class="row search-results" id="data_product">

                    </div>
                </section>
            </div>
        </div>

    </div>


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

    {{-- loading --}}
    @include('user.component.loading')

    <script>
        $(document).ready(function() {
            $('#loading').removeClass('d-none')
            setTimeout(() => {
                $('#loading').addClass('d-none')
                read_product()
            }, 2000);
        })

        function read_product() {
            $.get("{{ url('product/read') }}", {}, function(data, status) {
                $('#data_product').html(data)
            })
        }

        function detail_product(id) {
            $.get("{{ url('/product/detail') }}/" + id, {}, function(data, status) {
                $('#data_modal_product').html(data)
                $('#modal_product_label').html('Detail Product')
                $('#button_modal_detail').removeClass('d-none')
                $('#modal_product').modal('show')
            })
        }

        function modal_cart(id) {
            $.get("{{ url('product/modal-cart') }}/" + id, {}, function(data, status) {
                $('#data_modal_product').html(data)
                $('#modal_product_label').html('Save to Cart')
                $('#button_modal_detail').addClass('d-none')
                $('#modal_product').modal('show')
            })
        }

        // Save to cart
        $('#save-to-cart-modal').on('submit', function(event) {
            event.preventDefault();

            // Ambil data form
            var formData = new FormData(this);

            // Kirim data form menggunakan AJAX
            $.ajax({
                type: 'post',
                url: '{{ route('cart.store') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#modal_product').modal('hide');
                    read_product();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.success,
                    })

                },
                error: function(response) {
                    var error = response.responseJSON.error;
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error,
                    });
                }
            });
        });


        // search
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('guest.search') }}",
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

        function onError() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda belum login!',
            })
        }
    </script>
@endsection

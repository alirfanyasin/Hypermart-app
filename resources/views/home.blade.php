@extends('layouts.index')
@section('title')
    Home
@endsection
@section('content')
    {{-- Start Carousel --}}
    <div class="jumbotron" style="height: 100vh">
        <div class="card w-100 d-flex justify-content-center align-items-center">
            <div class="gradient"></div>
            <div class="tagline text-white text-center">
                <div class="text">
                    <h1>Discover <span class="text-warning"> endless possibilities</span> <br> with our vast selection of
                        products</h1>
                </div>

                <div class="button mt-5">
                    <a href="/product" class="btn btn-outline-warning py-2 px-5">Shop Now <i
                            class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
        </div>
    </div>
    {{-- End Carousel --}}


    {{-- Start Content --}}
    <div class="container">
        <section id="category" class="my-5">
            <header class="mb-5">
                <h2 class="text-warning">Category</h2>
            </header>
            <section>
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-1.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Pakaian Pria</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-2.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Celana Pria</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-3.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Sepatu Pria</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-9.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Tas Pria</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-10.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Aksesoris</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-6.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Jam Tangan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-7.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Pakaian Wanita</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-8.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Fashion Muslimah</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-4.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Tas Wanita</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-11.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Sepatu Wanita</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-12.png" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Fashion Anak</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="card text-center">
                            <div class="img-category rounded-pill mt-2 mx-auto" style="width: 100px; height: 100px;">
                                <img src="/assets/img/product-13.jpeg" class="w-100" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Sepatu Anak</p>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </section>


        <section id="new-product" class="my-5">
            <header class="mb-5">
                <h2 class="text-warning">New Product</h2>
            </header>
            <section id="data_product">
                {{-- Data new product -> home_read_new_product --}}
            </section>
        </section>
    </div>
    {{-- End Content --}}




    <!-- Modal -->
    <div class="modal fade" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cart</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <form action="">
                            <div class="mb-3">
                                <label for="count" class="form-label"><b>Stock</b></label>
                                <input type="number" class="form-control" id="count" disabled value="10">
                            </div>
                            <div class="mb-3">
                                <label for="count" class="form-label"><b>Count</b></label>
                                <input type="number" class="form-control" id="count">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="onError()" class="btn btn-dark">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    @include('user.component.loading')

    <script>
        $(document).ready(function() {
            $('#loading').removeClass('d-none')

            setTimeout(() => {
                read_data_product_home();
                $('#loading').addClass('d-none')
            }, 2000);
        })

        function read_data_product_home() {
            $.get("{{ url('home/new-product/read') }}", {}, function(data, status) {
                $('#data_product').html(data)
            })
        }
    </script>
@endsection

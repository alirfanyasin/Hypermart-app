@extends('layouts.index')
@section('title')
    Cart
@endsection
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/my/order" class="btn btn-warning text-dark px-5">Order <i
                            class="fa-solid fa-bag-shopping"></i></a>
                    <a href="/my/finish" class="btn btn-dark px-5">Finish <i class="fa-regular fa-circle-check"></i></a>
                </div>
            </div>
        </div>
        <div class="row mt-2 mb-5">
            <div class="col" id="data_cart">
                {{-- data_cart --}}
            </div>
        </div>
    </div>

    @include('script_ajax.user.cart_ajax')
@endsection

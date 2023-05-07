@foreach ($data as $product)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
        <div class="card">
            <img src="/images/{{ $product->image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="fs-5"><sub>Rp.</sub> {{ number_format($product->price, 0, ',', '.') }}</p>
                <span class="rating text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </span>
                <br><br>
                <div class="btn-group d-flex gap-2">
                    <button type="button" class="btn btn-warning btn-block"
                        onclick="detail_product({{ $product->id }})">Detail</button>
                    <button type="button" onclick="onError()" class="btn btn-dark"><i
                            class="fa-solid fa-cart-shopping"></i></button>
                </div>
            </div>
        </div>
    </div>
@endforeach

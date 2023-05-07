@if (auth()->user()->role == 'user')
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
                    <br>
                    <br>
                    <div class="btn-group d-flex gap-2">
                        <button type="button" class="btn btn-warning btn-block"
                            onclick="detail_product({{ $product->id }})">Detail</button>
                        <button type="button" onclick="modal_cart({{ $product->id }})" class="btn btn-dark"><i
                                class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
@if (auth()->user()->role == 'admin')
    @php
        $no = 1;
    @endphp
    @foreach ($data as $product)
        <tr>
            <td scope="col">{{ $no++ }}</td>
            <td scope="col"><img src="/images/{{ $product->image }}" alt="" width="50px" height="50px">
            </td>
            <td scope="col" style="white-space: nowrap;">{{ $product->name }}</td>
            <td scope="col" style="white-space: nowrap;"><sub>Rp.
                </sub>{{ number_format($product->price, 0, ',', '.') }}
            </td>
            <td scope="col">{{ $product->stock }}</td>
            <td scope="col" style="white-space: nowrap;">{{ $product->size }}</td>
            <td scope="col" style="white-space: nowrap;">
                <button type="button" onclick="detail({{ $product->id }})" class="btn btn-success btn-detail"><i
                        class="fa-regular fa-eye"></i></button>
                <button type="button" onclick="edit({{ $product->id }})" class="btn btn-warning btn-edit mx-1"><i
                        class="fa-regular fa-pen-to-square"></i></button>
                <button type="button" onclick="destroy({{ $product->id }})" class="btn btn-danger btn-delete"><i
                        class="fa-regular fa-trash-can"></i></button>
            </td>
        </tr>
    @endforeach

@endif

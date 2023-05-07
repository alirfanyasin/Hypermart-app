<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="table-responsive">
    <table class="table table-striped" style="vertical-align: middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Price</th>
                <th scope="col">Size</th>
                <th scope="col">Count</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $product)
                @if (auth()->user()->id == $product->user_id)
                    @if (
                        $product->status == 'Pending' ||
                            $product->status == 'Process' ||
                            $product->status == 'Reject' ||
                            $product->status == 'Cancel')
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td><img src="/images/{{ $product->image }}" alt="cart-img" width="40px"></td>
                            <td style="white-space: nowrap;">{{ $product->name }}</td>
                            <td><span
                                    class="badge text-bg-{{ $product->status == 'Pending' ? 'warning' : '' }}{{ $product->status == 'Process' ? 'primary' : '' }}{{ $product->status == 'Reject' || $product->status == 'Cancel' ? 'danger' : '' }}">{{ $product->status == 'Reject' ? 'Rejected' : $product->status }}</span>
                            </td>
                            <td style="white-space: nowrap;"><sub>Rp. </sub>{{ $product->price }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->count }}</td>
                            <td>
                                @php
                                    $status = $product->status;
                                @endphp
                                @if ($status == 'Process')
                                    <a href="#" onclick="finish_order({{ $product->id }})"
                                        class="text-success fs-3"><i class="fa-regular fa-circle-check"></i></a>
                                @endif
                                @if ($status == 'Pending')
                                    <a href="#" onclick="cancel_order({{ $product->id }})"
                                        class="text-danger fs-3"><i class="fa-regular fa-circle-xmark"></i></a>
                                @endif
                                @if ($status == 'Reject' || $status == 'Cancel')
                                    <a href="#" onclick="delete_order({{ $product->id }})"
                                        class="text-danger fs-3"><i class="fa-regular fa-trash-can"></i></a>
                                @endif

                            </td>

                        </tr>

                        <input type="hidden" name="sold" id="sold" value="{{ $product->count }}">
                    @endif
                @endif
            @endforeach

        </tbody>
    </table>
</div>

@include('script_ajax.user.order_ajax')

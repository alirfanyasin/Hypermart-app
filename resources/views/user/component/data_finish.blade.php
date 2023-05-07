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
            @foreach ($data as $order)
                @if (auth()->user()->id == $order->user_id)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td><img src="/images/{{ $order->image }}" alt="cart-img" width="40px"></td>
                        <td style="white-space: nowrap;">{{ $order->name }}</td>
                        <td><span class="badge text-bg-success">Finish</span></td>
                        <td style="white-space: nowrap;"><sub>Rp. </sub>{{ number_format($order->price, 0, ',', '.') }}
                        </td>
                        <td>{{ $order->size }}</td>
                        <td>{{ $order->count }}</td>
                        <td><a href="#" onclick="delete_order({{ $order->id }})" class="text-danger fs-3"><i
                                    class="fa-regular fa-trash-can"></i></a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

@include('script_ajax.user.finish_ajax')

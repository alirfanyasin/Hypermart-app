<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="table-responsive">
    <table class="table table-striped" style="vertical-align: middle">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Buyer</th>
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
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td><img src="/images/{{ $product->image }}" alt="cart-img" width="40px"></td>
                    <td style="white-space: nowrap;">{{ $product->name }}</td>
                    <td style="white-space: nowrap;">{{ $product->user->name }}</td>
                    <td><span
                            class="badge {{ $product->status == 'Reject' || $product->status == 'Cancel' ? 'text-bg-danger' : '' }}{{ $product->status == 'Process' ? 'text-bg-primary' : '' }}{{ $product->status == 'Pending' ? 'text-bg-warning' : '' }}{{ $product->status == 'Finish' ? 'text-bg-success' : '' }}">{{ $product->status }}</span>
                    </td>
                    <td style="white-space: nowrap;"><sub>Rp. </sub>{{ number_format($product->price, 0, ',', '.') }}
                    </td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->count }}</td>
                    <td style="white-space: nowrap;">
                        @if ($product->status == 'Cancel')
                            <a href="#" onclick="error_alert_cancel()" class="text-success fs-3"><i
                                    class="fa-regular fa-circle-check"></i></a>
                        @else
                            <a href="#" onclick="confirm_order({{ $product->id }})" class="text-success fs-3"><i
                                    class="fa-regular fa-circle-check"></i></a>
                        @endif
                        @if ($product->status == 'Finish')
                            <a href="#" onclick="error_alert_finish({{ $product->id }})"
                                class="text-danger fs-3"><i class="fa-regular fa-circle-xmark"></i></a>
                        @else
                            <a href="#" onclick="reject_order({{ $product->id }})" class="text-danger fs-3"><i
                                    class="fa-regular fa-circle-xmark"></i></a>
                        @endif

                        <a href="#" onclick="modal_detail_buyer({{ $product->id }})" class="text-primary fs-3"
                            data-bs-toggle="modal" data-bs-target="#modal_detail_order"><i
                                class="fa-regular fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




<!-- Modal -->
<div class="modal fade" id="modal_detail_order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="data_detail_order">
                {{-- Data detail Order --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Read buyer and order
    function read_buyer() {
        $.get("{{ url('my/dashboard/buyer/read') }}", {}, function(data, status) {
            $('#data_buyer').html(data)
        })
    }




    // Confirm Order
    function confirm_order(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-1',
                cancelButton: 'btn btn-danger mx-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Konfirmasi Pesanan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, confirm!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: "{{ url('my/dashboard/buyer/confirm') }}/" + id,
                    data: {
                        status: 'Process'
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        read_buyer()
                        swalWithBootstrapButtons.fire(
                            'Success!',
                            response.success,
                            'success'
                        )
                    },
                    error: function(xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        for (var key in errors) {
                            errorMessage += errors[key][0] + '<br>';
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: errorMessage,
                        });
                    }
                });


            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Pesanan belum di konfirmasi',
                    'error'
                )
            }
        })
    }



    // Reject Order
    function reject_order(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-1',
                cancelButton: 'btn btn-danger mx-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Pesanan Di Tolak!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, reject!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: "{{ url('my/dashboard/buyer/reject') }}/" + id,
                    data: {
                        status: 'Reject'
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        read_buyer()
                        swalWithBootstrapButtons.fire(
                            'Success!',
                            response.success,
                            'success'
                        )
                    },
                    error: function(xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        for (var key in errors) {
                            errorMessage += errors[key][0] + '<br>';
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: errorMessage,
                        });
                    }
                });


            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Pesanan masih aman!',
                    'error'
                )
            }
        })
    }

    // Error Alert Cancel to Confirm
    function error_alert_cancel() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Pesanan tidak bisa di proses',
        });
    }
    // Error Alert Reject to Finish
    function error_alert_finish() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Pesanan sudah selesai',
        });
    }
</script>

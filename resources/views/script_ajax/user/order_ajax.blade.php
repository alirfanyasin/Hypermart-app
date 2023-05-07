<script>
    function read_order() {
        $.get("{{ url('my/order/read') }}", {}, function(data, status) {
            $("#data_order").html(data);
        })
    }

    // Finish Order
    function finish_order(id) {
        // Confirm Order
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-1',
                cancelButton: 'btn btn-danger mx-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Pesanan sudah di terima!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, confirm!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: "{{ url('my/order/finish') }}/" + id,
                    data: {
                        status: 'Finish',
                        sold: $('#sold').val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        read_order()
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
                    'Pesanan belum diterima!',
                    'error'
                )
            }
        })
    }

    // Cancel Order
    function cancel_order(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-1',
                cancelButton: 'btn btn-danger mx-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Pesanan akan di cancel!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: "{{ url('my/order/cancel') }}/" + id,
                    data: {
                        status: 'Cancel'
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        read_order()
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
                    'Pesanan tersedia',
                    'error'
                )
            }
        })
    }


    // Detele Order
    function delete_order(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-1',
                cancelButton: 'btn btn-danger mx-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Pesanan akan di hapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: "{{ url('my/order/delete') }}/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        read_order();
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
                    'Product masih ada',
                    'error'
                )
            }
        })
    }
</script>

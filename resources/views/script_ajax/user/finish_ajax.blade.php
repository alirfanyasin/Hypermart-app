<script>
    function read_finish() {
        $.get("{{ url('my/finish/read') }}", {}, function(data, status) {
            $("#data_finish").html(data);

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
                        read_finish();
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

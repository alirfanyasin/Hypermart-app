<script>
    // Cart
    $(document).ready(function() {
        read_cart()
    })

    function read_cart() {
        $.get("{{ url('my/cart/read') }}", {}, function(data, status) {
            $("#data_cart").html(data);
        })
    }



    function delete_product_cart(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-1',
                cancelButton: 'btn btn-danger mx-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: '/my/cart/destroy/' + id,
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your product has been deleted.',
                            'success'
                        )
                        read_cart()
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your product is safe :)',
                    'error'
                )
            }
        })
    }


    // For order ======================================================
</script>

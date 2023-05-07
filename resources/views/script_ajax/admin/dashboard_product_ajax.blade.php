<script>
    // Get Data Product
    function getData() {
        $.get("{{ url('/my/dashboard/products') }}", {}, function(data, status) {
            $('#product-table-body').html(data);
        })
    }

    // Detail Product
    function detail(id) {
        $.get("{{ url('my/dashboard/product/show') }}/" + id, {}, function(data, status) {
            $('#data_show').html(data)
            $('#product-detail-modal').modal('show')
        })
    }


    // Edit Product
    function edit(id) {
        $.get("{{ url('my/dashboard/product/edit') }}/" + id, {}, function(data, status) {
            $('#edit-product').modal('show')
            $('#data_edit_product_admin').html(data)
        })
    }


    // Update Product
    $('#update-product-form').on('submit', function(event) {
        event.preventDefault();
        var data = new FormData(this)
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                getData();
                $('#edit-product').modal('hide')
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Product updated successfully',
                })
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                })
            }
        })
    })



    // Add data Product
    $(document).ready(function() {

        getData();

        $('#add-product-form').on('submit', function(event) {
            event.preventDefault();

            // Ambil data form
            var formData = new FormData(this);

            // Kirim data form menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: '{{ route('product.store') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#add-product-form')[0].reset();
                    $("#preview-image").attr('src', '/assets/img/no-image.jpg');
                    $('#add_product').modal('hide');
                    getData();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Product added successfully',
                    })
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    for (var key in errors) {
                        errorMessage += errors[key][0] + '<br>';
                    }
                    // $('#error-message').html(errorMessage).show();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error,
                    })
                }
            });
        });
    });

    // Delete product
    function destroy(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-1',
                cancelButton: 'btn btn-danger mx-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You will delete this product!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: '{{ url('my/dashboard/product/destroy') }}/' + id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(response) {

                        // tampilkan pesan sukses
                        getData();
                        Swal.fire(
                            'Deleted!',
                            'Your product has been deleted.',
                            'success'
                        );
                    },
                    error: function(xhr, status, error) {
                        // tampilkan pesan error
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: error,
                        });
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
</script>

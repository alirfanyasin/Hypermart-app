<script>
    function detail_product(id) {
        $.get("{{ url('my/product/detail') }}/" + id, {}, function(data, status) {
            $('#data_modal_product').html(data)
            $('#modal_product_label').html('Detail Product')
            $('#button_modal_detail').removeClass('d-none')
            $('#modal_product').modal('show')
        })
    }

    function modal_cart(id) {
        $.get("{{ url('my/home/product/modal-cart/') }}/" + id, {}, function(data, status) {
            $('#data_modal_product').html(data)
            $('#modal_product_label').html('Save to Cart')
            $('#button_modal_detail').addClass('d-none')
            $('#modal_product').modal('show')
        })
    }
    // Save to cart
    $('#save-to-cart-modal').on('submit', function(event) {
        event.preventDefault();

        // Ambil data form
        var formData = new FormData(this);

        // Kirim data form menggunakan AJAX
        $.ajax({
            type: 'post',
            url: '{{ route('cart.store') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#modal_product').modal('hide');
                read_data_product_home();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.success,
                })

            },
            error: function(response) {
                var error = response.responseJSON.error;
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error,
                });
            }
        });
    });
</script>

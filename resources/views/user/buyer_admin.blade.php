@extends('layouts.index')
@section('title')
    Buyer
@endsection
@section('content')
    <div class="container">
        <div class="row my-5" id="data_buyer">



        </div>
    </div>

    @include('user.component.loading')

    <script>
        $(document).ready(function() {
            $('#loading').removeClass('d-none')
            setTimeout(() => {
                read_buyer()
                $('#loading').addClass('d-none')
            }, 1500);
        })

        function read_buyer() {
            $.get("{{ url('my/dashboard/buyer/read') }}", {}, function(data, status) {
                $('#data_buyer').html(data)
            })
        }

        // Detail Order
        function modal_detail_buyer(id) {
            $.get("{{ url('my/dashboard/buyer/detail') }}/" + id, {}, function(data, status) {
                $('#data_detail_order').html(data);
            })
        }
    </script>
@endsection

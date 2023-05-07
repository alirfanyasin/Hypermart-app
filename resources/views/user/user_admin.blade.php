@extends('layouts.index')
@section('title')
    Users
@endsection
@section('content')
    <div class="container">
        <div class="row my-5" id="data_user">

        </div>
    </div>


    <script>
        $.get("{{ url('my/dashboard/users/read') }}", {}, function(data, status) {
            $('#data_user').html(data)
        })
    </script>
@endsection

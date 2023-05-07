<div class="row">
    <div class="col-md-6">
        <img src="/images/{{ $data->image }}" alt="no-photo" class="w-100">
    </div>
    <div class="col-md-6">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="row">Name</th>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Stock</th>
                    <td>{{ $data->stock }}</td>
                </tr>

                <tr>
                    <th scope="row">Price</th>
                    <td>{{ number_format($data->price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th scope="row">Size</th>
                    <td>{{ $data->size }}</td>
                </tr>
                <tr>
                    <th scope="row">Count</th>
                    <td>{{ $data->count }}</td>
                </tr>

                <tr>
                    <th scope="row">Category</th>
                    <td>{{ $data->category }}</td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td><span
                            class="badge text-bg-{{ $data->status == 'Pending' ? 'warning' : 'primary' }}">{{ $data->status }}</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Order Time</th>
                    <td>{{ $data->created_at->diffForHumans() }}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<h3 class="text-center my-4">Buyer Data</h3>

<div class="row">
    <div class="col-12 mb-3 d-flex justify-content-center">
        <div class="frame-photo border border-3 border-warning rounded-4">
            <img src="/assets/img/user.jpg" alt="no-photo" class="w-100">
        </div>
    </div>

    <div class="col-12">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="row">Full Name</th>
                    <td>{{ $data->user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Email Address</th>
                    <td>{{ $data->user->email }}</td>
                </tr>
                <tr>
                    <th scope="row">Phone Number</th>
                    <td>{{ $data->user->phone_number }}</td>
                </tr>
                <tr>
                    <th scope="row">Address</th>
                    <td>{{ $data->user->address }}</td>
                </tr>
                <tr>
                    <th scope="row">Registered</th>
                    <td>{{ $data->user->created_at->diffForHumans() }}</td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

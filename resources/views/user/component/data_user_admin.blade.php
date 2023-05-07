@foreach ($data as $user)
    <div class="col-lg-3 col-md-4 col-6 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>{{ $user->name }}</h4>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

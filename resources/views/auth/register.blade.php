<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/assets/img/logo-hypermart-main.png">

    <title>HyperMart - Register</title>

    {{-- Auth css --}}
    <link rel="stylesheet" href="/assets/css/auth.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="row">
            <div class="col-md-6">
                <div id="img-register"></div>
            </div>
            <div class="col-md-6">
                <div class="mt-5">
                    {{-- <header class="d-flex justify-content-center">
                        <img src="/assets/img/logo-hypermart-main.png" alt="" width="100px">
                    </header> --}}
                    <div class="row justify-content-center px-3 mt-5">
                        <div class="col-md-6">
                            <h2 class="fw-bold text-warning mb-4">Register</h2>
                            {{-- Alert Error --}}
                            @if (session()->has('error_confirm_password'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <p>{{ session()->get('error_confirm_password') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="/auth/register" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Full Name</label>
                                    <input type="text" name="name"
                                        class="form-control  border border-warning @error('name') is-invalid @enderror"
                                        id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">Email address</label>
                                    <input type="email" name="email"
                                        class="form-control border border-warning @error('email') is-invalid @enderror"
                                        id="email" placeholder="example@gmail.com">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label fw-bold">Phone Number</label>
                                    <input type="number" name="phone_number"
                                        class="form-control border border-warning @error('phone_number') is-invalid @enderror"
                                        id="phone_number">
                                    @error('phone_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label fw-bold">Address</label>
                                    <input type="text" name="address"
                                        class="form-control border border-warning @error('address') is-invalid @enderror"
                                        id="address">
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">Password</label>
                                    <input type="password" name="password"
                                        class="form-control border border-warning @error('password') is-invalid @enderror"
                                        id="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">Confirm Password</label>
                                    <input type="password" name="confirm_password"
                                        class="form-control border border-warning @error('password') is-invalid @enderror"
                                        id="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning px-5 mt-3">Register</button>
                                </div>
                            </form>

                            <p class="text-center mt-3">You have account? <a href="/auth/login"
                                    class="fw-bold text-decoration-none text-dark">Login</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

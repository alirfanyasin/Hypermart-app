<footer class="bg-dark py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h1 class="text-warning">HyperMart</h1>
                {{-- <img src="/assets/img/logo-hypermart-main-1.png" alt=""> --}}
                <p class="text-light">HyperMakert merupakan platform perbelajaan berbagai fashion kekinian dan memberikan
                    pelayanan maksimal dengan tampilan yang user frendly</p>
            </div>
            <div class="col-md-2 mb-3">
                <header>
                    <h5 class="text-warning">Navbar link</h5>
                </header>
                @guest
                    <div class="navbar-link">
                        <a href="/" class="text-decoration-none">Home</a><br>
                        <a href="/product" class="text-decoration-none">Product</a><br>
                        <a href="/auth/login" class="text-decoration-none">Login</a><br>
                    </div>
                @endguest
                @auth
                    @if (auth()->user()->role == 'user')
                        <div class="navbar-link">
                            <a href="/my/home" class="text-decoration-none">Home</a><br>
                            <a href="/my/product" class="text-decoration-none">Product</a><br>
                            <a href="/my/cart" class="text-decoration-none">Cart</a>
                        </div>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <div class="navbar-link">
                            <a href="/my/home" class="text-decoration-none">Home</a><br>
                            <a href="/my/dashboard/product" class="text-decoration-none">Product</a><br>
                            <a href="/my/dashboard/buyer" class="text-decoration-none">Buyer</a><br>
                            <a href="/my/dashboard/users" class="text-decoration-none">Users</a><br>
                        </div>
                    @endif

                @endauth


            </div>
            <div class="col-md-2 mb-3">
                <header>
                    <h5 class="text-warning">Contact Us</h5>
                </header>
                <div class="social-media d-flex gap-3">
                    <a href="https://www.instagram.com/al_irfan_y" target="_blank" class="fs-4"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="https://wa.me/087859967039" class="fs-4"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="https://github.com/alirfanyasin" target="_blank" class="fs-4"><i
                            class="fa-brands fa-github"></i></a>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <header>
                    <h5 class="text-warning">About Us</h5>
                </header>
                <div class="link-about-us d-flex gap-3">
                    <a href="#" class="text-decoration-none">Read more -></a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <p class="text-light">Copyright &copy; 2023 by <a href="https://github.com/alirfanyasin"
                        class="text-warning text-decoration-none" target="_blank">Irfan Yasin</a></p>
            </div>
        </div>
    </div>
</footer>

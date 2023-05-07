 {{-- Start: Navbar --}}
 <div class="nav-brand text-dark my-2 text-center">
     <a href="/" class="d-block">
         <img src="/assets/img/logo-hypermart-main-1.png" alt="" width="250px">
     </a>
 </div>
 <nav class="navbar navbar-expand-lg bg-warning">
     <div class="container">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             @guest

                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/"><i
                                 class="fa-solid fa-house"></i> Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('product') ? 'active' : '' }}" href="/product"><i
                                 class="fa-solid fa-boxes-stacked"></i> Product</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('auth/login') ? 'active' : '' }}" href="/auth/login"><i
                                 class="fa-solid fa-right-to-bracket"></i> Login</a>
                     </li>
                 </ul>
             @endguest

             @auth
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('my/home') ? 'active' : '' }}" href="/my/home"><i
                                 class="fa-solid fa-house"></i> Home</a>
                     </li>
                     @if (auth()->user()->role == 'user')
                         <li class="nav-item">
                             <a class="nav-link {{ Request::is('my/product') ? 'active' : '' }}" href="/my/product"><i
                                     class="fa-solid fa-boxes-stacked"></i> Product</a>
                         </li>
                     @endif


                     @if (auth()->user()->role == 'admin')
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle {{ Request::is('my/dashboard/*') ? 'active' : '' }}"
                                 href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                     class="fa-solid fa-chart-simple"></i>
                                 Dashboard
                             </a>
                             <ul class="dropdown-menu">
                                 <li><a class="dropdown-item {{ Request::is('my/dashboard/product') ? 'active' : '' }}"
                                         href="/my/dashboard/product"><i class="fa-solid fa-boxes-stacked"></i>
                                         Product </a>
                                 </li>
                                 <hr class="dropdown-divider">

                                 <li><a class="dropdown-item {{ Request::is('my/dashboard/buyer') ? 'active' : '' }}"
                                         href="/my/dashboard/buyer"><i class="fa-solid fa-bag-shopping"></i>
                                         Buyer </a>
                                 </li>
                                 <hr class="dropdown-divider">

                                 <li><a class="dropdown-item {{ Request::is('my/dashboard/users') ? 'active' : '' }}"
                                         href="/my/dashboard/users"><i class="fa-solid fa-users"></i>
                                         Users </a>
                                 </li>
                             </ul>
                         </li>
                     @endif

                     <li class="nav-item">
                         <form action="/auth/logout" class="d-inline" method="POST">
                             @csrf
                             <button type="submit" class="bg-transparent border-0 mt-2"><i
                                     class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                         </form>
                     </li>
                 </ul>
             @endauth
             @auth

                 <div class="collapse navbar-collapse d-flex justify-content-end">
                     <ul class="navbar-nav mt-3 mb-lg-0">
                         <li class="nav-item">
                             <p>Welcome, <span class="fw-bold">{{ auth()->user()->name }}</span></p>
                         </li>
                     </ul>
                 </div>

             @endauth
         </div>
         @auth
             @if (auth()->user()->role == 'user')
                 <a class="navbar-brand {{ Request::is('my/cart') ? 'active' : '' }}" id="cart-icon" href="/my/cart"
                     style="margin-left: 20px;"><i class="fa-solid fa-cart-shopping"></i></a>
             @endif
         @endauth
     </div>
 </nav>
 {{-- End: Navbar --}}

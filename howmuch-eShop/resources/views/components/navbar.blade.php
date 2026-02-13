@php
$cart = session('cart', []);
$cartCount = count($cart);
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <div class="container-fluid">

    <a class="navbar-brand" href="{{ route('home.index') }}">HowMuch-eShop</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- LEFT -->
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Shop</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('home.about') }}">About</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact.index') }}">Contact</a></li>
      </ul>

      <!-- CENTER SEARCH -->
      <form class="mx-auto position-relative" style="width: 300px;" method="GET" action="#">
        <input class="form-control ps-5"
          type="search"
          name="search"
          placeholder="Search..."
          id="nav-search">

        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
      </form>

      <!-- RIGHT CART -->
      <ul class="navbar-nav ms-auto pe-3">
        <li class="nav-item">
          <a class="nav-link position-relative text-white" href=" {{ route('cart.show') }}">
            <i class="bi bi-cart fs-5"></i>
            @if($cartCount > 0)
            <span class="position-absolute badge rounded-pill bg-danger"
              style="top: -2px; right: -8px;">
              {{ $cartCount }}
            </span>
            @endif
          </a>
        </li>
      </ul>

    </div>
  </div>
</nav>
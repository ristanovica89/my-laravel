<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.getAllProductsForAdmin') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact.getAllContactsForAdmin') }}">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.users') }}">Users</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" id="nav-search" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
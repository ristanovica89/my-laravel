@extends('./layouts.layout-admin')

@section('title','Admin - Contacts')

@section('content')

@if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card bg-dark text-light shadow">
  <div class="card-body">

    <h3 class="mb-4 text-center">Create <span class="text-warning">New Product</span></h3>

    <form action="{{ url('/admin/products') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input
          type="text"
          class="form-control bg-dark text-light border-secondary"
          id="name"
          name="name"
          placeholder="Enter product name"
          required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea
          class="form-control bg-dark text-light border-secondary"
          id="description"
          name="description"
          rows="4"
          placeholder="Enter product description"
          required></textarea>
      </div>

      <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input
          type="number"
          class="form-control bg-dark text-light border-secondary"
          id="amount"
          name="amount"
          required>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control bg-dark text-light border-secondary" id="price" name="price" step="0.01" required>
      </div>
      <div class="mb-4">
        <label for="img" class="form-label">Product Image</label>
        <input type="text" class="form-control bg-dark text-light border-secondary" id="image" name="image">
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success btn-lg">
          Save Product
        </button>
      </div>

    </form>

  </div>
</div>


@endsection
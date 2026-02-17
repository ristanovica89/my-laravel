@extends('layout')
@section('title','Products')

@section('content')

<div class="container my-5 d-flex justify-content-center">
    <div class="row w-100" style="max-width: 100%;">

        <!-- LEFT: FORM -->
        <div class="col-lg-4 mb-4 mb-lg-0">

            <div class="card bg-dark border-danger shadow h-100">
                <div class="card-body p-4">

                    <h4 class="text-danger mb-4 text-center">Create Product</h4>

                    <form method="POST" action="/product/create">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label text-light">Product Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control bg-dark text-light border-danger"
                                id="name"
                                autocomplete="true"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-light">Description</label>
                            <textarea
                                name="description"
                                rows="3"
                                class="form-control bg-dark text-light border-danger"
                                required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-light">Price</label>
                            <input
                                type="number"
                                name="price"
                                step="0.01"
                                class="form-control bg-dark text-light border-danger"
                                required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">
                            Create Product
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <!-- RIGHT: TABLE -->
        <div class="col-lg-8">

            <div class="card bg-dark border-danger shadow h-100">
                <div class="card-body p-4">

                    <h4 class="text-danger mb-4 text-center">Product List</h4>

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead class="table-danger text-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td class="text-end fw-bold text-danger">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        No products found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div>

    
</div>
<div>
    <a href="/redis/flush" class="btn btn-outline-danger">clear cache</a>
</div>















@endsection
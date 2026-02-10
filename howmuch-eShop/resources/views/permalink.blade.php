@extends('layouts.layout')

@section('title','Shop')

@section('content')

<div class="container my-5">
    <div class="row">

        <!-- LEFT: Product Info + Image -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-md border-0 p-3 h-100">
                <div class="row g-3">

                    <!-- Product Details -->
                    <form action="#" method="POST" class="col-md-6 d-flex flex-column">

                        <h2 class="fw-bold mb-3">{{ $product->name }}</h2>

                        <p class="text-muted mb-2">
                            <strong>Kategorija:</strong> Elektronika
                        </p>

                        <p class="mb-3 text-secondary">
                            {{ $product->description }}
                        </p>

                        <h4 class="text-success mb-3">Cena: {{ $product->price }} RSD</h4>

                        <p class="text-muted mb-4">Na stanju: {{ $product->amount }} kom</p>

                        <!-- Quantity -->
                        <div class="mb-3 d-flex align-items-center">
                            <label for="quantity" class="me-3 fw-semibold">Količina:</label>
                            <input type="number"
                                id="quantity"
                                name="quantity"
                                class="form-control w-25"
                                value="1"
                                min="1"
                                max="{{ $product->amount }}">
                                
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 mb-4 mt-auto">
                            <!-- SUBMIT -->
                            <button type="submit" class="btn btn-success flex-fill">
                                Dodaj u korpu
                            </button>

                            <!-- BUY NOW -->
                            <a href="#" class="btn btn-outline-secondary flex-fill">
                                Kupi odmah
                            </a>
                        </div>

                        <!-- Info -->
                        <ul class="list-unstyled text-muted small">
                            <li>✔ Besplatna dostava preko 10,000 RSD</li>
                            <li>✔ Povrat u roku od 14 dana</li>
                            <li>✔ Garancija 12 meseci</li>
                        </ul>

                    </form>

                    <!-- Product Image -->
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img src="#" class="img-fluid rounded" alt="{{ $product->name }}">
                    </div>


                </div>
            </div>
        </div>

        <!-- RIGHT: CART ASIDE -->
        <div class="col-lg-4 ">
            <div class="card border-1 p-3 shadow-lg"
                style="background-color:#f2edc9; position: sticky; top:20px;">
                <h5 class="fw-bold mb-3">
                    🛒 Vaša korpa
                    <span class="badge bg-success ms-2">2</span>
                </h5>

                <!-- Cart Item -->
                <div class="d-flex justify-content-between align-items-start border-bottom pb-2 mb-3">
                    <div>
                        <p class="fw-semibold mb-1">Product Name</p>
                        <small class="text-muted">12,999 RSD × 2</small>
                    </div>
                    <div class="text-end">
                        <p class="fw-semibold mb-1">25,998 RSD</p>
                        <button class="btn btn-sm btn-outline-danger">✕</button>
                    </div>
                </div>

                <!-- Cart Item -->
                <div class="d-flex justify-content-between align-items-start border-bottom pb-2 mb-3">
                    <div>
                        <p class="fw-semibold mb-1">Another Product</p>
                        <small class="text-muted">4,500 RSD × 3</small>
                    </div>
                    <div class="text-end">
                        <p class="fw-semibold mb-1">13,500 RSD</p>
                        <button class="btn btn-sm btn-outline-danger">✕</button>
                    </div>
                </div>

                <!-- Summary -->
                <div class="mt-3">
                    <div class="d-flex justify-content-between">
                        <span>Ukupno:</span>
                        <strong>39,498 RSD</strong>
                    </div>
                </div>

                <!-- Cart Actions -->
                <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-outline-danger">
                        Isprazni korpu
                    </button>
                    <button class="btn btn-success">
                        Nastavi ka plaćanju
                    </button>
                </div>

                <p class="text-muted small text-center mt-3">
                    Sigurno plaćanje • SSL enkripcija
                </p>
            </div>
        </div>

    </div>
</div>


@endsection
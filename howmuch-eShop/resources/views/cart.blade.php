@extends('layouts.layout')

@section('title', 'Korpa')

@section('content')

<div class="container my-5">
    <h1 class="text-center mb-5">
        Vaša <span class="text-success">Korpa</span>
    </h1>

    <form action="#" method="POST">
        <div class="row g-4">

            <!-- LEFT: CART ITEMS -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4">

                    <h5 class="fw-bold mb-4">🛒 Artikli u korpi</h5>

                    <!-- Item -->
                    <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-3">
                        <div>
                            <p class="fw-semibold mb-1">Product Name</p>
                            <small class="text-muted">Cena: 12,999 RSD</small><br>
                            <small class="text-muted">Količina: x2</small>
                        </div>

                        <div class="text-end">
                            <p class="fw-semibold mb-1">25,998 RSD</p>
                            <button type="button" class="btn btn-sm btn-outline-danger">✕</button>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-3">
                        <div>
                            <p class="fw-semibold mb-1">Another Product</p>
                            <small class="text-muted">Cena: 4,500 RSD</small><br>
                            <small class="text-muted">Količina: x3</small>
                        </div>

                        <div class="text-end">
                            <p class="fw-semibold mb-1">13,500 RSD</p>
                            <button type="button" class="btn btn-sm btn-outline-danger">✕</button>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="d-flex justify-content-between mt-4">
                        <span class="fw-semibold">Ukupno za plaćanje:</span>
                        <span class="fw-bold text-success fs-5">39,498 RSD</span>
                    </div>

                </div>
            </div>

            <!-- RIGHT: CUSTOMER INFO + ACTION -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg p-4" style="background:#f8f9fa;">

                    <h5 class="fw-bold mb-3">📦 Podaci o kupcu</h5>

                    <div class="mb-3">
                        <label class="form-label">Ime i prezime</label>
                        <input type="text" class="form-control" value="Petar Petrović">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="petar@email.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefon</label>
                        <input type="text" class="form-control" value="+381 60 123 456">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Adresa isporuke</label>
                        <textarea class="form-control" rows="2">Bulevar Kralja Aleksandra 12</textarea>
                    </div>

                    <hr>

                    <!-- ACTIONS -->
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-success btn-lg">
                            Plati i završi kupovinu
                        </button>

                        <a href="#" class="btn btn-outline-secondary">
                            Odustani i vrati se u shop
                        </a>
                    </div>

                    <p class="text-muted small text-center mt-3">
                        Sigurno plaćanje • SSL zaštita • Bezbedna kupovina
                    </p>

                </div>
            </div>

        </div>
    </form>
</div>

@endsection

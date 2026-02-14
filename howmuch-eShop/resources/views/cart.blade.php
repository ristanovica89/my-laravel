@extends('layouts.layout')

@section('title', 'Checkout')

@section('content')
@include('components.success-flash-msg')
@include('components.message-flash')

@php  
    $user = Auth::user() 
@endphp

<div class="container my-5">
    <h1 class="text-center mb-5">
        Checkout <span class="text-success">Korpa</span>
    </h1>

    <div class="row g-4">

        <!-- LEFT: CART ITEMS (vizuelni podsetnik) -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold mb-4">🛒 Artikli u korpi</h5>

                @forelse($cart as $productId => $item)
                    <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-3">
                        <div>
                            <p class="fw-semibold mb-1">{{ $item['name'] }}</p>
                            <small class="text-muted">Cena: {{ $item['price'] }} RSD</small><br>
                            <small class="text-muted">Količina: x{{ $item['amount'] }}</small>
                        </div>
                        <div class="text-end">
                            <p class="fw-semibold mb-1">{{ $item['price'] * $item['amount'] }} RSD</p>
                            
                            <!-- Dugme za uklanjanje artikla -->
                            <form action="{{ route('cart.remove', $productId) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">✕</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Vaša korpa je prazna.</p>
                @endforelse

                <!-- Summary -->
                <div class="d-flex justify-content-between mt-4">
                    <span class="fw-semibold">Ukupno za plaćanje:</span>
                    <span class="fw-bold text-success fs-5">{{ $totalPrice ?? 0 }} RSD</span>
                </div>
            </div>
        </div>

        <!-- RIGHT: CUSTOMER INFO + ACTION -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-lg p-4" style="background:#f8f9fa;">
                <h5 class="fw-bold mb-3">📦 Podaci o kupcu</h5>

                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ime i prezime</label>
                        <input type="text" 
                               name="guest_name" 
                               class="form-control" 
                               value="{{ old('guest_name', $user->name ?? '') }}" 
                               required
                               @auth readonly @endauth >
                               
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" 
                               name="guest_email" 
                               class="form-control" 
                               value="{{ old('guest_email', $user->email ?? '') }}" 
                               required
                               @auth readonly @endauth>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefon</label>
                        <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Adresa isporuke</label>
                        <textarea name="address" class="form-control" rows="2" required>{{ old('address') }}</textarea>
                    </div>

                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-success btn-lg">
                            Potvrdi narudžbinu
                        </button>

                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            Odustani i vrati se u shop
                        </a>
                    </div>
                </form>

                <p class="text-muted small text-center mt-3">
                    Sigurno plaćanje • SSL zaštita • Bezbedna kupovina
                </p>
            </div>
        </div>

    </div>
</div>

@endsection

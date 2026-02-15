@extends('layouts.layout')

@section('title','Hvala na kupovini')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card border-0 shadow-lg p-5 text-center" style="background-color: #f9f9f9;">
                
                <h1 class="fw-bold mb-4" style="font-size: 2.5rem; color: #28a745;">
                    Vaša porudžbina je uspešno primljena!
                </h1>

                <p class="mb-3" style="font-size: 1.25rem; color: #555;">
                    Zahvaljujemo na poverenju. Isporuka u roku od 3–5 radnih dana.
                </p>

                <p class="mb-4" style="font-size: 1.1rem; color: #555;">
                    Hvala Vam što ste kupovali kod nas !
                </p>

                <a href="{{ route('home.index') }}" class="btn btn-success btn-lg mt-3">
                    Vrati se na početnu
                </a>

            </div>

        </div>
    </div>
</div>

@endsection
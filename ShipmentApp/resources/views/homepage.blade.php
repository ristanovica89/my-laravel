@extends('custom_layouts.app')

@section('title', 'Home')

@section('content')
@include('flash-msg.success')
@include('flash-msg.error')
<div class="bg-secondary rounded-2xl shadow-2xl shadow-black/40 p-12 text-center border border-gray-800">

  <h1 class="text-4xl font-bold mb-6 text-white">
    Track Your Shipment in Real Time
  </h1>

  <p class="text-gray-400 mb-8">
    Enter your tracking number to get live status updates.
  </p>

  <form class="flex flex-col md:flex-row justify-center gap-4 max-w-xl mx-auto">
    <input
      type="text"
      placeholder="Enter tracking number"
      class="flex-1 bg-primary border border-gray-700 rounded-lg px-4 py-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-accent">
    <button
      type="submit"
      class="bg-accent text-primary px-6 py-3 rounded-lg font-semibold hover:bg-accentSoft transition shadow-lg shadow-accent/30">
      Track
    </button>
  </form>

</div>
<br>
<hr>
<br>
<h1 class="text-3xl font-bold mb-8 text-white text-center">
  Unassigned Shipments
</h1>

<div class="grid gap-6 
            sm:grid-cols-1 
            md:grid-cols-2 
            lg:grid-cols-3 
            xl:grid-cols-4">

            @foreach($shipments as $shipment)
              @include('shipments.card')
            @endforeach
  

</div>
@livewire('shipment-assigned-list')
@endsection
@extends('custom_layouts.app')

@section('title', 'Edit Shipment')

@section('content')

@php
$status = $shipment->status ?? \App\Models\Shipment::STATUS_UNASSIGNED;
$statusClasses = \App\Models\Shipment::STATUS_COLORS[$status]
?? 'bg-gray-500/20 text-gray-400 border border-gray-500/40';
@endphp

<div class="max-w-4xl mx-auto">

  <!-- Header -->
  <div class="mb-8 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-white">Edit Shipment</h1>

    <span class="inline-flex items-center gap-2 text-sm px-4 py-2 rounded-xl font-semibold {{ $statusClasses }}">
      <span class="w-2.5 h-2.5 rounded-full bg-current"></span>
      {{ ucfirst($status) }}
    </span>
  </div>

  <!-- SUCCESS MESSAGE -->
  @if(session('success'))
  <div class="mb-6 bg-green-500/10 border border-green-500/40 text-green-400 px-6 py-4 rounded-xl">
    {{ session('success') }}
  </div>
  @endif

  <!-- VALIDATION ERRORS -->
  @if($errors->any())
  <div class="mb-6 bg-red-500/10 border border-red-500/40 text-red-400 px-6 py-4 rounded-xl">
    <ul class="list-disc pl-5 space-y-1">
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="bg-secondary border border-gray-700 rounded-2xl p-10 shadow-2xl shadow-black/40">

    <form action="{{ route('shipments.update', $shipment->id) }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-8">

      @csrf
      @method('PUT')

      <!-- TITLE -->
      <div>
        <label class="block text-gray-400 text-sm mb-2">Title</label>
        <input type="text"
          name="title"
          value="{{ old('title', $shipment->title) }}"
          class="w-full bg-primary border border-gray-700 rounded-xl p-4 text-white focus:border-accent">
      </div>

      <!-- FROM / TO -->
      <div class="grid md:grid-cols-2 gap-6">
        <input type="text" name="from_city"
          value="{{ old('from_city', $shipment->from_city) }}"
          placeholder="From City"
          class="bg-primary border border-gray-700 rounded-xl p-4 text-white">

        <input type="text" name="from_country"
          value="{{ old('from_country', $shipment->from_country) }}"
          placeholder="From Country"
          class="bg-primary border border-gray-700 rounded-xl p-4 text-white">

        <input type="text" name="to_city"
          value="{{ old('to_city', $shipment->to_city) }}"
          placeholder="To City"
          class="bg-primary border border-gray-700 rounded-xl p-4 text-white">

        <input type="text" name="to_country"
          value="{{ old('to_country', $shipment->to_country) }}"
          placeholder="To Country"
          class="bg-primary border border-gray-700 rounded-xl p-4 text-white">
      </div>

      <!-- PRICE -->
      <div>
        <label class="block text-gray-400 text-sm mb-2">Price</label>
        <input type="number"
          step="0.01"
          name="price"
          value="{{ old('price', $shipment->price) }}"
          class="w-full bg-primary border border-gray-700 rounded-xl p-4 text-white">
      </div>

      <!-- STATUS -->
      <div>
        <label class="block text-gray-400 text-sm mb-2">Status</label>
        <select name="status"
          class="w-full bg-primary border border-gray-700 rounded-xl p-4 text-white">
          @foreach(\App\Models\Shipment::STATUSES as $shipmentStatus)
          <option value="{{ $shipmentStatus }}"
            {{ old('status', $shipment->status) === $shipmentStatus ? 'selected' : '' }}>
            {{ ucfirst($shipmentStatus) }}
          </option>
          @endforeach
        </select>
      </div>

      <!-- DETAILS -->
      <div>
        <label class="block text-gray-400 text-sm mb-2">Details</label>
        <textarea name="details"
          rows="5"
          class="w-full bg-primary border border-gray-700 rounded-xl p-4 text-white">{{ old('details', $shipment->details) }}</textarea>
      </div>

      <!-- USER ID -->
      <div>
        <label class="block text-gray-400 text-sm mb-2">User Id</label>
        <input type="number"
          name="user_id"
          value="{{ old('user_id', $shipment->user_id) }}"
          class="w-full bg-primary border border-gray-700 rounded-xl p-4 text-white focus:border-accent">
      </div>

      <!-- EXISTING DOCUMENTS -->
      @if(isset($shipment_documents) && $shipment_documents->count())
      <div class="space-y-4">

        <p class="text-gray-400 text-sm mb-2 font-medium">Existing Documents</p>

        <div class="grid md:grid-cols-2 gap-4">
          @foreach($shipment_documents as $document)
          <div class="bg-primary border border-gray-700 rounded-xl p-4
            hover:border-accent/60 hover:shadow-lg hover:shadow-black/30 transition duration-200">
            <div class="flex items-center justify-between">

              <div class="flex items-center gap-4">
                <div class="w-12 h-12 flex items-center justify-center
                  rounded-xl border border-gray-600
                  text-gray-300 text-xs font-bold uppercase">
                  {{ pathinfo($document->original_name, PATHINFO_EXTENSION) }}
                </div>
                <div>
                  <a href="/storage/documents/{{ $document->path }}"
                    target="_blank"
                    class="text-gray-200 font-semibold hover:text-accent transition">
                    {{ $document->original_name }}
                  </a>
                  <p class="text-gray-500 text-xs mt-1">Uploaded document</p>
                </div>
              </div>

              <!-- DELETE LINK -->
              <a href="#"
                class="px-3 py-2 text-sm rounded-lg border border-red-500 text-red-400 hover:bg-red-500 hover:text-white transition">
                Delete
              </a>

            </div>
          </div>
          @endforeach
        </div>

      </div>
      @endif

      <!-- UPLOAD SECTION -->
      <div class="mt-4">
        <label class="block text-gray-400 text-sm font-medium mb-2">
          Upload New Documents
        </label>
        <input type="file"
          name="documents[]"
          multiple
          class="w-full bg-primary border border-gray-700 
                      rounded-xl px-4 py-3 text-gray-300
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-lg file:border-0
                      file:text-sm file:font-semibold
                      file:bg-accent file:text-primary
                      hover:file:bg-accentSoft
                      focus:outline-none focus:border-accent
                      transition">
      </div>

      <!-- ACTION BUTTONS -->
      <div class="flex justify-end gap-4 border-t border-gray-700 pt-6">
        <a href="{{ route('shipments.show', $shipment->id) }}"
          class="px-6 py-3 rounded-lg font-semibold border border-gray-600 
                  text-gray-300 hover:border-accent hover:text-accent transition">
          Cancel
        </a>
        <button type="submit"
          class="bg-accent text-primary px-8 py-3 rounded-lg font-semibold 
                       hover:bg-accentSoft transition shadow-lg shadow-accent/30">
          Update Shipment
        </button>
      </div>

    </form>

  </div>

</div>

@endsection
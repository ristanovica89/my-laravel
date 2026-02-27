@extends('custom_layouts.app')

@section('title', 'Create Shipment')

@section('content')
@include('flash-msg.success')
@include('flash-msg.error')
@php
$statuses = \App\Models\Shipment::STATUSES;
@endphp
<div class="max-w-3xl mx-auto bg-secondary rounded-2xl shadow-2xl shadow-black/30 p-10 border border-gray-700">

    <h1 class="text-3xl font-bold mb-8 text-white text-center">
        Create New Shipment
    </h1>

    <form action="{{ route('shipments.store') }}" enctype="multipart/form-data" method="POST" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label class="block text-gray-300 mb-2">Title</label>
            <input type="text"
                name="title"
                value="{{ old('title') }}"
                class="w-full bg-primary border border-gray-600 rounded-lg px-4 py-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-accent">
        </div>

        <!-- From City & Country -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-300 mb-2">From City</label>
                <input type="text"
                    name="from_city"
                    value="{{ old('from_city') }}"
                    class="w-full bg-primary border border-gray-600 rounded-lg px-4 py-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-accent">
            </div>

            <div>
                <label class="block text-gray-300 mb-2">From Country</label>
                <input type="text"
                    name="from_country"
                    value="{{ old('from_country') }}"
                    class="w-full bg-primary border border-gray-600 rounded-lg px-4 py-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-accent">
            </div>
        </div>

        <!-- To City & Country -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-300 mb-2">To City</label>
                <input type="text"
                    name="to_city"
                    value="{{ old('to_city') }}"
                    class="w-full bg-primary border border-gray-600 rounded-lg px-4 py-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-accent">
            </div>

            <div>
                <label class="block text-gray-300 mb-2">To Country</label>
                <input type="text"
                    name="to_country"
                    value="{{ old('to_country') }}"
                    class="w-full bg-primary border border-gray-600 rounded-lg px-4 py-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-accent">
            </div>
        </div>

        <!-- Price -->
        <div>
            <label class="block text-gray-300 mb-2">Price</label>
            <input type="number"
                name="price"
                step="0.01"
                value="{{ old('price') }}"
                class="w-full bg-primary border border-gray-600 rounded-lg px-4 py-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-accent">
        </div>

        <!-- Status -->
        <div>
            <label class="block text-gray-300 mb-2">Status</label>
            <select name="status"
                class="w-full bg-primary border border-gray-600 rounded-lg px-4 py-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-accent">
                @foreach($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
                @endforeach

            </select>
        </div>

        <!-- Details -->
        <div>
            <label class="block text-gray-300 mb-2">Details</label>
            <textarea name="details"
                rows="4"
                class="w-full bg-primary border border-gray-600 rounded-lg px-4 py-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-accent">{{ old('details') }}</textarea>
        </div>

        <!-- Documents -->
        <div>
            <label class="block text-gray-300 mb-2">Documents</label>

            <div class="flex flex-col gap-3">
                <!-- Hidden file input -->
                <input
                    type="file"
                    name="documents[]"
                    id="documents"
                    multiple
                    required
                    class="hidden"
                    onchange="updateFileList(this)">

                <!-- Custom button -->
                <label for="documents"
                    class="cursor-pointer w-fit bg-accent hover:bg-accent/80 text-white px-5 py-3 rounded-lg transition duration-200 shadow-md">
                    Upload Documents
                </label>

                <!-- File list -->
                <ul id="file-list" class="text-sm text-gray-400 space-y-1">
                    <li>No files selected</li>
                </ul>
            </div>
        </div>

        <script>
            function updateFileList(input) {
                const fileList = document.getElementById('file-list');
                fileList.innerHTML = "";

                if (input.files.length === 0) {
                    fileList.innerHTML = "<li>No files selected</li>";
                    return;
                }

                Array.from(input.files).forEach(file => {
                    const li = document.createElement("li");
                    li.textContent = file.name + " (" + (file.size / 1024).toFixed(1) + " KB)";
                    li.classList.add("bg-primary", "px-3", "py-2", "rounded", "border", "border-gray-600");
                    fileList.appendChild(li);
                });
            }
        </script>

        <!-- Buttons -->
        <div class="flex flex-wrap justify-between gap-4 mt-6">

            <button type="submit"
                class="bg-accent text-primary px-6 py-3 rounded-lg font-semibold hover:bg-accentSoft transition shadow-lg shadow-accent/30">
                Create
            </button>

            <button type="reset"
                class="bg-gray-600 text-gray-200 px-6 py-3 rounded-lg font-semibold hover:bg-gray-500 transition">
                Reset
            </button>

            <a href="{{ route('home.index') }}"
                class="px-6 py-3 rounded-lg font-semibold border border-accent text-accent hover:bg-accent hover:text-primary transition">
                Back to Shipments
            </a>

        </div>
    </form>


</div>

@endsection
@extends('custom_layouts.app')

@section('title', 'Shipment Details')

@section('content')

@php
$status = $shipment->status ?? \App\Models\Shipment::STATUS_UNASSIGNED;
$statusClasses = \App\Models\Shipment::STATUS_COLORS[$status]
?? 'bg-gray-500/20 text-gray-400 border border-gray-500/40';
@endphp

<div class="max-w-4xl mx-auto">

    <!-- Header -->
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-white">
            Shipment Details 
        </h1>

        <span class="inline-flex items-center gap-2 text-sm px-4 py-2 rounded-xl font-semibold {{ $statusClasses }}">
            <span class="w-2.5 h-2.5 rounded-full bg-current"></span>
            {{ ucfirst($status) }}
        </span>
    </div>

    <!-- Main Card -->
    <div class="bg-secondary border border-gray-700 rounded-2xl p-10 
                shadow-2xl shadow-black/40">

        <!-- Title -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-accent">
                {{ $shipment->title }}
            </h2>
        </div>

        <!-- Route Section -->
        <div class="grid md:grid-cols-2 gap-8 mb-10">

            <div class="bg-primary border border-gray-700 rounded-xl p-6">
                <p class="text-gray-400 text-sm mb-2">From</p>
                <p class="text-lg text-white font-medium">
                    {{ $shipment->from_city }},
                    {{ $shipment->from_country }}
                </p>
            </div>

            <div class="bg-primary border border-gray-700 rounded-xl p-6">
                <p class="text-gray-400 text-sm mb-2">To</p>
                <p class="text-lg text-white font-medium">
                    {{ $shipment->to_city }},
                    {{ $shipment->to_country }}
                </p>
            </div>

        </div>

        <!-- Price + User -->
        <div class="grid md:grid-cols-2 gap-8 mb-10">

            <div>
                <p class="text-gray-400 text-sm mb-1">Price</p>
                <p class="text-2xl font-bold text-accent">
                    ${{ number_format($shipment->price, 2) }}
                </p>
            </div>

            <div>
                <p class="text-gray-400 text-sm mb-1">User ID</p>
                <p class="text-lg text-gray-200">
                    {{ $shipment->user_id }}
                </p>
            </div>

        </div>

        <!-- Details -->
        <div class="mb-10">
            <p class="text-gray-400 text-sm mb-2">Details</p>
            <div class="bg-primary border border-gray-700 rounded-xl p-6 text-gray-300 leading-relaxed">
                {{ $shipment->details }}
            </div>
        </div>

        <!-- Documents -->
        @if(isset($shipment_documents) && $shipment_documents->count())
        <div class="mb-10">
            <p class="text-gray-400 text-sm mb-4">Documents</p>

            <div class="grid md:grid-cols-2 gap-4">

                @foreach($shipment_documents as $document)

                <div class="bg-primary border border-gray-700 rounded-xl p-5 
                                hover:shadow-lg hover:shadow-black/30 
                                hover:border-accent/60 transition duration-200">

                    <div class="flex items-start justify-between">

                        <div class="flex items-center gap-4">

                            <!-- File Badge -->
                            <div class="w-12 h-12 flex items-center justify-center 
                            rounded-xl border {{ $document->file_color }} font-bold text-sm uppercase">
                                {{ $document->file_extension }}
                            </div>

                            <!-- File Info -->
                            <div>
                                <p class="text-gray-200 font-semibold">
                                    <a href="/storage/documents/{{ $document->path }}"
                                    target="_blank"
                                    class="text-gray-200 font-semibold hover:text-accent transition">
                                        {{ $document->original_name }}
                                    </a>
                                </p>

                                <p class="text-gray-500 text-xs mt-1">{{ $document->file_size_kb }}</p>
                            </div>

                        </div>

                        <!-- Actions -->
                        <a href="#"
                            class="text-sm font-semibold px-3 py-2 rounded-lg
                                      border border-accent text-accent
                                      hover:bg-accent hover:text-primary
                                      transition">
                            Download
                        </a>

                    </div>

                </div>

                @endforeach

            </div>
        </div>
        @endif

        <!-- Actions -->
        <div class="flex flex-wrap gap-4 justify-between border-t border-gray-700 pt-6">

            <a href="{{ route('shipments.edit', $shipment) }}"
                class="bg-accent text-primary px-6 py-3 rounded-lg font-semibold 
                      hover:bg-accentSoft transition shadow-lg shadow-accent/30">
                Edit Shipment
            </a>

            <a href="{{ route('home.index') }}"
                class="px-6 py-3 rounded-lg font-semibold border border-accent 
                      text-accent hover:bg-accent hover:text-primary transition">
                Back to Shipments
            </a>

        </div>

    </div>

</div>

@endsection
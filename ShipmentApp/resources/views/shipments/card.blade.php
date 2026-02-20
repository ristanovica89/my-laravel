@php
    $status = $shipment->status ?? \App\Models\Shipment::STATUS_UNASSIGNED;
    $statusClasses = \App\Models\Shipment::STATUS_COLORS[$status] ?? 'bg-gray-500/20 text-gray-400 border border-gray-500/40';
@endphp

<div class="bg-secondary border border-gray-700 rounded-2xl p-6 
            shadow-xl shadow-black/30 
            hover:shadow-accent/20 
            hover:border-accent/40 
            transition duration-300">

    <!-- Title + Status -->
    <div class="flex justify-between items-start mb-4">
        <h2 class="text-lg font-semibold text-white">
            {{ $shipment->title ?? 'MacBook Pro 16"' }}
        </h2>

        <span class="inline-flex items-center gap-2 text-xs px-3 py-1 rounded-xl font-semibold {{ $statusClasses }}">
            <span class="w-2 h-2 rounded-full bg-current"></span>
            {{ ucfirst($status) }}
        </span>
    </div>

    <!-- Route -->
    <div class="mb-4 text-sm text-gray-400 space-y-1">
        <p>
            <span class="text-gray-500">From:</span>
            <span class="text-gray-200">
                {{ $shipment->from_city ?? 'Belgrade' }},
                {{ $shipment->from_country ?? 'Serbia' }}
            </span>
        </p>

        <p>
            <span class="text-gray-500">To:</span>
            <span class="text-gray-200">
                {{ $shipment->to_city ?? 'Berlin' }},
                {{ $shipment->to_country ?? 'Germany' }}
            </span>
        </p>
    </div>

    <!-- Price -->
    <div class="mb-4">
        <p class="text-accent font-bold text-lg">
            ${{ number_format($shipment->price ?? 1200, 2) }}
        </p>
    </div>

    <!-- Details -->
    <div class="mb-4 text-sm text-gray-400">
        {{ $shipment->details ?? 'Fragile electronics shipment with insurance coverage.' }}
    </div>

    <!-- Footer -->
    <div class="flex justify-between items-center pt-4 border-t border-gray-700 text-xs text-gray-500">
        <span>User ID: {{ $shipment->user_id ?? 1 }}</span>

        <a href="{{ route('shipments.show', $shipment) }}" class="hover:text-accent transition">
            View Details →
        </a>
    </div>

</div>

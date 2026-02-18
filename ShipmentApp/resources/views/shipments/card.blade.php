<div class="bg-secondary border border-gray-700 rounded-2xl p-6 
            shadow-xl shadow-black/30 
            hover:shadow-accent/20 
            hover:border-accent/40 
            transition duration-300">

    <!-- Title -->
    <div class="flex justify-between items-start mb-4">
        <h2 class="text-lg font-semibold text-white">
            {{ $shipment->title ?? 'MacBook Pro 16"' }}
        </h2>

        <a href="#"
           class="text-xs bg-accent text-primary px-3 py-1 rounded-full font-semibold hover:bg-accentSoft transition">
            {{ $shipment->status ?? 'In Transit' }}
        </a>
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
            ${{ $shipment->price ?? '1,200.00' }}
        </p>
    </div>

    <!-- Details -->
    <div class="mb-4 text-sm text-gray-400">
        {{ $shipment->details ?? 'Fragile electronics shipment with insurance coverage.' }}
    </div>

    <!-- Footer -->
    <div class="flex justify-between items-center pt-4 border-t border-gray-700 text-xs text-gray-500">
        <span>User ID: {{ $shipment->user_id ?? 1 }}</span>

        <a href="#" class="hover:text-accent transition">
            View Details →
        </a>
    </div>

</div>

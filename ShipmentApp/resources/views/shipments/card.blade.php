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
    <div class="pt-4 border-t border-gray-700 text-xs text-gray-400 space-y-3">

        <!-- Row 1: Trucker + Client ID -->
        <div class="flex justify-between">
            <div>
                <span class="text-gray-500">Trucker ID:</span>
                <span class="text-gray-200 font-semibold">
                    {{ $shipment->user_id ?? '—' }}
                </span>
            </div>

            <div>
                <span class="text-gray-500">Client ID:</span>
                <span class="text-gray-200 font-semibold">
                    {{ $shipment->client_id ?? '—' }}
                </span>
            </div>
        </div>

        <!-- Row 2: Client Select -->
        <form action="{{ route('shipments.assignUser', $shipment) }}" method="POST" class="flex gap-2">
            @csrf
            @method('PATCH')
            <select name="user_id"
                class="flex-1 bg-primary border border-gray-700 rounded-lg px-2 py-1 text-gray-200 text-xs">
                <option selected disabled>None</option>

                @foreach($users ?? [] as $user)
                <option value="{{ $user->id }}"
                    {{ $user->id == $shipment->client_id ? 'selected' : '' }}>
                    {{ $user->name }} (#{{ $user->id }})
                </option>
                @endforeach
            </select>

            <button type="submit"
                class="bg-accent text-black text-xs px-3 py-1 rounded-lg hover:bg-accent/80 transition">
                Assigned
            </button>

        </form>

        <!-- Row 3: View Details -->
        <div class="flex justify-end">
            <a href="{{ route('shipments.show', $shipment) }}"
                class="hover:text-accent transition font-semibold">
                View Details →
            </a>
        </div>

    </div>

</div>
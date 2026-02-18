@if($errors->any())
    <div class="max-w-3xl mx-auto mt-6 px-6 py-4 rounded-xl
                bg-red-500/10 border border-red-500/40
                text-red-300 shadow-xl backdrop-blur-sm">

        <div class="flex items-center gap-2 mb-3">
            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v2m0 4h.01M5.93 19h12.14c1.1 0 1.79-1.2 1.23-2.15L13.23 4.85a1.5 1.5 0 00-2.46 0L4.7 16.85c-.56.95.13 2.15 1.23 2.15z"/>
            </svg>
            <span class="font-semibold">
                Validation Error
            </span>
        </div>

        <ul class="space-y-1 text-sm">
            @foreach($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

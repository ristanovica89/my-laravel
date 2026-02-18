@if(session('success'))
    <div class="max-w-3xl mx-auto mt-6 px-6 py-4 rounded-xl 
                bg-green-500/10 border border-green-500/40 
                text-green-300 shadow-xl backdrop-blur-sm 
                animate-fade-in">
        <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5 13l4 4L19 7"/>
            </svg>
            <span class="font-semibold">
                {{ session('success') }}
            </span>
        </div>
    </div>
@endif
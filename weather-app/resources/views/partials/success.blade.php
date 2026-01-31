@if(session('success'))
<div class="mb-4 rounded-md bg-green-100 p-4">
  <div class="flex items-center">
    <svg class="h-5 w-5 flex-shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
    </svg>
    <span class="ml-3 text-sm font-medium text-green-700">{{ session('success') }}</span>
  </div>
</div>
@endif
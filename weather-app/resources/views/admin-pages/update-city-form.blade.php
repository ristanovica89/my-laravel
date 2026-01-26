@extends('custom-layouts.admin-view')
@section('title','Update City - Admin')

@section('content')
@section('banner', 'Admin Panel - Update City')

@if(session('error'))
<div class="mb-4 rounded-md bg-red-100 p-4">
  <div class="flex items-center">
    <svg class="h-5 w-5 flex-shrink-0 text-red-500" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-8-4a1 1 0 00-1 1v4a1 1 0 102 0V7a1 1 0 00-1-1zm0 8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" />
    </svg>
    <span class="ml-3 text-sm font-medium text-red-700">{{ session('error') }}</span>
  </div>
</div>
@endif
@include('partials.update-city-form')

@endsection
@extends('layouts.layout-admin')

@section('title','Admin - Update Contact')

@section('content')

@include('components.errors-flash-msg')

<div class="card bg-dark text-light shadow">
  <div class="card-body">

    <h3 class="mb-4 text-center">Update <span class="text-warning"> Contact</span></h3>

    <form action="{{ route('contacts.updateContactById', $contact) }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
          type="email"
          class="form-control bg-dark text-light border-secondary"
          id="email"
          name="email"
          placeholder="Enter email"
          value="{{ $contact->email }}"
          required>
      </div>
      <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input
          type="text"
          class="form-control bg-dark text-light border-secondary"
          id="subject"
          name="subject"
          placeholder="Enter subject"
          value="{{ $contact->subject }}"
          required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Message</label>
        <textarea
          class="form-control bg-dark text-light border-secondary"
          id="message"
          name="message"
          rows="4"
          placeholder="Enter message"
          required>{{ $contact->message }}</textarea>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success btn-lg">
          Update Contact
        </button>
      </div>

    </form>

  </div>
</div>


@endsection
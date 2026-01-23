@extends('layouts.layout-admin')

@section('title','Admin - Contacts')

@section('content')

@include('components.success-flash-msg')
<h1 class="text-center text-light mb-5">All <span class="text-warning">Contacts</span></h1>

<table class="table table-dark table-hover">
  <thead class="table-secondary text-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach( $contacts as $contact)
    <tr>
      <th scope="row">{{ $contact->id }}</th>
      <td>{{ $contact->email }}</td>
      <td>{{ $contact->subject }}</td>
      <td>{{ $contact->message }}</td>
      <td>
        <a href="/admin/contact-delete/{{ $contact->id }}" class="btn btn-sm btn-outline-danger me-1" title="Delete Product">
          <i class="bi bi-trash"></i> Delete
        </a>
        <a href="#" class="btn btn-sm btn-outline-primary" title="Update Product">
          <i class="bi bi-pencil-square"></i> Update
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
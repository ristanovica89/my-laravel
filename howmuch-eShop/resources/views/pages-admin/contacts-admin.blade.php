@extends('layouts.layout-admin')

@section('title','Admin - Contacts')

@section('content')

@include('components.success-flash-msg')
@include('components.message-flash')

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
    {{ $row = 0; }}
    @foreach( $contacts as $contact)
    <tr>
      <th scope="row">{{ ++$row; }}</th>
      <td>{{ $contact->email }}</td>
      <td>{{ $contact->subject }}</td>
      <td>{{ $contact->message }}</td>
      <td>
        <a href="{{ route('contact.deleteContactById', $contact) }}" class="btn btn-sm btn-outline-danger me-1" title="Delete Contact">
          <i class="bi bi-trash"></i> Delete
        </a>
        <a href="{{ route('contact.getContactForUpdateById', $contact) }}" class="btn btn-sm btn-outline-primary" title="Update Contact">
          <i class="bi bi-pencil-square"></i> Update
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
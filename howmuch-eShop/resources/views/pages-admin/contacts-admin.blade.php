@extends('./layouts.layout-admin')

@section('title','Admin - Contacts')

@section('content')

<h1 class="text-center text-light mb-5">All <span class="text-warning">Contacts</span></h1>

<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    @foreach( $contacts as $contact)
    <tr>
      <th scope="row">{{ $contact->id }}</th>
      <td>{{ $contact->email }}</td>
      <td>{{ $contact->subject }}</td>
      <td>{{ $contact->message }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
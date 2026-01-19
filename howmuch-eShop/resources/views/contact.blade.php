@extends('layouts.layout')

@section('title','Contact Us')

@section('content')

<h1 class="text-center">Send Us Your <span class="text-success">message</span></h1>

@include('components.contact-form')
@include('components.location')


@endsection
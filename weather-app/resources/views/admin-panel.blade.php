@extends('custom-layouts.admin-view')
@section('title','Admin Panel')

@section('content')
@section('banner', 'Admin Panel - Weather App')
@include('partials.city-table')

@endsection
@extends('layout.sidenav')
@section('content')
    @include('components.customer.customer-list')
    @include('components.customer.create-customer')
    @include('components.customer.update-customer')
    @include('components.customer.delete-customer')
    @include('components.customer.send-mail')
@endsection
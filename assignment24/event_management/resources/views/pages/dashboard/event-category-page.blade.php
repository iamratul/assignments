@extends('layout.sidenav')
@section('content')
    @include('components.event-category.event-category-create')
    @include('components.event-category.event-category-list')
    @include('components.event-category.event-category-delete')
    @include('components.event-category.event-category-update')
@endsection
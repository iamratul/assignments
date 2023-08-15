@extends('layout.sidenav')
@section('content')
    @include('components.event.create-event')
    @include('components.event.event-list')
    @include('components.event.delete-event')
    @include('components.event.update-event')
    @include('components.event.view-event')
@endsection
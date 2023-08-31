@extends('layouts.admin')
@section('content')
    @include('components.leave-category.leave-category-create')
    @include('components.leave-category.leave-category-list')
    @include('components.leave-category.leave-category-update')
    @include('components.leave-category.leave-category-delete')
@endsection

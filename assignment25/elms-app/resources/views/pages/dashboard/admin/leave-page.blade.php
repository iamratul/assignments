@extends('layouts.admin')
@section('content')
    @include('components.dashboard.admin.leave.leave-list')
    @include('components.dashboard.admin.leave.leave-update')
    @include('components.dashboard.admin.leave.leave-delete')
@endsection
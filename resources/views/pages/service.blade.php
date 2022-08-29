@extends('components.layout')

@section('content')
    <!-- Breadcrumb Area Starts -->
    @include('components.service.breadcrumb')

    <!-- Service Area Starts -->
    @include('components.service.service')

    <!-- Client Area Starts -->
    @include('components.home.client-area')

    <!-- Social Link Area Starts -->
    @include('components.home.social')

@endsection
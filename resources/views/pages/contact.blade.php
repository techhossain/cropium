@extends('components.layout')

@section('content')
    <!-- Breadcrumb Area Starts -->
    @include('components.contact.breadcrumb')

    <!-- Contact Area Starts -->
    @include('components.contact.contact-area')
    
    <!-- Map Area Starts -->
    @include('components.contact.map')

@endsection
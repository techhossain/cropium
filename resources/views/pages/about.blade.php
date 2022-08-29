@extends('components.layout')

@section('content')
    <!-- Breadcrumb Area Starts -->
    @include('components.about.breadcrumb')

    <!-- About Area Start -->
    @include('components.about.about')

    <!-- Feature Area Starts -->
    @include('components.home.feature')

    <!-- Team Member Area Starts -->
    @include('components.about.team')

    <!-- Social Link Area Starts -->
    @include('components.home.social')


@endsection
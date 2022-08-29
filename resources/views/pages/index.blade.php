@extends('components.layout')

@section('content')
    <!-- Hero Area Starts -->
    @include('components.home.hero')
    <!-- About Area Starts -->
    @include('components.home.about-area')

    <!-- Feature Area Starts -->
    @include('components.home.feature')

    <!-- Experience & Skills Area Starts -->
    @include('components.home.skill')

    <!-- Portfolio Area Starts -->
    @include('components.home.portfolio-area')

    <!-- Client Area Starts -->
    @include('components.home.client-area')

    <!-- CounterUP Area Starts -->
    @include('components.home.counter')

    <!-- Award Area Starts -->
    @include('components.home.award')

    <!-- Social Link Area Starts -->
    @include('components.home.social')
    
@endsection
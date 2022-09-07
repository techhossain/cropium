@extends('components.layout')

@section('content')
    <!-- Breadcrumb Area Starts -->
    @include('components.about.breadcrumb')

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Make Payment</h2>
                    <hr>
                    <form action="{{route('payment.send')}}" method="post">
                    @csrf
                        <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
                    
                    </form>
                </div>
            </div>
        </div>

    <!-- Social Link Area Starts -->
    @include('components.home.social')


@endsection
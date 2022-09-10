@extends('components.layout')

@section('content')
    <!-- Breadcrumb Area Starts -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">All Notifications</h2>
                    <a href="#">home</a><span> / notifications</span>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>All Notification</h2>
                <ul>
                    @if(count($notifications) > 0)
                        @foreach ($notifications as $notification)

                            @if(isset($notification->created_at) && $notification->data['name'] && $notification->data['email'])
                                <li>
                                    Account Created at {{ $notification->created_at }} with the following
                                    {{ $notification->data['name'] }} and {{$notification->data['email']}}
                                </li>
                            @endif

                        @endforeach

                    @else
                        <p>No Notification Found</p>
                    @endif
                </ul>
            </div>
        </div>
    </div>


@endsection
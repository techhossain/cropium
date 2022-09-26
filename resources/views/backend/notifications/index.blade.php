@extends('backend.admin.layout')
  @section('content')    
    <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                @if(session()->get('message'))
                <div class="row">
                  <div class="col">
                    <div class="alert alert-success">
                      {{session('message')}}
                    </div>
                  </div>
                </div>
                @endif
                
                <div class="row">
                    <div class="col">
                        <h2>All Notification</h2>

                        <ul class="list-group">
                            @if(count($notifications) > 0)
                                @foreach ($notifications as $notification)
        
                                    @if(isset($notification->created_at) && $notification->data['name'] && $notification->data['email'])
                                        <li class="list-group-item">
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
            </div>
          </div>
        </div>
      </div>
  

@endsection
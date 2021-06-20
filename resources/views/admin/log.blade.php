@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Activity Timeline</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="activity-timeline timeline-left list-unstyled">
                            @foreach($notifications as $notification)
                                <li>
                                    <div class="timeline-icon bg-{{getNotificationBackground($notification->type)}}">
                                        <i class="feather icon-{{getNotificationIcon($notification->type)}} font-medium-2 align-middle"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold mb-0">{{str_replace('_',' ',$notification->type)}}</p>
                                        <span class="font-small-3">{{$notification->body}}</span>
                                    </div>
                                    <small class="text-muted">{{$notification->created_at}}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Ecommerce Pagination Starts -->
    <section id="ecommerce-pagination">
        <div class="row">
            <div class="col-sm-12 text-center">
                    {{ $notifications->links() }}
            </div>
        </div>
    </section>
    <!-- Ecommerce Pagination Ends -->

@endsection

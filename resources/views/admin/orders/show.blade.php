@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{'Order Details'}}</h4>
                        {{--                        @if(!isset($_GET['parent_id']))--}}
                        {{--                            <a href="{{route('admin.services.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>--}}
                        {{--                        @endif--}}
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table table-dark table-striped mb-0">
                                    <tbody>
                                    <tr>
                                        <td><strong>Service</strong></td>
                                        <td>{{$order->service->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Service Option</strong></td>
                                        <td>{{$order->service_option->title}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>User</strong></td>
                                        <td>{{($order->user)?$order->user->name:''}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Provider</strong></td>
                                        <td>{{($order->provider)?$order->provider->name:''}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of Professional</strong></td>
                                        <td>{{$order->number_of_professionals}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Days/Hours</strong></td>
                                        <td>{{$order->days_or_hours}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of Days/Hours</strong></td>
                                        <td>{{$order->number_of_days_or_hours}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td>{{$order->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Service Time</strong></td>
                                        <td>{{$order->service_time}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Language</strong></td>
                                        <td>{{$order->language}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description</strong></td>
                                        <td>{{$order->description}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Photos</strong></td>
                                        <td>
                                            @if(unserialize($order->photos))
                                                @foreach(unserialize($order->photos) as $photo)
                                                    <a href="{{asset($photo)}}" target="_blank">photo {{$loop->iteration}}</a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>City</strong></td>
                                        <td>{{$order->city}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Area</strong></td>
                                        <td>{{$order->area}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Building Number</strong></td>
                                        <td>{{$order->building_number}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Floor Number</strong></td>
                                        <td>{{$order->floor_number}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status</strong></td>
                                        <td>{{$order->status}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
@section('script')

@endsection

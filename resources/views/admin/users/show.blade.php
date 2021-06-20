@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$user->name}}</h4>
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
                                        <td><strong>Name</strong></td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone</strong></td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Birth date</strong></td>
                                        <td>{{$user->birth_date}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td>{{$user->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Invitation Code</strong></td>
                                        <td>{{$user->invitation_code}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Experience Years</strong></td>
                                        <td>{{$user->experience_years}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>National ID</strong></td>
                                        <td>
                                            @if($user->national_id)
                                            <a href="{{asset($user->national_id)}}" target="_blank">Open link</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>profile image</strong></td>
                                        <td>
                                            @if($user->image)
                                                <a href="{{asset($user->image)}}" target="_blank">Open link</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mcoins</strong></td>
                                        <td>{{$user->coins}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Join Date</strong></td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Services</strong></td>
                                        <td>
                                            @foreach(getUserProfileServices($user->services,'en') as $service)
                                                <strong>{{$service['parent_name']}}</strong>
                                                <ul>
                                                    @foreach($service['sub_services'] as $sub)
                                                         <li>{{$sub->name}}</li>
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h4 class="card-title">Total Orders</h4>
                        {{--                    <div class="dropdown chart-dropdown">--}}
                        {{--                        <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button" id="dropdownItem4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--                            Last 7 Days--}}
                        {{--                        </button>--}}
                        {{--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem4">--}}
                        {{--                            <a class="dropdown-item" href="#">Last 28 Days</a>--}}
                        {{--                            <a class="dropdown-item" href="#">Last Month</a>--}}
                        {{--                            <a class="dropdown-item" href="#">Last Year</a>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                    <h1 class="font-large-2 text-bold-700 mt-2 mb-0">{{$total_requests}}</h1>
                                    <small>Orders</small>
                                </div>
                                <div class="col-sm-10 col-12 d-flex justify-content-center">
                                    <div id="total_orders_chart"></div>
                                </div>
                            </div>
                            <div class="chart-info d-flex justify-content-between">
                                <div class="text-center">
                                    <p class="mb-50">pending orders</p>
                                    <span class="font-large-1">{{$pending}}</span>
                                </div>
                                <div class="text-center">
                                    <p class="mb-50">in progress orders</p>
                                    <span class="font-large-1">{{$in_progress}}</span>
                                </div>
                                <div class="text-center">
                                    <p class="mb-50">completed orders</p>
                                    <span class="font-large-1">{{$completed}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reviews</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media-list">
                                @foreach($user->rates()->orderBy('id','desc')->get() as $rate)
                                    <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="{{asset($rate->reviewer->image)}}" class="rounded-circle" alt="{{$rate->reviewer->name}}" height="64" width="64" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{$rate->reviewer->name}}
                                            <small class="ml-2">{{$rate->created_at->format('Y/m/d')}}</small>
                                        </h4>
                                        <span class="fa fa-star {{($rate->rate >= 1)?'primary':''}}"></span>
                                        <span class="fa fa-star {{($rate->rate >= 2)?'primary':''}}"></span>
                                        <span class="fa fa-star {{($rate->rate >= 3)?'primary':''}}"></span>
                                        <span class="fa fa-star {{($rate->rate >= 4)?'primary':''}}"></span>
                                        <span class="fa fa-star {{($rate->rate >= 5)?'primary':''}}"></span>
                                        <p>{{$rate->review}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
@section('script')
    <script>
        @if($total_requests)
        totalOrders({{ceil(($completed/$total_requests)*100)}});
        @else
        totalOrders(0);
        @endif
    </script>
@endsection

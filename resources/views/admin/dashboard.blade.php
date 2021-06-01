@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25">
                        {{\App\User::Role('user')->count()}}
                    </h2>
                    <p class="mb-0">Users</p>
                </div>
                <div class="card-content">
                    <div id="users-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25">
                        {{\App\User::Role('provider')->count()}}
                    </h2>
                    <p class="mb-0">providers</p>
                </div>
                <div class="card-content">
                    <div id="providers-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
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
                                <small>Tickets</small>
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

    </div>

@endsection
@section('script')
    <script>
        drawChart('users',{{'[' . implode(',', $users_count) . ']'}},'#3EB453','users-chart');
        drawChart('providers',{{'[' . implode(',', $providers_count) . ']'}},'#7367F0','providers-chart');
        totalOrders({{ceil(($completed/$total_requests)*100)}});
    </script>
@endsection

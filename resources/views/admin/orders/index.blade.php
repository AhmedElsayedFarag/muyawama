@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$_GET['type']}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>date</th>
                                        <th>Service</th>
                                        <th>Service Option</th>
                                        <th>User</th>
                                        <th>Provider</th>
                                        <th>Service Time</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->service->name}}</td>
                                            <td>{{$order->service_option->title}}</td>
                                            <td>{{($order->user)?$order->user->name:''}}</td>
                                            <td>{{($order->provider)?$order->provider->name:''}}</td>
                                            <td>{{$order->service_time}}</td>
                                            <td>
                                                <a href="{{route('admin.orders.show',$order->id)}}" class="btn btn-info"><i class="feather icon-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                     <tr>
                                        <th>date</th>
                                        <th>Service</th>
                                        <th>Service Option</th>
                                        <th>User</th>
                                        <th>Provider</th>
                                        <th>Service Time</th>
                                        <th>Options</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

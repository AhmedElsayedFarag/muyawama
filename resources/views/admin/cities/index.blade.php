@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{(isset($_GET['city_id']))?\App\City::findOrFail($_GET['city_id'])->name:'Cities'}}</h4>
                        @if(!isset($_GET['city_id']))
                            <a href="{{route('admin.cities.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cities as $service)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$service->name}}</td>
                                            <td>
                                                @if(!$service->city_id)
                                                    <a href="{{route('admin.areas.create',['city_id'=>$service->id])}}" class="btn btn-primary"><i class="feather icon-plus-square"></i> Add area</a>
                                                    <a href="{{route('admin.areas.index',['city_id'=>$service->id])}}" class="btn btn-primary"><i class="feather icon-eye"></i> View areas</a>
                                                @endif
                                                <a onclick="fireDeleteEvent({{$service->id}})" type="button" class="btn btn-danger"><i class="feather icon-trash"></i> Delete</a>
                                                <form action="{{route('admin.cities.destroy',$service->id)}}" method="POST" id="form-{{$service->id}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
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

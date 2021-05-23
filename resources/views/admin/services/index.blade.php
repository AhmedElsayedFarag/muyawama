@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{(isset($_GET['parent_id']))?\App\Service::findOrFail($_GET['parent_id'])->name:'Services'}}</h4>
                        @if(!isset($_GET['parent_id']))
                        <a href="{{route('admin.services.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
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
                                        <th>Image</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$service->name}}</td>
                                            <td><img class="img-fluid img-thumbnail img-sm" src="{{asset($service->image)}}"> </td>
                                            <td>
                                                @if(!$service->parent_id)
                                                <a href="{{route('admin.services.create',['parent_id'=>$service->id])}}" class="btn btn-primary"><i class="feather icon-plus-square"></i> Add sub</a>
                                                <a href="{{route('admin.services.index',['parent_id'=>$service->id])}}" class="btn btn-primary"><i class="feather icon-eye"></i> View sub</a>
                                                @else
                                                    <a href="{{route('admin.service_options.create',['service_id'=>$service->id])}}" class="btn btn-primary"><i class="feather icon-plus-square"></i> Add options</a>
                                                    <a href="{{route('admin.service_options.index',['service_id'=>$service->id])}}" class="btn btn-primary"><i class="feather icon-plus-square"></i> View options</a>
                                                @endif
                                                <a href="{{route('admin.services.edit',$service->id)}}" class="btn btn-info"><i class="feather icon-edit"></i> Edit</a>
                                                <a onclick="fireDeleteEvent({{$service->id}})" type="button" class="btn btn-danger"><i class="feather icon-trash"></i> Delete</a>
                                                <form action="{{route('admin.services.destroy',$service->id)}}" method="POST" id="form-{{$service->id}}">
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
                                        <th>Image</th>
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

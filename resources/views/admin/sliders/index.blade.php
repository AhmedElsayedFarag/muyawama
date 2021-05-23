@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Slider</h4>
                            <a href="{{route('admin.sliders.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slides as $service)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img class="img-fluid img-thumbnail img-sm" src="{{asset($service->image)}}"> </td>
                                            <td>
                                                <a onclick="fireDeleteEvent({{$service->id}})" type="button" class="btn btn-danger"><i class="feather icon-trash"></i> Delete</a>
                                                <form action="{{route('admin.sliders.destroy',$service->id)}}" method="POST" id="form-{{$service->id}}">
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

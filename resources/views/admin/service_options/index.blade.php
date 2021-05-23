@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{(isset($_GET['service_id']))?\App\Service::findOrFail($_GET['service_id'])->name:'Services'}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
{{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>title</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($options as $service)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$service->title}}</td>
                                            <td>
                                                <a href="{{route('admin.service_options.edit',$service->id)}}" class="btn btn-info"><i class="feather icon-edit"></i> Edit</a>
                                                <a onclick="fireDeleteEvent({{$service->id}})" type="button" class="btn btn-danger"><i class="feather icon-trash"></i> Delete</a>
                                                <form action="{{route('admin.service_options.destroy',$service->id)}}" method="POST" id="form-{{$service->id}}">
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
                                        <th>title</th>
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

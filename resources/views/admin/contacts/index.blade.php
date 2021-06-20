@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contact us</h4>
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
                                        <th>phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $service)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$service->name}}</td>
                                            <td>{{$service->phone}}</td>
                                            <td>{{$service->email}}</td>
                                            <td>{{$service->message}}</td>
                                            <td>
                                                <a class="btn btn-primary" href="mailto:{{$service->email}}?Subject=reply to your message to {{setting('website_title','en')}}">Reply</a>
                                                <a onclick="fireDeleteEvent({{$service->id}})" type="button" class="btn btn-danger"><i class="feather icon-trash"></i> Delete</a>
                                                <form action="{{route('admin.contacts.destroy',$service->id)}}" method="POST" id="form-{{$service->id}}">
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
                                        <th>phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
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

@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$_GET['type']}}</h4>
{{--                        @if(!isset($_GET['parent_id']))--}}
{{--                            <a href="{{route('admin.services.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>--}}
{{--                        @endif--}}
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
                                        @if($_GET['type'] == 'not_activated')
                                            <th>type</th>
                                        @endif
                                        <th>Phone</th>
                                        <th>avg rating</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            @if($_GET['type'] == 'not_activated')
                                                <th>{{$user->getRoleNames()->first()}}</th>
                                            @endif
                                            <td>{{$user->phone}}</td>
                                            <td>{{($user->rates()->avg('rate'))?ceil($user->rates()->avg('rate')):'0'}}</td>
                                            <td>
                                                @if($_GET['type'] == 'not_activated')
                                                <a href="{{route('admin.users.activate',$user->id)}}" class="btn btn-primary"><i class="feather icon-check-square"></i></a>
                                                @endif
                                                    <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-info"><i class="feather icon-eye"></i></a>

                                                    <a onclick="fireDeleteEvent({{$user->id}})" type="button" class="btn btn-danger"><i class="feather icon-trash"></i></a>
                                                <form action="{{route('admin.users.destroy',$user->id)}}" method="POST" id="form-{{$user->id}}">
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
                                        @if($_GET['type'] == 'not_activated')
                                            <th>type</th>
                                        @endif
                                        <th>Phone</th>
                                        <th>avg rating</th>
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

@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{$service->name}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.services.update',$service->id)}}" method="POST" enctype="multipart/form-data">
                                {{method_field('PUT')}}
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        @foreach(config('translatable.locales') as $locale)
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Name {{$locale}}</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="name[{{$locale}}]" value="{{$service->translate($locale)->name}}" placeholder="name {{$locale}}">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>image</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <img class="img-fluid img-thumbnail img-lg" src="{{asset($service->image)}}">
                                                    <strong class="text-danger">if you do not want to change image leave it blank</strong>
                                                    <input type="file"  class="form-control" name="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

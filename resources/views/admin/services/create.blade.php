@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new service</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.services.store')}}" method="POST" enctype="multipart/form-data">
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
                                                    <input required type="text" class="form-control" name="name[{{$locale}}]" placeholder="name {{$locale}}">
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
                                                    <input type="file"  class="form-control" name="image" required>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="parent_id" value="{{(isset($_GET['parent_id']))?$_GET['parent_id']:0}}">
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

@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Setting</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.settings.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        @foreach($settings as $setting)
                                        @foreach(config('translatable.locales') as $locale)
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{$setting->display_name .' '.$locale}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        @if($setting->type == 'textarea')
                                                            <textarea class="form-control" rows="5" name="name[{{$setting->id}}][{{$locale}}]" required>{{$setting->translate($locale)->value}}</textarea>
                                                        @else
                                                            <input required type="{{$setting->type}}" value="{{$setting->translate($locale)->value}}" class="form-control" name="name[{{$setting->id}}][{{$locale}}]" placeholder="{{$setting->display_name .' '.$locale}}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endforeach
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

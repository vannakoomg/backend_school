@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }}
        </div>
        <div class="card-body">
            @can('school_class_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('admin.gallary.create') }}">
                            Add Gallary
                        </a>
                    </div>
                </div>
            @endcan
            @can('school_class_create')
                <div class="d-flex flex-wrap">
                    @foreach ($gallary as $gallarysss)
                        <div class="card bg-gray-400 mr-4 p-0" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $gallarysss->name }}</h5>
                                <h6 class="card-subtitle text-muted ">{{ $gallarysss->description }}</h6>
                                <div class="btn">
                                    <a class="btn btn-secondary"
                                        href="{{ route('admin.gallary.edit', $gallarysss->id) }}">Edit</a>
                                    <a class="btn btn-danger" style="">Delete</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endcan
        </div>
    </div>
@endsection

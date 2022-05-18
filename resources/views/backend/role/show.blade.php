@extends('layouts.backend.master')


@section('title')
    {{ $role->name }}
@endsection


@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ $role->name }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active"> {{ $role->name }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <a class="btn btn-primary mb-4" href="{{ route('roles.index') }}"> Back</a>
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-danger" style="color: red">{{ $v->name }},</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection


@section('js')

@endsection

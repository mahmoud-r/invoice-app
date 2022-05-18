@extends('layouts.backend.master')


@section('title')
    Role Management
@endsection


@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">عرض الصلاحيات</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">عرض الصلاحيات</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @can('role-create')
                        <a class="btn btn-success mb-4" href="{{ route('roles.create') }}"> اضافه صلاحيه جديدة</a>
                    @endcan
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>
                                        @can('role-edit')
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                                        @endcan
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('مسح', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                        {!! $roles->render() !!}


                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection


@section('js')

@endsection

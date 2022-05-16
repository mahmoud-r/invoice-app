@extends('layouts.backend.master')


@section('title')
    {{__('backend/Categories.Categories')}}
@endsection


@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{__('backend/Categories.Categories')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{__('backend/Categories.home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('backend/Categories.Categories')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection

@section('content')
    @include('backend.massage')
    <!-- row -->
    <!-- main body -->

    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#createcat">
                      {{trans('backend/Categories.add')}}
                    </button>
                    @include('backend.Categories.create')
                    <div class="table-responsive text-center">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" > {{trans('backend/Categories.name')}}</th>
                                <th scope="col"> {{trans('backend/Categories.note')}}</th>
                                <th scope="col" > {{trans('backend/Categories.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $categorie)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$categorie->name}}</td>
                                <td >{{$categorie->notes == true ? $categorie->notes :'لا توجد ملاحظات '}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" title="{{trans('backend/Categories.edite')}}" data-toggle="modal" data-target="#Editecategorie{{$categorie->id}}" >
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" title="{{trans('backend/Categories.delete')}}" data-toggle="modal" data-target="#deleteecategorie{{$categorie->id}}" >
                                        <i class="fa fa-trash"></i>                                    </button>
                                    </td>
                                @include('backend.Categories.edite')
                                @include('backend.Categories.delete')
                            </tr>
                            @empty
                                <td style="text-align: center" colspan="4">{{trans('backend/Categories.nodata')}}

                                </td>

                            @endforelse
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection


@section('js')

@endsection

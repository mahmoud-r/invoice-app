@extends('layouts.backend.master')


@section('title')
    {{__('backend/dashboard.dashboard')}}
@endsection


@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">    {{__('backend/dashboard.dashboard')}}  </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item active">{{__('backend/dashboard.dashboard')}} </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">{{__('backend/dashboard.dashboard')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                </ol>
            </div>
        </div>
    </div>
    <!-- widgets -->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{__('backend/dashboard.Products')}}</p>
                            <h4>{{$products}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> {{__('backend/dashboard.Total_Products')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{__('backend/dashboard.invoices')}}</p>
                            <h4>{{$invoices}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> {{__('backend/dashboard.sum_invoices')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{__('backend/dashboard.Total_invoices')}}</p>
                            <h4>${{$invoices_total}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-calendar mr-1" aria-hidden="true"></i>{{__('backend/dashboard.Total_invoices')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{__('backend/dashboard.users')}}</p>
                            <h4>{{$user}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-repeat mr-1" aria-hidden="true"></i> {{__('backend/dashboard.users')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Orders Status widgets-->


@endsection


@section('js')

@endsection

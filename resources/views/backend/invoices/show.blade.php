@extends('layouts.backend.master')


@section('title')
    {{$invoice->invoices_number}}
@endsection


@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{$invoice->invoices_number}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active"> {{$invoice->invoices_number}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <a class="btn btn-primary mb-4" href="{{ route('invoice.index') }}"> Back</a>

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="mb-20"><img class="logo-small mt-0"
                                                    src="{{ URL::asset('backend/assets/images/logo-dark.png') }}"
                                                    alt="logo"></div>
                            <ul class="addresss-info invoice-addresss list-unstyled">
                                <li>القاهره</li>
                                <li> <strong> البريد الالكتروني  :  </strong>  mahmoudramadan4413@gmail.com  </li>
                                <li><strong>الموبيل: </strong> <a href="tel:01146562057"> 01146562057 </a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6   mb-5">
                            <h4>تفاصيل الفاتوره</h4>
                            <div>
                                <p> رقم الفاتوره {{$invoice->invoices_number}}</p> <br>
                                <h4><small> اسم العميل :</small> {{$invoice->client_name}}</h4>
                            </div>
                            <ul class="addresss-info invoice-addresss list-unstyled">
                                </li>
                                <li><span><strong> التليفون : </strong> <a
                                            href="tel:{{$invoice->client_phone}}"> {{$invoice->client_phone}}</a></span></li>
                            </ul>
                            <span>  التاريخ :{{$invoice->invoices_date}}</span>
                            <br>
                        </div>


                    </div>

                    <div class="page-invoice-table table-responsive">
                        <table class="table table-hover text-right">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>القسم</th>
                                <th>المنتج</th>
                                <th>الكميه</th>
                                <th>السعر</th>
                                <th>الاجمالي</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice->items as $item)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->product->categorie->name}}</td>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->Quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6">
                                    <h6>
                                        {{$invoice->total}}
                                    </h6>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="">

                        <button type="button" class="btn btn-dark" onclick="javascript:window.print();">
                            <span><i class="fa fa-print"></i> طباعه</span>
                        </button>
                    </div>
                </div>

                <!--=================================
               wrapper -->


            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- row closed -->

@endsection


@section('js')

@endsection

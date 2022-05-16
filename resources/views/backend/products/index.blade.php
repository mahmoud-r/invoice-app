@extends('layouts.backend.master')


@section('title')
    blank
@endsection


@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Product</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
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
                    <a href="{{route('products.create')}}" type="button" class="btn btn-primary mb-4" >
                      اضافه منتج
                    </a>
                    <div class="table-responsive text-center">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" > الاسم</th>
                                <th scope="col"> القسم</th>
                                <th scope="col"> السعر</th>
                                <th scope="col" >ملاحظات</th>
                                <th scope="col" >تعديل & حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($Products as $Product)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$Product->name}}</td>
                                    <td>{{$Product->categorie->name}}</td>
                                    <td>{{$Product->price}}</td>
                                    <td >{{$Product->notes == true ? $Product->notes :'لا توجد ملاحظات '}}</td>
                                    <td>
                                        <a href="{{route('products.edit' ,$Product->id)}}">
                                        <button type="button" class="btn btn-success btn-sm" title="edite"  >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-pro_id="{{$Product->id}}" title="{{trans('backend/Categories.delete')}}" data-toggle="modal" data-target="#deleteeproduct" >
                                            <i class="fa fa-trash"></i>                                    </button>
                                    </td>
                                </tr>
                            @empty
                                <td style="text-align: center" colspan="6">لا يوجد فواتير

                                </td>

                            @endforelse

                            </tbody>
                            @include('backend.products.delete')

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection


@section('js')
<script>

    $('#deleteeproduct').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button triggered the modal
        var pro_id = button.data('pro_id')
        var modal = $(this)
        modal.find('.modal-body #pro_id').val(pro_id)
    })
</script>
@endsection

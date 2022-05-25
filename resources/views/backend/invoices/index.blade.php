@extends('layouts.backend.master')


@section('title')
    invoices
@endsection


@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> invoices</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">invoices</li>
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
                    @can('add-invoices')
                    <button type="button" class="btn btn-success btn-sm mb-4"
                            title="اضافه فاتوره" data-toggle="modal"
                            data-target="#creat_invoices">
                        اضافه فاتوره
                    </button>
                    @endcan
                    <div class="table-responsive text-center">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> رقم الفاتوره</th>
                                <th scope="col"> تاريخ الفاتوره</th>
                                <th scope="col"> اسم العميل</th>
                                <th scope="col"> رقم التليفون</th>
                                <th scope="col">الاجمالي</th>
                                <th scope="col">حاله الفاتوره</th>
                                <th scope="col">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($invoices as $invoice)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$invoice->invoices_number}}</td>
                                    <td>{{$invoice->invoices_date}}</td>
                                    <td>{{$invoice->client_name}}</td>
                                    <td>{{$invoice->client_phone}}</td>
                                    <td>{{$invoice->total}}</td>
                                    <td class="{{$invoice->status == 1 ? 'text-danger':'text-success'}}">{{$invoice->status == 1 ? 'غير مدفوعه':'تم الدفع'}}</td>
                                    <td>
                                        <a href="{{route('invoice.show' , $invoice->id)}}">
                                            <button type="button" class="btn btn-success btn-sm" title="edite">
                                                عرض
                                            </button>
                                        </a>
                                        @can('Payment-invoices')
                                        <button type="button" class="btn btn-success btn-sm"
                                                data-invoice_id="{{$invoice->id}}"
                                                data-status="{{$invoice->status}}"
                                                title="سداد" data-toggle="modal"
                                                data-target="#change_payment">
                                            سداد
                                        </button>
                                        @endcan
                                        @can('edit-invoices')
                                        <a href="{{route('invoice.edit' , $invoice->id)}}">
                                            <button type="button" class="btn btn-success btn-sm" title="edite">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        @endcan

                                        @can('delete-invoices')
                                        <button type="button" class="btn btn-danger btn-sm"
                                                data-pro_id="{{$invoice->id}}"
                                                title="{{trans('backend/Categories.delete')}}" data-toggle="modal"
                                                data-target="#deleteinvoice">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <td style="text-align: center" colspan="14">لا يوجد فواتير

                                </td>

                            @endforelse


                            </tbody>
                            @include('backend.invoices.delete')
                            @include('backend.invoices.change_payment')
                            @include('backend.invoices.create')

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

        $('#deleteinvoice').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button triggered the modal
            var pro_id = button.data('pro_id')
            var modal = $(this)
            modal.find('.modal-body #pro_id').val(pro_id)
        })
        $('#change_payment').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button triggered the modal
            var invoice_id = button.data('invoice_id')
            var status = button.data('status')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id)
            modal.find('.modal-body #status').val(status)
        })
    </script>
@endsection

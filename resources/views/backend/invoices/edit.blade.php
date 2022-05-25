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
                <h4 class="mb-0">{{$invoice->invoices_number}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">تعديل فاتوره</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection

@section('content')
    @include('backend.massage')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('invoice.update','test')}} " method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$invoice->id}}">
                        <div class="form-row mb-15">
                            <div class="col">
                                <label>رقم الفاتوره</label>
                                <input type="text" value="{{$invoice->invoices_number}}" name="invoices_number"
                                       class="form-control" readonly
                                       @error('invoices_number') is-invalid @enderror >
                                @error('invoices_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>تاريخ الفاتوره</label>
                                <input type="date" value="{{$invoice->invoices_date}}"
                                       class="form-control " name="invoices_date"
                                       @error('invoices_date') is-invalid @enderror >
                                @error('invoices_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-15">
                            <div class="col">
                                <label>اسم العميل</label>
                                <input type="text" value="{{$invoice->client_name}}" name="client_name"
                                       class="form-control"
                                       @error('client_name') is-invalid @enderror >
                                @error('client_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>رقم التليفون</label>
                                <input type="text" value="{{$invoice->client_phone}}"
                                       class="form-control " name="client_phone"
                                       @error('client_phone') is-invalid @enderror >
                                @error('client_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
                                    <th>حذف</th>

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

                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                    data-item_id="{{$item->id}}"
                                                    title="{{trans('backend/Categories.delete')}}" data-toggle="modal"
                                                    data-target="#deleteitem">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>

                                @endforeach
                                <tr>

                                    <td colspan="6">
                                        <h6>
                                            <input type="hidden" value="{{$invoice->items()->sum('total')}}" name="total" readonly>
                                            {{$invoice->items()->sum('total')}}
                                        </h6>
                                    </td>
                                    <td colspan="1">
                                        <button type="button" class="btn btn-success btn-sm"
                                                title="اضافه منتج" data-toggle="modal"
                                                data-target="#add_item">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>


                        <div class="form-group modal-footer">

                            <input type="submit" value="حفظ" class="btn btn-primary">
                        </div>

                    </form>
                    @include('backend.invoices.additem')
                    @include('backend.invoices.delete_item')

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection


@section('js')

    <script>
        $('#deleteitem').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button triggered the modal
            var item_id = button.data('item_id')
            var modal = $(this)
            modal.find('.modal-body #item_id').val(item_id)
        })
        $(document).ready(function () {
            $('select[name="categorie_id"]').on('change', function () {
                var categorie_id = $(this).val();
                if (categorie_id) {
                    $.ajax({
                        url: "{{URL::to('product')}}/" + categorie_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="product_id"]').empty();

                            $('input[name="price"]').val(0);
                            $('input[name="Quantity"]').val(0);
                            $('input[name="total"]').val(0);
                            console.log(data);
                            $('select[name="product_id"]').append('<option value="" disabled selected>المنتج</option>');
                            $.each(data, function (key, value) {
                                $('select[name="product_id"]').append('<option value=" ' + key + '"> ' + value + '</option>');

                            });
                        }
                    })
                } else {
                    console.log('ajax load did not work')
                }

            });


            $('select[name="product_id"]').on('change', function () {
                var product_id = $(this).val();
                if (product_id) {
                    $.ajax({
                        url: "{{URL::to('productprice')}}/" + product_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {

                            $('input[name="Quantity"]').val(0);
                            $('input[name="total"]').val(0);

                            $('input[name="price"]').val(data);

                        }
                    })
                } else {
                    console.log('ajax load did not work')
                }
            })


        });

        function finaltotal() {
            var Quantity = document.getElementById('Quantity').value;
            var price = parseFloat(document.getElementById('price').value);
            if(Quantity && price ){

                var final_total = Quantity * price;

                document.getElementById('total').value = final_total
            }

        }


    </script>
@endsection

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
                                <input type="text" value="{{$invoice->invoices_number}}" name="invoices_number" class="form-control" readonly
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
                        <div class="form-row">
                            <div class="col">
                                <label>القسم</label>
                                <select name="categorie_id" value="{{$invoice->categorie_id}}"
                                        class="form-control form-control-lg mb-15"
                                        @error('categorie_id') is-invalid @enderror>
                                    @foreach($categories as $categorie)
                                        <option
                                            {{$categorie->id ==$invoice->categorie_id ? 'selected' :''}} value="{{$categorie->id}}">{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>المنتج</label>
                                <select name="product_id" value="{{$invoice->product_id}}"
                                        class="form-control form-control-lg mb-15"
                                        @error('product_id') is-invalid @enderror>
                                    <option value="" disabled selected>المنتج</option>
                                    <option value="2">المنتج</option>
                                    @foreach($products as $product)
                                        <option {{$product->id ==$invoice->product_id ? 'selected' :''}} value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>السعر</label>
                                <input type="text" value="{{$invoice->price}}" id="price"
                                       class="form-control form-control-lg mb-15" value=""
                                       readonly
                                       name="price" @error('price') is-invalid @enderror >
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>خصم</label>
                                <input type="number" value="{{$invoice->disconunt}}"
                                       class="form-control form-control-lg mb-15" name="disconunt"
                                       id="disconunt" onkeyup="af_disconunt()"
                                       @error('disconunt') is-invalid @enderror >
                                @error('disconunt')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>السعر بعد الخصم</label>
                                <input type="number" value="{{$invoice->after_disconunt}}"
                                       class="form-control form-control-lg mb-15" readonly
                                       name="after_disconunt" id="after_disconunt"
                                       @error('after_disconunt') is-invalid @enderror >
                                @error('after_disconunt')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="col">
                                <label>نسبه الضريبه</label>
                                <select name="text_rate" value="{{$invoice->text_rate}}"
                                        class="form-control form-control-lg mb-15" id="text_rate"
                                        onchange="text()"
                                        @error('text_rate') is-invalid @enderror>
                                    <option {{$invoice->text_rate ==0 ? 'selected' :''}} value="0">بدون ضريبه</option>
                                    <option {{$invoice->text_rate ==14 ? 'selected' :''}} value="14">14%</option>
                                    <option {{$invoice->text_rate ==20 ? 'selected' :''}} value="20">20%</option>
                                    <option {{$invoice->text_rate ==25 ? 'selected' :''}} value="25">25%</option>
                                </select>
                                @error('text_rate')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>قيمه الضريبه</label>
                                <input type="number" value="{{$invoice->text_value}}"
                                       class="form-control form-control-lg mb-15" readonly id="text_value"
                                       name="text_value" @error('text_value') is-invalid @enderror >
                                @error('text_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>الاجمالي</label>
                                <input type="number" value="{{$invoice->total}}"
                                       class="form-control form-control-lg mb-15" readonly name="total"
                                       id="total" readonly
                                       @error('total') is-invalid @enderror >
                                @error('total')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group mt-3">
                            <label>ملاحظات</label>
                            <textarea class="form-control" name='notes' @error('notes') is-invalid
                                      @enderror id="exampleFormControlTextarea1" rows="3">{{$invoice->notes}}</textarea>
                            @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group modal-footer">
                            <input type="submit" value="حفظ" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection


@section('js')

    <script>
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
                            def();
                            $('select[name="product_id"]').append('<option value="" disabled selected>المنتج</option>');
                            $.each(data, function (key, value) {
                                $('select[name="product_id"]').append('<option value=" ' + key + '"> ' + value + '</option>');

                            });
                        }
                    })
                } else {
                    console.log('ajax load did not work')
                }
                $('select[name="product_id"]').on('change', function () {
                    var product_id = $(this).val();
                    if (product_id) {
                        $.ajax({
                            url: "{{URL::to('productprice')}}/" + product_id,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                def();
                                $('input[name="price"]').val(data);
                                document.getElementById('total').value = data
                            }

                        })

                    } else {
                        console.log('ajax load did not work')
                    }
                })
            });

        });

        function af_disconunt() {
            var price = parseFloat(document.getElementById('price').value);
            var disconunt = parseFloat(document.getElementById('disconunt').value);
            var total_af = parseFloat(price - disconunt);
            document.getElementById('after_disconunt').value = total_af;
            total();
        }

        function text() {
            var price = parseFloat(document.getElementById('price').value);
            var after_disconunt = parseFloat(document.getElementById('after_disconunt').value);
            var text_rate = parseFloat(document.getElementById('text_rate').value);

            if (after_disconunt == '') {
                var text_value = parseFloat(price * text_rate / 100);
            } else {
                var text_value = parseFloat(after_disconunt * text_rate / 100);
            }

            document.getElementById('text_value').value = text_value
            total();
        }

        function total() {
            var after_disconunt = parseFloat(document.getElementById('after_disconunt').value);
            var text_value = parseFloat(document.getElementById('text_value').value);
            var final_total = parseFloat(text_value + after_disconunt);
            document.getElementById('total').value = final_total
        }

        function def() {
            $('input[name="after_disconunt"]').val(0);
            $('input[name="disconunt"]').val(0);
            $('input[name="text_value"]').val(0);
            total();
        }
    </script>
@endsection

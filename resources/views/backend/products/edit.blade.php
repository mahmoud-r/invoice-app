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
                <h4 class="mb-0"> اضافه منتج</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">اضافه منتج</li>
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
                    <form action="{{route('products.update','test')}} " method="post" autocomplete="off">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="form-row mb-15">
                            <div class="col">
                                <label >اسم المنتج باللغه الانجليزيه</label>
                                <input type ="text" class="form-control" value="{{$product->getTranslation('name','en')}}" name="name" @error('name') is-invalid @enderror >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label >اسم المنتج باللغه العربيه</label>
                                <input type="text" class="form-control " name="name_ar" value="{{$product->getTranslation('name','ar')}}" @error('name-ar') is-invalid @enderror >
                                @error('name_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="col">
                                    <label >القسم</label>
                                    <select name="categorie_id" class="form-control form-control-lg mb-15" @error('categorie_id') is-invalid @enderror>
                                        <option value="" disabled >القسم</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}} "{{$categorie->id == $product->categorie_id ? 'selected' : '' }} >{{$categorie->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                           <div class="col">
                               <label >السعر</label>
                               <input type="number" value="{{$product->price}}" class="form-control form-control-lg mb-15" name="price" @error('price') is-invalid @enderror >
                           </div>
                        </div>
                        <div class="form-group mt-3">
                            <label >ملاحظات</label>
                            <textarea  class="form-control" name='notes'  @error('notes') is-invalid @enderror id="exampleFormControlTextarea1" rows="3" >{{$product->notes}}</textarea>


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

@endsection

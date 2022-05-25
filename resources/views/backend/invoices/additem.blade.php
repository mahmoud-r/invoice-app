
<!-- Modal -->
<div class="modal fade" id="add_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافه منتج</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{route('add_item')}} " method="post" autocomplete="off">
                        @csrf

                            <input type="hidden" value="{{$invoice->id}}" name="invoice_id">
                            <div class="col">
                                <label>القسم</label>
                                <select name="categorie_id" class="form-control form-control-lg mb-15 p-10"
                                        @error('categorie_id') is-invalid @enderror>
                                    <option value="" disabled selected>القسم</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                                @error('categorie_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>المنتج</label>
                                <select name="product_id" class="form-control form-control-lg mb-15 p-10"
                                        @error('product_id') is-invalid @enderror>
                                    <option value="" disabled selected>المنتج</option>
                                </select>
                                @error('product_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="col">
                                <label>السعر</label>
                                <input type="text" id="price" class="form-control form-control-lg mb-15 p-10" value=""
                                       name="price" onkeyup="finaltotal()" @error('price') is-invalid @enderror >
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>الكميه</label>
                                <input type="number"  id="Quantity" class="form-control form-control-lg mb-15" onkeyup="finaltotal()"

                                       name="Quantity" @error('Quantity') is-invalid @enderror >
                                @error('Quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="col">
                                <label>الاجمالي</label>
                                <input type="number" class="form-control form-control-lg mb-15 p-10"  name="total"
                                       id="total"
                                       @error('total') is-invalid @enderror >
                                @error('total')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">انهاء</button>
                            <input type="submit" value="حفظ" class="btn btn-primary">                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="creat_invoices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافه فاتوره</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{route('invoice.store')}} " method="post" autocomplete="off">
                        @csrf
                        <div class="form-row mb-15">
                            <div class="col">
                                <label>اسم العميل</label>
                                <input type="text"
                                       class="form-control " name="client_name"
                                       @error('client_name') is-invalid @enderror >
                                @error('client_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-15">
                            <div class="col">
                                <label>رقم التليفون</label>
                                <input type="text"
                                       class="form-control " name="client_phone"
                                       @error('client_phone') is-invalid @enderror >
                                @error('client_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mb-15">

                            <div class="col">
                                <input type="hidden" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                       class="form-control " name="invoices_date"
                                       @error('invoices_date') is-invalid @enderror >
                                @error('invoices_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">انهاء</button>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

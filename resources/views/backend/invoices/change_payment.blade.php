
<!-- Modal -->
<div class="modal fade" id="change_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حاله الدفع</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{route('change_payment','test')}} " method="post" >
                        @csrf
                        <input type="hidden" name="invoice_id"  id="invoice_id" value="">
                            <div class="col">
                                <label>حاله الفاتوره</label>
                                <select class="form-control form-control-lg mb-15 p-10"  id="status" name="status"  @error('status') is-invalid @enderror>>
                                    <option value=" "  selected disabled>حاله الدفع </option>
                                    <option value="1">غير مدفوع </option>
                                    <option value="2"> مدفوع</option>
                                </select>
                                <label>تاريخ الدفع</label>
                                <input type="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                       class="form-control " name="payment_date"
                                       @error('payment_date') is-invalid @enderror >
                                @error('payment_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group modal-footer mt-3">
                                <input type="submit" value="حفظ" class="btn btn-danger">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                            </div>
                        </d>
                    </form>
                </div>
            </div>

            {{--                    <div class="modal-footer">--}}
            {{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
            {{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
            {{--                    </div>--}}
        </div>
    </div>
</div>

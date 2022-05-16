
<!-- Modal -->
<div class="modal fade" id="deleteinvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('backend/Categories.add')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{route('invoice.destroy','test')}} " method="post" >
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="pro_id"  id="pro_id" value="">
                        <div class="">
                            <div class="col-lg-10">
                                <label style="color: darkred">هل انت متاكد من عمليه الحذف ؟</label>
                            </div>

                        <div class="form-group modal-footer">
                            <input type="submit" value="delete" class="btn btn-danger">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                        </div>
                        </div>
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


<!-- Modal -->
<div class="modal fade" id="deleteecategorie{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{route('categories.destroy' ,$categorie->id)}} " method="post" autocomplete="off">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$categorie->id}}">
                        <div class="">
                            <div class="col-lg-10">
                                <label style="color: darkred">هل انت متاكد من عمليه الحذف ؟</label>
                                <input type ="text" readonly class="form-control-plaintext" value="{{$categorie->getTranslation('name' ,'en')}}" name="name" >
                            </div>

                        <div class="form-group modal-footer">
                            <input type="submit" value="{{trans('backend/Categories.delete')}}" class="btn btn-danger   ">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('backend/Categories.close')}}</button>
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

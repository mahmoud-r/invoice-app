
<!-- Modal -->
<div class="modal fade" id="Editecategorie{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{route('categories.update' ,'test')}} " method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id"  value="{{$categorie->id}}">
                        <div class="form-row">
                            <div class="col">
                                <label >{{trans('backend/Categories.nameen')}}</label>
                                <input type ="text" class="form-control" @error('name') is-invalid @enderror value="{{$categorie->getTranslation('name' ,'en')}}" name="name" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label >{{trans('backend/Categories.namear')}}</label>
                                <input type="text" class="form-control" @error('name_ar') is-invalid @enderror value="{{$categorie->getTranslation('name' ,'ar')}}" name="name_ar" >
                                @error('name_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label >{{trans('backend/Categories.note')}}</label>
                            <textarea  class="form-control" name='notes'  @error('notes') is-invalid @enderror id="exampleFormControlTextarea1" rows="3" >{{$categorie->notes}}</textarea>
                            @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group modal-footer">
                            <input type="submit" value="{{trans('backend/Categories.save')}}" class="btn btn-primary">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('backend/Categories.close')}}</button>
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

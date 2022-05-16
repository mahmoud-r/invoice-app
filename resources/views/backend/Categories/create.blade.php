
        <!-- Modal -->
        <div class="modal fade" id="createcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="{{route('categories.store')}} " method="post" autocomplete="off">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label >{{trans('backend/Categories.nameen')}}</label>
                                        <input type ="text" class="form-control" name="name" @error('name') is-invalid @enderror >
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label >{{trans('backend/Categories.namear')}}</label>
                                        <input type="text" class="form-control" name="name_ar" @error('name-ar') is-invalid @enderror >
                                        @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label >{{trans('backend/Categories.note')}}</label>
                                    <textarea  class="form-control" name='notes'  @error('notes') is-invalid @enderror id="exampleFormControlTextarea1" rows="3" ></textarea>
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

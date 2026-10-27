<form action="{{ route('slider.destroy', $slider->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('delete')
    <div class="modal fade" id="ModalDelete{{$slider->id}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" name="language_id" value="{{ $slider -> language_id }}">
                </div>
                <div class="modal-body"><b>Are you sure to delete it? </b> <br /><br />
                    <button style="margin-right:15px;" type="button" class="btn gray btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
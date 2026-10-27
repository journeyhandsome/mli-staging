<form action="{{ route('testimonial.show', $item->id) }}" >
    <div class="modal fade" id="ModalView{{$item->id}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12" style="padding-left:25px; padding-right:25px;">
                        <img src="{{ asset('images/testimonial/'.$item->image)}}" width="80%" alt="Banner Image"><br><br>
                        <h5 align="left"><b class="testimonial_title">{{ $item->english_translated ? $item->english_translated->title : 'No English yet' }}</b></h5>
                        <p style="text-align:justify;" class="testimonial_text">{{ $item->english_translated ? $item->english_translated->text : 'No English yet' }}</p>
                    </div>
                    <div class="form-group row col-md-12" style="margin-top: 50px; padding-left:25px;">
                        <label class="col-sm-2 col-form-label">Language</label>
                        <div class="col-sm-10">
                            <select name="modal_language_id" id="modal_language_id_{{ $item->id }}" class="form-control modal_language_id">
                                <option value=""></option>
                                @foreach($item->languages_list as $language)
                                    @if($language -> name == "English")
                                        <option value="{{ $language -> id }}" data-translated_testimonial="{{ $language -> translated_testimonial }}" selected>{{ $language -> name }}</option>
                                    @else
                                        <option value="{{ $language -> id }}" data-translated_testimonial="{{ $language -> translated_testimonial }}">{{ $language -> name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
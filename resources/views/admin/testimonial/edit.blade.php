@extends('layouts.default')
@section('content')
<h1>Edit Testimonial</h1>
<hr/>
<form action="{{ route('testimonial.update', $id) }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="testimonial_id" id="testimonial_id" value="{{ $id }}">
    @csrf
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="nationality_id">Nationality</label>
		<div class="col-sm-8">
            <select class="form-control" name="edit_nationality_id" id="edit_nationality_id">
                @foreach($nationality_list as $nationality)
                    @if($nationality -> id == $testimonial -> nationality_id)
                        <option value="{{{ $nationality->id }}}" selected>{{{ $nationality->name }}}</option>
                    @else
                        <option value="{{{ $nationality->id }}}">{{{ $nationality->name }}}</option>
                    @endif
                    
                @endforeach
            </select>
		</div>
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="campus_id">Campus</label>
        <div class="col-sm-8">
            <select class="form-control" name="edit_campus_id" id="edit_campus_id">
                @foreach($campus_list as $campus)
                    @if($campus -> id == $testimonial -> campus_id)
                        <option value="{{{ $campus->id }}}" selected>{{{ $campus->name }}}</option>
                    @else
                        <option value="{{{ $campus->id }}}">{{{ $campus->name }}}</option>
                    @endif
                @endforeach
            </select>
        </div>
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="image">Image</label>
        <div class="col-sm-8">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/testimonial/'.$testimonial -> image) }}" alt="Testimonial Image">
            </div>
            <div class="form-group">
                <input type="file" name="image"/>
            </div>
        </div>
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="language_id">Language</label>
        <div class="col-sm-8">
            <select class="form-control" name="edit_language_id" id="edit_language_id">
                <option value=""></option>
                @foreach($language_list as $language)
                    <option value="{{ $language -> id }}" data-testimonial="{{ $language -> translated }}">{{ $language -> name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1">
            <button class="btn btn-danger" type="button" id="removeTranslation">Remove</button>
        </div> 
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="title">Title</label>
        <div class="col-sm-8">
            <input class="form-control translation" type="text" name="title" id="title" disabled/>
        </div>
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="text">Text</label>
        <div class="col-sm-8">
            <textarea class="form-control translation" id="text" name="text" rows="10" disabled></textarea>
        </div>
	</div><br>
    <div class="form-group row col-md-7">
        <label class="col-sm-3 col-form-label" ></label>
        <div class="col-sm-8">
            <a href="{{ route('testimonial.index') }}" class="btn btn-secondary px-5"> Back</a>
            <button style="margin-left:15px;" class="btn btn-success px-5" type="submit">Submit</button>
        </div>
    </div>
</form>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#removeTranslation').hide();
    });


    $('#edit_language_id').change(function() {
        if ($(this).val() != 0) {
            $('#title').prop('disabled', false);
            $('#text').prop('disabled', false);
            

            getTestimonial($('#testimonial_id').val(), $(this).val());
            
        }
        else {
            $('#title').prop('disabled', true);
            $('#text').prop('disabled', true);
        }
    });

    $('#removeTranslation').click(function() {
        $.ajax({
            url: "{{ URL::to('admin/testimonial/remove_translation') }}",
            type: "POST",
            data: {
                'testimonial_id': $('#testimonial_id').val(),
                'language_id': $('#edit_language_id').val(),
                '_token': '{{ csrf_token() }}'
            },
            success: function(data) {
                $('#title').val('');
                $('#text').val('');
                $('#removeTranslation').hide();
            }
        })
    });

    $('.translation').change(function() {
        var id = $(this).attr('id');

        $.ajax({
        url: "{{ URL::to('admin/testimonial/save_translation') }}",
        type: "POST",
        data: {
            'testimonial_id': $('#testimonial_id').val(),
            'language_id': $('#edit_language_id').val(),
            'type': id,
            'value': $(this).val(),
            '_token': '{{ csrf_token() }}'
        },
        success: function(data) {
            console.log(data)
        }
        })
    });


    function getTestimonial(id, language) {
        $.ajax({
            url: "{{ URL::to('admin/testimonial/get_testimonial') }}",  
            type: "GET",
            data: {
                'testimonial_id': id,
                'language': language,
            },
            success: function(data) {
                if (data.title != undefined) {
                    $('#title').val(data.title);
                    $('#text').val(data.text);
                    $('#removeTranslation').show();
                }
                else {
                    $('#title').val('');
                    $('#text').val('');
                    $('#removeTranslation').hide();
                }
                
            }
        })
    }
</script>
@endsection
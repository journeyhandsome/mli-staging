@extends('layouts.default')
@section('content')
<h1>Testimonial Create</h1>
<hr/>
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
<form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
	<input type="hidden" name="testimonial_id" id="testimonial_id" value="{{ $new_testimonial -> id }}">
    @csrf
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="nationality_id">Nationality</label>
		<div class="col-sm-9">
			<select class="form-control" name="nationality_id" id="nationality_id">
				<option name="" value="" selected></option>
				@foreach($nationality_list as $nationality)
					<option name="nationality_id" value="{{{ $nationality->id }}}" data-campus_list="{{ $nationality -> campus_list }}">{{{ $nationality->name }}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="campus_id">Campus</label>
		<div class="col-sm-9">
			<select class="form-control" name="campus_id" id="campus_id">
			</select>
		</div>
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="image">Image</label>
		<div class="col-sm-9">
			<input type="file" name="image"/>
		</div>
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="language_id">Language</label>
		<div class="col-sm-9">
				<select class="form-control" name="language_id" id="language_id"></select>
		</div>
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="title">Title</label>
		<div class="col-sm-9">
			<input class="form-control translation" type="text" name="title" id="title" disabled/>
		</div>
	</div>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" for="text">Text</label>
		<div class="col-sm-9">
			<textarea class="form-control translation" id="text" name="text" rows="10" disabled></textarea>
		</div>
	</div><br>
	<div class="form-group row col-md-7">
		<label class="col-sm-3 col-form-label" ></label>
		<div class="col-sm-9">
			<a href="{{ route('testimonial.index') }}" class="btn btn-secondary px-5"> Back</a>
			<button  style="margin-left:15px;" class="btn btn-success px-5" type="submit">Submit</button>
		</div>
	</div>
</form>
@endsection

@section('scripts')
<script type="text/javascript">
  $('#saveTestimonial').click(function() {
    $.ajax({
      url: "{{ URL::to('admin/testimonial/create') }}",
      type: "POST",
      data: {
        'nationality_id': $('#nationality_id').val(),
        'campus_id': $('#campus_id').val(),
        // 'image': $('#image').val(),
        '_token': "{{ csrf_token() }}"
      },
      success: function(data) {
        return(data);
      }
    })
  });
  $('#nationality_id').change(function() {
    nationalityChange();
  });

  $('#campus_id').change(function() {
    campusChange();
  });

  $('#language_id').change(function() {
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

  $('.translation').change(function() {
    var id = $(this).attr('id');

    $.ajax({
      url: "{{ URL::to('admin/testimonial/save_translation') }}",
      type: "POST",
      data: {
        'testimonial_id': $('#testimonial_id').val(),
        'language_id': $('#language_id').val(),
        'type': id,
        'value': $(this).val(),
        '_token': '{{ csrf_token() }}'
      },
      success: function(data) {
        console.log(data)
      }
    })
  });
  function nationalityChange() {
    var campus_list = $('#nationality_id option:selected').data('campus_list');

    $('#campus_id').empty();

    $.map(campus_list, function(campus) {
      $('<option>').val(campus.id).text(campus.name).attr('data-language_list', JSON.stringify(campus.language_list)).appendTo('#campus_id');
    });

    $('#campus_id').prepend('<option selected></option>');
  }

  function campusChange() {
    var language_list = $('#campus_id option:selected').data('language_list');

    $('#language_id').empty();

    $.map(language_list, function(language) {
      $('<option>').val(language.id).text(language.name).attr('data-language_list', JSON.stringify(language.language_list)).appendTo('#language_id');
    });

    $('#language_id').prepend('<option selected></option>');
  }

  function getTestimonial(id, language) {
    $.ajax({
      url: "{{ URL::to('admin/testimonial/get_testimonial') }}",  
      type: "GET",
      data: {
        'testimonial_id': id,
        'language': language,
      },
      success: function(data) {
          $('#title').val(data.title);
          $('#text').val(data.text);
      }
    })
  }
</script>
@endsection


@extends('layouts.default')
@section('content')
<h1>Slider Create</h1>
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
<form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
    @csrf
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="language_id">Language</label>
			<div class="col-md-6">
				<select class="form-control" name="language_id" id="language_id">
					<option name="" value="" selected></option>
					@foreach($language_list as $language)
						<option name="language_id" style="background-image:url({{ asset('images/lang/'.$language->image)}})" value="{{{ $language->id }}}" data-slider_list="{{ $language -> slider_list }}">{{{ $language->name }}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label">Image</label>
			<div class="col-md-6">
				<input type="file" name="image"/>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="order">Order</label>
			<div class="col-md-6">
				<select class="form-control" name="order" id="order"></select>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="link">Link</label>
			<div class="col-md-6">
				<input class="form-control" type="text" name="link" value="{{ old('link') }}"/>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-8">
			<a href="{{ route('slider.index') }}" class="btn btn-secondary px-5"> Back</a>
			<button style="margin-left:10px;" class="btn btn-success px-5" type="submit">Submit</button>
		</div>
	</div>
</form>
@endsection
@section('scripts')
<script>
	$('#language_id').change(function() {
		languageChange();
	});
	function languageChange() {
		var sliderlist = $('#language_id option:selected').data('slider_list');		
		$('#order').empty();
		if (sliderlist.length > 0) {
			var order = sliderlist.length + 1;
			$.map(sliderlist, function(slider) {
				$('#order').append('<option value="'+ slider.order +'">'+slider.order+'</option>');
			});
			$('#order').append('<option value="'+ order +'" selected>'+order+'</option>');
		}
		else {
			$('#order').append('<option value="1">1</option>');
		}
	}
</script>
@endsection
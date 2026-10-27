@extends('layouts.default')
@section('content')
<h1>Slider Update</h1>
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
<form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="language_id">Language</label>
			<div class="col-md-6">
				<select class="form-control" name="language_id" id="language_id" disabled>
					<option name="" value="" selected></option>
					@foreach($language_list as $language)
						@if($language->id == $slider->language_id)
							<option name="language_id" value="{{{ $language->id }}}" selected>{{{ $language->name }}}</option>
						@else
							<option name="language_id" value="{{{ $language->id }}}">{{{ $language->name }}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="image">Image</label>
			<div class="col-md-6">
				<img src="{{ asset('images/slider/'.$slider->path)}}" width="160px" height="60px"><br><br>
				<input type="file" name="image">
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="order">Order</label>
			<div class="col-md-6">
				<input type="number" name="order" class="form-control" value="{{ $slider->order }}" disabled/>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="link">Link</label>
			<div class="col-md-6">
				<input type="text" name="link" class="form-control" value="{{ $slider->link }}"/>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-8">
			<a href="{{ route('slider.index') }}" class="btn btn-secondary float-end px-5"> Back</a>
			<button style="margin-left:10px;" class="btn btn-success float-end px-5" type="submit">Submit</button>
		</div>
	</div>
</form>
@endsection
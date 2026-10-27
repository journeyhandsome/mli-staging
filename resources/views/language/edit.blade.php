@extends('layouts.default')
@section('content')
<h1>Language Update</h1>
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
<form action="{{ route('language.update', $language->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put') 
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="name">Language</label>
			<div class="col-md-6">
				<input type="text" name="name" class="form-control" value="{{ $language->name }}"/>
			</div>
		</div>
	</div>  
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="image">Image</label>
			<div class="col-md-6">
				<img src="{{ asset('images/lang/'.$language->image)}}" width="25px" height="25px"><br><br>
				<input type="file" name="image">
			</div>
		</div>
	</div>  
	<a href="{{ route('language.index') }}" style="margin-left:12px;" class="btn btn-secondary float-end px-5"> Back</a>
    <button style="margin-left:10px;" class="btn btn-success float-end px-5" type="submit">Submit</button>
</form>
@endsection
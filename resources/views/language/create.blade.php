@extends('layouts.default')
@section('content')
<h1>Language Create</h1>
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
<form action="{{ route('language.store') }}" method="post" enctype="multipart/form-data">
    @csrf
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="name">Name</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="name"/>
				</div>
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
	<div class="col-md-12">
		<div class="col-md-8">
			<a href="{{ route('language.index') }}" class="btn btn-secondary px-5"> Back</a>
			<button style="margin-left:10px;" class="btn btn-success px-5" type="submit">Submit</button>
		</div>
	</div>
</form>
@endsection
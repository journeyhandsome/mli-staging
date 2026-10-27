@extends('layouts.default')
@section('content')

<div class="col-md-12">
    <h2>
        <div class="col-md-7">
            Upload File &nbsp;&nbsp;&nbsp;&nbsp; 
            @if (session('success'))
                <div class="alert alert-success float-right" style="margin-top:4px;">
                    {{ session('success') }}
                </div>
            @endif 
        </div>  
    </h2>
</div>
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
<form action="{{ route('tf_hollywood.store') }}" method="post" enctype="multipart/form-data">
    @csrf
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label">Category</label>
			<div class="col-md-6">
				<select class="form-control" name="category" id="category">
					<option value="Transfer Form- Hollywood campus">Transfer Form- Hollywood campus</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label">Name</label>
			<div class="col-md-6">
				<input class="form-control" type="text" name="name" value="{{ old('name') }}"/>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label">Choose File</label>
			<div class="col-md-6">
				<input type="file" name="file"/>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="col-sm-8">
			<a href="{{ route('tf_hollywood.index') }}" class="btn btn-secondary px-5"> Back</a>
			<button style="margin-left:10px;" class="btn btn-success px-5" type="submit">Submit</button>
		</div>
	</div>
</form>
@endsection

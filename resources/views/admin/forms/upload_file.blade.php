@extends('layouts.default')
@section('content')

<div class="col-md-12">
    <h2>
        <div class="col-md-7">
            Upload Files &nbsp;&nbsp;&nbsp;&nbsp; 
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
<form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
    @csrf
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label">Category</label>
			<div class="col-md-6">
				<select class="form-control" name="category" id="category">
					<option name="" value="" selected></option>
					<option value="Announcement Pdf Files">Announcement Pdf Files</option>
					<option value="Pre-enrollment Agreement">Pre-enrollment Agreement</option>
					<option value="Application and Enrollment Agreement">Application and Enrollment Agreement</option>
					<option value="Student Catalog">Student Catalog</option>
					<option value="Performance Fact Sheet">Performance Fact Sheet</option>
					<option value="BPPE Annual Report">BPPE Annual Report</option>
					<option value="Transfer Form- Westwood campus">Transfer Form- Westwood campus</option>
					<option value="Transfer Form- Hollywood campus">Transfer Form- Hollywood campus</option>
					<option value="Survival Guide">Survival Guide</option>
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
			<a href="{{ route('files.create') }}" class="btn btn-secondary px-5"> Back</a>
			<button style="margin-left:10px;" class="btn btn-success px-5" type="submit">Submit</button>
		</div>
	</div>
</form>
@endsection

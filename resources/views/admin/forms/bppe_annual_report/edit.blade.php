@extends('layouts.default')
@section('content')<div class="col-md-12">
    <h2>
        <div class="col-md-7">
		Update Uploaded File &nbsp;&nbsp; 
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
<form action="{{ route('bppe_annual_report.update', $files->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="name">Category</label>
			<div class="col-md-6">
				<select class="form-control" name="category" id="category">
					<option value="BPPE Annual Report" {{($files->category === 'BPPE Annual Report') ? 'Selected' : ''}}>BPPE Annual Report</option>                  
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="name">Name</label>
			<div class="col-md-6">
                <input type="text" name="name" class="form-control" value="{{ $files->name }}"/>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="file">File Link</label>
			<div class="col-md-6">
                <input type="text" name="file" class="form-control" value="/../files/bppe_annual_report/{{ $files->file }}" disabled/> <br />
				<input type="file" name="file">
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="col-sm-8">
			<a href="{{ route('bppe_annual_report.index') }}" class="btn btn-secondary float-end px-5"> Back</a>
			<button style="margin-left:10px;" class="btn btn-success float-end px-5" type="submit">Submit</button>
		</div>
	</div>
</form>
@endsection

@extends('layouts.default')
@section('content')
<h1>Banner Create</h1>
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
<form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
    @csrf
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="language_id">Language</label>
			<div class="col-md-6">
				<select class="form-control" name="language_id" id="language_id">
					<option name="" value="" selected></option>
					@foreach($language_list as $language)
	        			@if(count($language -> banner_list) != 1)
						<option name="language_id" value="{{{ $language->id }}}" data-banner="{{ $language -> banner }}">{{{ $language->name }}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label">Small Image (PC & Mobile)</label>
			<div class="col-md-6">
				<input type="file" name="image"/>
			</div>
		</div>
	</div>	  
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label">Large Image (PC)</label>
			<div class="col-md-6">
				<input type="file" name="image_large"/>
			</div>
		</div>
	</div>	
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label">Large Image (Mobile)</label>
			<div class="col-md-6">
				<input type="file" name="image_small"/>
			</div>
		</div>
	</div>	
	   
	<div id="bannerAttr" class="col-md-6">
		<fieldset>
			<table class="table table-bordered table-striped" id="bannerAttr_table">
				<th>Button Name</th>
				<th>Button URL</th>
				<th>Coordinates</th>
				<th>Color</th>
				<th>Action</th>
				<tbody id="bannerAttr_container">
					<tr>
						<td>
							<input class="form-control" type="text" name="name[]" id="name" value="" />
						</td>
						<td>
							<input class="form-control" type="text" name="url[]" id="url" value="" />
						</td>
						<td>
							<input class="form-control" type="text" name="coordinates[]" id="coordinates" value="" />
						</td>
						<td>
							<input class="form-control" type="text" name="color[]" id="color" value="" />
						</td>
						<td>
							<button id="remove_bannerAttr_row" onclick="deleteRow(this);" type="button" class="btn btn-sm btn-danger"> Remove</button>
						</td>
					</tr>
				</tbody>				
			</table>
			<div class="float-right">
				<button id="add_bannerAttr_row" type="button" class="btn btn-sm btn-primary">
					<span class="glyphicon glyphicon-plus"></span> Add Row
				</button>
			</div>
		</fieldset>
	</div>

	<div class="col-sm-12">
		<div class="col-sm-8">
			<a href="{{ route('banner.index') }}" class="btn btn-secondary px-5"> Back</a>
			<button style="margin-left:10px;" class="btn btn-success px-5" type="submit">Submit</button>
		</div>
	</div>
</form>
@endsection
@section('scripts')
<script>
$("#add_bannerAttr_row").click(function(){
      $("#bannerAttr_container").append('<tr>'
			            +'<td><input class="form-control" type="text" name="name[]" id="name" value="" /></td>'
						+'<td><input class="form-control" type="text" name="url[]" id="url" value="" /></td>'
						+'<td><input class="form-control" type="text" name="coordinates[]" id="coordinates" value="" /></td>'
						+'<td><input class="form-control" type="text" name="color[]" id="color" value="" /></td>'
						+'<td><button id="remove_bannerAttr_row" onclick="deleteRow(this);" type="button" class="btn btn-sm btn-danger"> Remove</button></td>'
						+'</tr>');
    });
	
function deleteRow(obj) {
		$(obj).parent().parent().remove();
	}
	
</script>
@endsection
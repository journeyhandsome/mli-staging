@extends('layouts.default')
@section('content')
<h1>Banner Update</h1>
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
<form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="language_id">Language</label>
			<div class="col-md-6">
				<select class="form-control" name="language_id" id="language_id" disabled>
					<option name="" value="" selected></option>
					@foreach($language_list as $language)
						@if($language->id == $banner->language_id)
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
			<label class="col-md-3 control-label" for="image">Small Image (PC & Mobile)</label>
			<div class="col-md-6">
				<img src="{{ asset('images/banner/'.$banner->path)}}" width="180px" height="50px"><br><br>
				<input type="file" name="image">
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="image_large">Large Image (PC)</label>
			<div class="col-md-6">
				<img src="{{ asset('images/banner/'.$banner->image_large)}}" width="100%"><br><br>
				<input type="file" name="image_large">
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="image_small">Large Image (Mobile)</label>
			<div class="col-md-6">
				<img src="{{ asset('images/banner/'.$banner->image_small)}}" width="100%"><br><br>
				<input type="file" name="image_small">
			</div>
		</div>
	</div>


	<div class="col-md-12">
		<div id="bannerAttr" class="col-md-6">
			<fieldset>
				<table class="table table-bordered table-striped" id="bannerAttr_table">
					<th>Button Name</th>
					<th>Button URL</th>
					<th>Coordinates</th>
					<th>Color</th>
					<th>Action</th>
					<tbody id="bannerAttr_container">
					@if($banner->banner_attr != null)
						@foreach(json_decode($banner->banner_attr) as $banner)
							<tr id="btnBanner">
								<td>
									<input class="form-control" type="text" name="name[]" id="name" value="{{$banner->name}}" />
								</td>
								<td>
									<input class="form-control" type="text" name="url[]" id="name" value="{{$banner->url}}" />
								</td>
								<td>
									<input class="form-control" type="text" name="coordinates[]" id="name" value="{{$banner->coordinates}}" />
								</td>
								<td>
									<input class="form-control" type="text" name="color[]" id="name" value="{{$banner->color}}" />
								</td>
								<td>
									<button id="remove_bannerAttr_row" onclick="deleteRow(this);" type="button" class="btn btn-sm btn-danger"> Remove</button>
								</td>
							</tr>
						@endforeach
					@else
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
					@endif
					</tbody>				
				</table>
				<div class="float-right">
					<button id="add_bannerAttr_row" type="button" class="btn btn-sm btn-primary">
						<span class="glyphicon glyphicon-plus"></span> Add Row
					</button>
				</div>
			</fieldset>
		</div>
	</div>

	<div class="col-sm-12">
		<div class="col-sm-8">
			<a href="{{ route('banner.index') }}" class="btn btn-secondary float-end px-5"> Back</a>
			<button style="margin-left:10px;" class="btn btn-success float-end px-5" type="submit">Submit</button>
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
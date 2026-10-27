@extends('layouts.default')
@section('content')
<h1>User Create</h1>
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
<form action="{{ route('users.store') }}" method="post">
    @csrf
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="name">Name</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="name" value="{{ old('name') }}"/>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="name">Email</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="email" value="{{ old('email') }}"/>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="role_id">Role</label>
				<div class="col-md-9">
                    <select class="form-control" name="role" id="role">
						<option name="admin" value="admin">Admin</option>
						<option name="user" value="user">User</option>
                    </select>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="password">Password</label>
				<div class="col-md-9">
					<input class="form-control" type="password" id="password" name="password" value="{{ old('password') }}"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="password_confirmation">Password Confirmation</label>
				<div class="col-md-9">
					<input class="form-control" type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"/>
					<span id='message'></span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-8">
			<a href="{{ route('users.index') }}" class="btn btn-secondary px-5"> Back</a>
			<button style="margin-left:15px;" class="btn btn-success px-5" type="submit">Submit</button>
		</div>
	</div>
</form>
@endsection
@extends('layouts.default')

@section('content')

<h1>User Update</h1>
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

@if (session('wrongCurrentPass'))
	<div class="alert alert-danger">
		<ul>
			<li>{{ session('wrongCurrentPass') }}</li>
		</ul>
	</div>
@endif 

<form action="{{ route('users.update', $user->id) }}" method="post">
    @csrf
    @method('put')
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="name">Name</label>
				<div class="col-md-9">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"/>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="email">Email</label>
				<div class="col-md-9">
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}"/>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="role">Email</label>
				<input type="hidden" name="role" value="{{ $user->role}}" />
				<div class="col-md-9">
					@if($user->id == Auth::user()->id)
						<select class="form-control" name="role" id="role" disabled>
							<option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
							<option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
						</select>
					@else
						<select class="form-control" name="role" id="role">
							<option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
							<option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
						</select>
					@endif
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="current_password">Current Password</label>
				<div class="col-md-9">
                    <input type="password" name="current_password" class="form-control"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="new_password">New Password</label>
				<div class="col-md-9">
                    <input type="password" name="new_password" class="form-control"/>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-12">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-6 control-label" for="password_confirmation">Password Confirmation</label>
				<div class="col-md-9">
                    <input type="password" name="password_confirmation" class="form-control"/>
				</div>
			</div>
		</div>
	</div>	
	<a href="{{ route('users.index') }}" style="margin-left:20px;" class="btn btn-secondary float-end px-5"> Back</a>
    <button style="margin-left:15px;" class="btn btn-success float-end px-5" type="submit">Submit</button>
</form>


@endsection
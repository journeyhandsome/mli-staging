@extends('layouts.default')

@section('content')

<h1>User Approve</h1>
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

<form action="{{ route('users.accept', $user->id) }}" method="post">
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
                <label class="col-md-6 col-form-label" for="role_id">Role</label>
                <div class="col-md-9">
                    <select class="form-control" name="role" id="role">
						<option name="admin" value="admin">Admin</option>
						<option name="user" value="user">User</option>
                    </select>
                </div>
            </div>
		</div>
	</div>	
	
	<a href="{{ route('users.approve') }}" style="margin-left:20px;" class="btn btn-secondary float-end px-5"> Back</a>
    <button style="margin-left:15px;" class="btn btn-success float-end px-5" type="submit">Submit</button>
</form>


@endsection

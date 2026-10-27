@extends('layouts.default')
@section('content')
<h1>Campus Update</h1>
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
<form action="{{ route('campus.update', $campus->id) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="name" class="form-control mb-3" placeholder="Name" value="{{ $campus->name }}"/>
    <a href="{{ route('campus.index') }}" class="btn btn-secondary float-end px-5"> Back</a>
    <button style="margin-left:10px;" class="btn btn-success float-end px-5" type="submit">Submit</button>
</form>
@endsection
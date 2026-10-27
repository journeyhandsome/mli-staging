@extends('layouts.default')
@section('content')     
{{-- Display message --}}
<div class="col-md-12">
    <h2>
        <div class="col-md-7">
            User Management &nbsp;&nbsp;&nbsp;&nbsp;
            @if (Auth::user()->role == 'admin')
                <a href="{{route('users.create')}}" class="btn btn-md  btn-success"> Create User</a> 
            @endif  
            @if (session('success'))
                <div class="alert alert-success float-right" style="margin-top:4px;">
                    {{ session('success') }}
                </div>
            @endif 
        </div>  
    </h2>
</div><br>
<div class="col-sm-12">
        @if (Auth::user()->role == 'admin')
            <a href="{{route('users.approve')}}" class="btn btn-md  btn-primary float-right"> Approve User</a> 
                <br />    
        @endif  
</div><br>
<div class="col-sm-12">
    <table class="table table-striped table-hover" >
        <thead>
            <tr></tr>
            <tr>
                <th style="text-align:center" scope="col">Name</th>
                <th style="text-align:center" scope="col">Email</th>
                <th style="text-align:center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item) {{-- Loop items --}}
            <tr>
                <td style="text-align:center">{{ $item->name }}</td>
                <td style="text-align:center">{{ $item->email }}</td>
                <td style="text-align:center">
                    @if (Auth::user()->role == 'admin' && $item->id != 1)
                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary">Edit</a> {{-- Edit --}}
                            <button style="margin-left:15px;" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$item->id}}">Delete</button>{{-- Delete --}}
                            @include('admin/users.delete') 
                    @elseif ($item->id == Auth::user()->id && Auth::user()->role_id != 1)
                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary">Edit</a> {{-- Edit --}}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
</div>

@endsection
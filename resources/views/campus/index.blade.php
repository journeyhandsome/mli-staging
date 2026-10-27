@extends('layouts.default')
@section('content')     
<div class="col-md-12">
    <h2>
        <div class="col-md-7">
            Campus  &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{url('campus/create')}}" class="btn btn-md  btn-success"> Create Campus</a>     
            @if (session('success'))
                <div class="btn btn-md alert alert-success float-right">
                    {{ session('success') }}
                </div>
            @endif 
        </div>  
     </h2>
</div>
<div class="col-sm-12">
    <table class="table table-striped table-hover">
        <thead>
            <tr></tr>
            <tr>
                <th style="text-align:center" scope="col">Name</th>
                <th style="text-align:center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campus as $campus) {{-- Loop campus --}}
            <tr>
                <td style="text-align:center">{{ $campus->name }}</td>
                <td style="text-align:center">
                    <a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-primary">Edit</a> {{-- Edit --}}
                    <button style="margin-left:15px;" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$campus->id}}">Delete</button>{{-- Delete --}}
                    @include('campus.delete')  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
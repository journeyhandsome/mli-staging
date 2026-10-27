@extends('layouts.default')
@section('content')     
{{-- Display message --}}
<div class="col-md-12">
    <h2>
        <div class="col-md-7">
         Announcement Pdf Files &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{route('announcement_file.create')}}" class="btn btn-md  btn-success"> Upload file</a>   
            @if (session('success'))
                <div class="alert alert-success float-right" style="margin-top:4px;">
                    {{ session('success') }}
                </div>
            @endif 
        </div>  
    </h2>
</div><br>
<div class="col-sm-12">
    <table class="table table-striped table-hover" >
        <thead>
            <tr></tr>
            <tr>
                <th style="text-align:center" scope="col">Name</th>
                <th style="text-align:center" scope="col">File Link</th>
                <th style="text-align:center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($files as $item) {{-- Loop items --}}
            <tr>
                <td style="text-align:center">{{ $item->name }}</td>
                <td style="text-align:center">
                    <a href="../../files/announcement_file/{{ $item->file }}">/../files/announcement_file/{{ $item->file }}</a>
                </td>
                <td style="text-align:center">
                <a href="{{ route('announcement_file.edit', $item->id) }}" class="btn btn-primary">Edit</a> {{-- Edit --}}
                    <button style="margin-left:15px;" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$item->id}}">Delete</button>{{-- Delete --}}
                    @include('admin/forms/announcement_file.delete') 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $files->links() !!}
        </div>
</div>

@endsection
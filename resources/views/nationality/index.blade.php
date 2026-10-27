@extends('layouts.default')
@section('content')        
<div class="col-md-12">
    <h2>
        <div class="col-md-7">
            Nationality  &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{url('nationality/create')}}" class="btn btn-md  btn-success"> Create Nationality</a>     
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
            @foreach ($nationalities as $nationality) {{-- Loop nationality --}}
                <tr>
                    <td style="text-align:center">{{ $nationality->name }}</td>
                    <td style="text-align:center">
                        <a href="{{ route('nationality.edit', $nationality->id) }}" class="btn btn-primary">Edit</a> {{-- Edit --}}
                        <button style="margin-left:15px;" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$nationality->id}}">Delete</button>{{-- Delete --}}
                        @include('nationality.delete')     
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $nationalities->links() !!}
    </div>
</div>
@endsection
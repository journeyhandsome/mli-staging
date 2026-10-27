@extends('layouts.default')
@section('content')     
{{-- Display message --}}

<div class="col-sm-12">
    <h2>
        <div class="col-sm-12">
            Approve User 
            @if (session('success'))
                <div class="alert alert-success float-right" style="margin-top:4px;">
                    {{ session('success') }}
                </div>
            @endif 
        </div>  
    </h2>
</div><br><br>

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
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('users.approval', $item->id) }}" class="btn btn-primary">Approve</a> {{-- Approve --}}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
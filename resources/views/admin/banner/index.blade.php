@extends('layouts.default')
@section('content')
{{-- Display message --}}
<div class="col-md-12">
    <h2>
        <div class="col-md-7">
            Banner Management &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{route('banner.create')}}" class="btn btn-md  btn-success"> Create Banner</a>       
            @if (session('success'))
                <div class="alert alert-success float-right" style="margin-top:4px;">
                    {{ session('success') }}
                </div>
            @endif 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>  
    </h2>
</div>
<br><br>
<div class="col-sm-12">
    <table class="table table-striped table-hover">
        <thead>
            <tr></tr>
            <tr>
                <th style="text-align:center" scope="col">Language</th>
                <th style="text-align:center" scope="col">Small Image (PC & Mobile)</th>
                <th style="text-align:center" scope="col">Large Image (PC)</th>
                <th style="text-align:center" scope="col">Large Image (Mobile)</th>
                <th style="text-align:center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banner_list as $banner)
                <tr>
                    <td style="text-align:center">{{ $banner -> name }}</td>
                    <td style="text-align:center">
                        <img src="{{ asset('images/banner/'.$banner->path)}}" width="180px" height="50px" alt="Small Image (PC & Mobile)">
                    </td>
                    <td style="text-align:center">
                        <img id="imgtab" src="{{ asset('images/banner/'.$banner->image_large)}}" width="65px" height="130px" alt="Large Image (PC)" class="small">
                    </td>    
                    <td style="text-align:center">
                        <img id="imgtab2" src="{{ asset('images/banner/'.$banner->image_small)}}" width="40px" height="130px" alt="Large Image (Mobile)" class="small2">
                    </td>                      
                    <td>
                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-primary">Edit</a> {{-- Edit --}}
                        <button style="margin-left:15px;" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$banner->id}}">Delete</button>{{-- Delete --}}
                        @include('admin/banner.delete')  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $banner_list->links() !!}
        </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function () {
        var small={width: "65px",height: "130px"};
        var small2={width: "40px",height: "130px"};
        var large={width: "150px",height: "350px"};
        var large2={width: "100px",height: "350px"};
        var count=1; 
        $("#imgtab").css(small).on('click',function () { 
            $(this).animate((count==1)?large:small);
            count = 1-count;
        });
        $("#imgtab2").css(small2).on('click',function () { 
            $(this).animate((count==1)?large2:small2);
            count = 1-count;
        });
    });
</script>
@endsection


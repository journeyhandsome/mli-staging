@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 50px;">
            <div class="card">
                <div class="card-header">
                    @if (session('success'))
                        <div class="alert alert-success float-left" style="margin-top:4px;">
                            {{ session('success') }}
                        </div>      
                    @endif 
                </div>

                <div class="card-body">
                    <p>Your account is pending for approval. Please contact Administrator.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
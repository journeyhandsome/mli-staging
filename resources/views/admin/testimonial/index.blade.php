@extends('layouts.default')
@section('content')
{{-- Display message --}}
    <div class="col-md-12">
        <h3>
            <div class="col-md-7">
            Testimonial Management &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{route('testimonial.create')}}" class="btn btn-md  btn-success"> Create Testimonial</a> 
                @if (session('success'))
                    <div class="alert alert-success float-right" style="margin-top:4px;">
                        {{ session('success') }}
                    </div>
                @endif 
            </div>  
        </h3>
    </div><br><br>
    <div class="col-sm-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr></tr>
                <tr>
                    <th style="text-align:center" scope="col">Image</th>
                    <th style="text-align:center" scope="col">Title</th>
                    <th style="text-align:center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonial_list as $item) {{-- Loop testimonial --}}
                    <tr>
                        <td style="text-align:center; width:20%"><img src="{{ asset('images/testimonial/'.$item->image)}}" width="70px" height="70px"></td>                 
                        <td style="text-align:center; width: 30%;">{{ $item->english_translated ? $item->english_translated->title : 'No English yet' }}</td>
                        <td style="text-align:center; width: 40%;">
                            <button type="button" class="btn btn-info view" data-toggle="modal" data-id="{{ $item->id }}" data-target="#ModalView{{$item->id}}">View</button>{{-- View --}}&nbsp;&nbsp;
                            <a href="{{ route('testimonial.edit', $item->id) }}" class="btn btn-primary">Edit</a> {{-- Edit --}}&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$item->id}}">Delete</button>{{-- Delete --}}
                            @include('admin/testimonial.show') 
                            @include('admin/testimonial.delete') 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $testimonial_list->links() !!}
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('.modal_language_id').change(function() {
      var testimonial = $(this).find(':selected').data('translated_testimonial');
      if (testimonial) {
        $('.testimonial_title').text(testimonial.title);
        $('.testimonial_text').text(testimonial.text);
      }
      else {
        $('.testimonial_title').text('');
        $('.testimonial_text').text('');
      }
    });

    $('.view').click(function() {
      var id = $(this).data('id');
      
      $('#ModalView'+id).on('shown.bs.modal', function(e) {
        var data = $(e.relatedTarget)
        var id = data.data('id');
        
        var testimonial = $('#modal_language_id_'+id).find(':selected').data('translated_testimonial');
        if (testimonial) {
          $('.testimonial_title').text(testimonial.title);
          $('.testimonial_text').text(testimonial.text);
        }
        else {
          $('.testimonial_title').text('');
          $('.testimonial_text').text('');
        }
      });
    });
</script>
@endsection
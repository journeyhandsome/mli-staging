@extends('layouts.default')
@section('content')
{{-- Display message --}}
<div class="col-md-12">
    <h2>
        <div class="col-md-7">
            Slider Management &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{route('slider.create')}}" class="btn btn-md  btn-success"> Create Slider</a>     
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
<div class="col-md-12">
    <div class="col-md-3">
        <div class="form-group">
            <label>Language</label>
            <select class="form-control" id="language_id">
                <option value="all">All</option>
                @foreach($language_list as $language)
                    <option data-thumbnail="{{ asset('images/slider/'.$language->image)}}" id="{{ $language -> id }}" data-id="{{ $language -> id }}">{{ $language -> name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div id="sliderContainer"></div>
@endsection

@section('scripts')
<script type="text/javascript">
    function sendReorderSliderRequest($category) {
        var items = $category.sortable('toArray', {attribute: 'data-id'});
        var ids = $.grep(items, (item) => item !== "");

        if ($category.find('tr.slider').length) {
            $category.find('.empty-message').hide();
        }
        $category.find('.language-name').text($category.find('tr:first td').text());

        $.ajax({
            url: "{{ URL::to('admin/slider/reorder') }}",
            type: "POST",
            data: {
                'ids': ids,
                'language_id': $category.data('id'),
                '_token': '{{ csrf_token() }}'
            }
        })
        .done(function (response) {
            // location.reload();
            // console.log(response)
            $category.children('tr.slider').each(function (index, slider) {
                $(slider).children('.position').text(response[index].order)
            });
        })
        .fail(function (response) {
            // alert('Error occured while sending reorder request');
            // location.reload();
        });
        
    }

    $(document).ready(function () {
        var $categories = $('#table');
        var $slider = $('.sortable');

        $slider.sortable({
            items: 'tr.slider',
            stop: (event, ui) => {
                sendReorderSliderRequest($(ui.item).parent());

                if ($(event.target).data('id') != $(ui.item).parent().data('id')) {
                    // console.log($(event.target).data('id') +' = '+$(ui.item).parent().data('id'))
                    if ($(event.target).find('tr.slider').length) {
                        sendReorderSliderRequest($(event.target));
                    } else {
                        $(event.target).find('.empty-message').show();
                    }
                }
            }
        });
        $('table, .sortable').disableSelection();

        var selected_language = $('#language_id').val();
        if (selected_language != 'all') {
            var id = $(selected_language).find(':selected').data('id');
            getsliderList(id);
        }
        else {
            getsliderList('all');
        }
    });

    $('#language_id').change(function() {
        if ($(this).val() != 'all') {
            var id = $(this).find(':selected').data('id');
            getsliderList(id);
        }
        else {
            getsliderList('all');
        }
    });

    function getsliderList(languageId) {
        $.ajax({
            url: "{{ URL::to('admin/slider/get_sliders') }}",
            type: "GET",
            data: {
                'language_id': languageId
            },
            success: function(data) {
                $('#sliderContainer').html(data);
            }
        });
    }

</script>
@endsection
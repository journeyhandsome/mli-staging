@if($language_id == 'all')
<div class="col-sm-12">
	<table class="table table-striped table-hover">
	    <thead>
	        <tr></tr>
	        <tr>
	            <th style="text-align:center" scope="col">Language</th>
	            <th style="text-align:center" scope="col">Image</th>
	            <th style="text-align:center" scope="col">Order</th>
	            <th style="text-align:center" scope="col">Action</th>
	        </tr>
	    </thead>
	    @foreach($language_list as $language)
	        @if(count($language -> slider_list) != 0)
	            <tbody data-id="{{ $language -> id }}" class="sortable" id="sortable_{{ $language -> id }}">
	                <tr>
	                    <td style="background-color:#ddd; text-align: center;">{{ $language -> name }}</td> 
	                    <td colspan="3" style="background-color:#ddd; text-align: center;"></td> 
	                </tr>
	                @foreach($language -> slider_list as $slider)
	                    <tr data-id="{{ $slider -> id }}" class="slider">
	                        <td style="text-align:center" class="language-name"></td>
	                        <td style="text-align:center">
	                            <img src="{{ asset('images/slider/'.$slider->path)}}" width="160px" height="60px" alt="slider Image">
	                        </td>                   
	                        <td style="text-align:center" class="position">{{ $slider -> order }}</td>
	                        <td>
	                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary">Edit</a> {{-- Edit --}}
	                            <button style="margin-left:15px;" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$slider->id}}">Delete</button>{{-- Delete --}}
	                            @include('admin/slider.delete')  
	                        </td>
	                    </tr>
	                @endforeach
	            </tbody>
	        @endif
	    @endforeach
	</table>
</div>
@else
<div class="col-sm-12">
	<table class="table table-striped table-hover">
	    <thead>
	        <tr></tr>
	        <tr>
	            <th style="text-align:center" scope="col">Language</th>
	            <th style="text-align:center" scope="col">Image</th>
	            <th style="text-align:center" scope="col">Order</th>
	            <th style="text-align:center" scope="col">Action</th>
	        </tr>
	    </thead>
	    @foreach($language_list as $language)
	        @if(count($language -> slider_list) != 0)
	            <tbody data-id="{{ $language -> id }}" class="sortable" id="sortable_{{ $language -> id }}">
	                <tr>
	                    <td style="background-color:#ddd; text-align: center;">{{ $language -> name }}</td> 
	                    <td colspan="3" style="background-color:#ddd; text-align: center;"></td> 
	                </tr>
	                @foreach($language -> slider_list as $slider)
	                    <tr data-id="{{ $slider -> id }}" class="slider">
	                        <td style="text-align:center" class="language-name"></td>
	                        <td style="text-align:center">
	                            <img src="{{ asset('images/slider/'.$slider->path)}}" width="160px" height="60px" alt="slider Image">
	                        </td>                   
	                        <td style="text-align:center" class="position">{{ $slider -> order }}</td>
	                        <td>
	                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary">Edit</a> {{-- Edit --}}
	                            <button style="margin-left:15px;" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$slider->id}}">Delete</button>{{-- Delete --}}
	                            @include('admin/slider.delete')  
	                        </td>
	                    </tr>
	                @endforeach
	            </tbody>
	        @endif
	    @endforeach
	</table>
</div>
@endif
<script type="text/javascript">
	function sendReorderSliderRequest($category) {
        var items = $category.sortable('toArray', {attribute: 'data-id'});
        var ids = $.grep(items, (item) => item !== "");

        if ($category.find('tr.slider').length) {
            $category.find('.empty-message').hide();
        }
        // $category.find('.language-name').text($category.find('tr:first td').text());

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
    });
</script>
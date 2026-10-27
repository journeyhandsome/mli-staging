@extends('layouts.default')
@section('content')
<div class="col-md-12">
    <h2>
		<div class="col-md-7">
			Announcement Management 
			@if(session('success'))
				<div class="alert alert-success float-right">
					{{ session('success') }}
				</div>
			@endif
		</div>  
    </h2>
</div>


<?php Session::forget('success'); ?>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<br><br>
@csrf

	<div class="col-md-8">
		<div class="form-group">
			<label class="col-md-3 control-label" for="language_id">Language</label>
			<input type="hidden" id="selected_language_id" value="{{ session('language_id') }}">
			<div class="col-md-6">
				<select class="form-control language_id" name="language_id" id="language_id">
						@foreach($language_list as $language)
							<option name="language_id" value="{{{ $language->id }}}" data-announcement="{{ $language -> announcement }}">{{{ $language->name }}}</option>
						@endforeach
				</select>
			</div>
		</div>
	</div>
	<section style="padding-top:20px;" id="announcement_card">
			<div class="col-sm-12">
				<div class="card-body">
					<textarea id="text" name="text" class="form-control text-announcement"></textarea>
				</div>
			</div>
		<div class="col-md-12">
			<div class="col-md-8">
			<button class="btn btn-success px-5" id="newAnnouncement">Update</button>
			</div>
		</div>
	</section>

@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/q48lp7mhqej3klkkp1dlc5kav472b9wgojj905ovnhz6d8tz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
        tinymce.init({
            selector: 'textarea#text',
            // selector: 'textarea',   
            image_class_list: [
            {title: 'img-responsive', value: 'img-responsive'},
            ],
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            height: 400,
            menubar: false,
            plugins: 'importcss searchreplace autolink visualblocks link fullscreen codesample table hr nonbreaking toc insertdatetime advlist lists  wordcount  imagetools textpattern help charmap emoticons',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist  | forecolor backcolor | charmap emoticons | link fullscreen |  insertfile',            content_css: '//www.tiny.cloud/css/codepen.min.css',
            // quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quicktable',
            toolbar_mode: 'sliding',
            spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
            a11y_advanced_options: true,
           
      });
        
    $(document).ready(function() {
      //initialization
      const languageId = $('#selected_language_id').val();

      if(languageId == '') {
        $('.language_id').val(1);
        $('.language_id').trigger('change');
      }
    });
    
    $('.language_id').change(function() {
      var data = $(this).find(':selected').data('announcement');
      console.log(tinyMCE);
      setTimeout(() => {
        if (data) {
          tinyMCE.activeEditor.setContent(data.text);
        }
        else {
          tinyMCE.activeEditor.setContent('');
        }
      }, 1000);
    });
    $('#newAnnouncement').click(function() {
      var text = $('#text').val();
      var language_id = $('#language_id').val();
      var myContent = tinymce.get("text").getContent();
      // console.log(myContent)
      $.ajax({
        url:"{{ URL::to('admin/announcement/create') }}",
        type:'post',
        data: {
          "text":myContent,
          "language_id":language_id,
          '_token': '{{ csrf_token() }}'
        },
        dataType: "json",
        success: function (data)  { 
          location.reload();   
        },
      });
    });
  
</script>
@endsection

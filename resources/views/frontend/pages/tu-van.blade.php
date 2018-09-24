@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="container">
	<div class="block-main">
		<h2 class="page_title">Tư vấn / Góp ý / Báo giá</h2>
		@if(Session::has('message'))
          <p class="alert alert-info" >{{ Session::get('message') }}</p>
          @endif
          @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      	@endif
		<form class="form-horizontal block-form" method="POST" action="{{ route('send-contact') }}" id="frmSodo">
			{{ csrf_field() }}			
		    <div class="form-group">
		        <label class="col-sm-2 control-label">Họ Tên <span class="required">*</span></label>
		        <div class="col-sm-6">
		            <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Họ Tên" value="{{ old('full_name') }}">
		        </div>
		    </div>
		     <div class="form-group">
		        <label class="col-sm-2 control-label">Điện thoại <span class="required">*</span></label>
		        <div class="col-sm-6">
		            <input type="text" class="form-control" placeholder="Điện thoại" id="phone" name="phone" value="{{ old('phone') }}">
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="col-sm-2 control-label">Email <span class="required">*</span></label>
		        <div class="col-sm-6">
		            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Chúng tôi thường trả lời qua Email">
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="col-sm-2 control-label">Chọn hình thức <span class="required">*</span></label>
		        <div class="col-sm-6">
		        	<div class="checkboxStyle">
			            <p class="">
						    <input type="radio" id="test1" checked="checked"  name="type" value="1" />
						    <label for="test1">Tư vấn dịch vụ</label>
						  </p>
						<p class="">
						    <input type="radio" id="test2" name="type" value="2"  />
						    <label for="test2">Yêu cầu báo giá</label>
					  	</p>
					  	<p class="">
						    <input type="radio" id="test3" name="type" value="3" />
						    <label for="test3">Góp ý/ Than phiền</label>
				  		</p>
				  	</div>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="col-sm-12 control-label">Hình ảnh đính kèm (nếu có)</label>
		    </div>
		    <div class="form-group">
			    <div class="col-sm-12">
			    	
					<div class="clearfix show-image">						
						<div>
							<input type="file" id="file-image" class="inputfile inputfile-5" data-multiple-caption="{count} files selected" multiple="">
							<label for="file-image">Ch&#7885;n h&igrave;nh</label>
							<div class="clearfix" style="margin-top:5px"></div>
							<div id="div-image" class="clearfix show-image">
								
								
							</div>
						</div>

					</div>
			    </div>
			</div>
			<div class="form-group">
		        <label class="col-sm-2 control-label">N&#7897;i dung</label>
		        <div class="col-sm-6">
		            <textarea name="content" cols="" rows="10" class="form-control" placeholder="" style="max-width: 100%;" id="content">{{ old('content') }}</textarea>
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="col-sm-offset-2 col-sm-6">
		            <button type="button" id="btnNext" class="btn btn-default pull-right">Gửi</button>
		        </div>
		    </div>
		</form>
	</div>
	@include('frontend.partials.footer-2')
</div><!-- /.container -->
<input type="hidden" id="route_upload_tmp_image_multiple" value="{{ route('image.tmp-upload-multiple-fe') }}">
@stop
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnNext').click(function(){
			$(this).html('<i class="fa fa-spin fa-spinner"></i>').attr('disabled', 'disabled');
			$('#frmSodo').submit();
		});	  
		var files = "";
	      $('#file-image').change(function(e){
	         files = e.target.files;
	         
	         if(files != ''){
	           var dataForm = new FormData();        
	          $.each(files, function(key, value) {
	             dataForm.append('file[]', value);
	          });   
	          
	          dataForm.append('date_dir', 0);
	          dataForm.append('folder', 'tmp');

	          $.ajax({
	            url: $('#route_upload_tmp_image_multiple').val(),
	            type: "POST",
	            async: false,      
	            data: dataForm,
	            processData: false,
	            contentType: false,
	            success: function (response) {
	                $('#div-image').append(response);
	                if( $('input.thumb:checked').length == 0){
	                  $('input.thumb').eq(0).prop('checked', true);
	                }
	            },
	            error: function(response){                             
	                var errors = response.responseJSON;
	                for (var key in errors) {
	                  
	                }
	                //$('#btnLoading').hide();
	                //$('#btnSave').show();
	            }
	          });
	        }
	      });   
	});	
</script>
@stop
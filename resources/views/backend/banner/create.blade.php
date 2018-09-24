@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Banner của <span style="color:red">{{ $detail->name }}</span>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('banner.index', ['object_id' => $object_id, 'object_type' => $object_type]) }}">banner</a></li>
      <li class="active">Tạo mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm " href="{{ route('banner.index', ['object_id' => $object_id, 'object_type' => $object_type]) }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('banner.store') }}">
    <div class="row">
      <!-- left column -->

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tạo mới</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}

            <div class="box-body">
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif                                
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Desktop 
                    <?php 
                  if($object_id == 1){
                    echo "( 1781 x 1020 px)";
                  }elseif($object_id == 5){
                    echo "( 1349 x 200 px)";
                  }
                  ?></label>    
                  <div class="col-md-9">
                    <img id="thumbnail_image_url" src="{{ old('image_url') ? Helper::showImage(old('image_url')) : URL::asset('public/admin/dist/img/img.png') }}" class="img-thumbnail" width="200">                    
                    <button class="btn btn-default btn-sm btnSingleUpload" data-set="image_url" data-image="thumbnail_image" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                    <input type="hidden" name="image_url" id="image_url" value="{{ old('image_url') }}"/>
                  </div>
                  <div style="clear:both"></div>
                </div>
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Máy tính bảng 
                    <?php 
                  if($object_id == 1){
                    echo "( 1024 x 1366 px)";
                  }elseif($object_id == 5){
                    echo "( 1349 x 200 px)";
                  }
                  ?></label>    
                  <div class="col-md-9">
                    <img id="thumbnail_ipad_url" src="{{ old('ipad_url') ? Helper::showImage(old('ipad_url')) : URL::asset('public/admin/dist/img/img.png') }}" class="img-thumbnail" width="200">                    
                    <button class="btn btn-default btn-sm btnSingleUpload" data-set="ipad_url" data-image="thumbnail_image" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                    <input type="hidden" name="ipad_url" id="ipad_url" value="{{ old('ipad_url') }}"/>
                  </div>
                  <div style="clear:both"></div>
                </div> 
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Điện thoại
                    <?php 
                  if($object_id == 1){
                    echo "( 517 x 1020 px)";
                  }elseif($object_id == 5){
                    echo "( 1349 x 200 px)";
                  }
                  ?></label>    
                  <div class="col-md-9">
                    <img id="thumbnail_mobile_url" src="{{ old('mobile_url') ? Helper::showImage(old('mobile_url')) : URL::asset('public/admin/dist/img/img.png') }}" class="img-thumbnail" width="200">                    
                    <button class="btn btn-default btn-sm btnSingleUpload" data-set="mobile_url" data-image="thumbnail_image" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                    <input type="hidden" name="mobile_url" id="mobile_url" value="{{ old('mobile_url') }}"/>
                  </div>
                  <div style="clear:both"></div>
                </div> 
                <div class="form-group">
                  <label>Ẩn / Hiện</label>
                  <select name="status" class="form-control" id="status">
                  	<option value="1" {{ old('status') == 1  ? "selected" : "" }}>Hiện</option>
                  	<option value="2" {{ old('status') == 2  ? "selected" : "" }}>Ẩn</option>
                  </select>
                </div>           
                <!-- textarea -->
                <div class="form-group">
                  <label>Loại banner</label>
                  <select name="type" class="form-control" id="type">
                  	<option value="1" {{ old('type') == 1  ? "selected" : "" }}>Không liên kết</option>
                  	<option value="2" {{ old('type') == 2 ? "selected" : "" }}>Có liên kết</option>
                  </select>
                </div>  
                <div class="form-group" id="div_lk" style="display:none">
                  <label>Liên kết</label>
                  <input type="text" name="ads_url" id="ads_url" value="{{ old('ads_url') }}" class="form-control">
                </div>  
                <input type="hidden" name="object_id" value="{{ $object_id }}">
                <input type="hidden" name="object_type" value="{{ $object_type }}">
            </div>                        
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="{{ route('banner.index', ['object_id' => $object_id, 'object_type' => $object_type])}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
     
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
@stop
@section('javascript_page')
<script type="text/javascript">
var h = screen.height;
var w = screen.width;
var left = (screen.width/2)-((w-300)/2);
var top = (screen.height/2)-((h-100)/2);
function openKCFinder_singleFile() {
      window.KCFinder = {};
      window.KCFinder.callBack = function(url) {
         $('#image_url').val(url);
         $('#thumbnail_image').attr('src', $('#app_url').val() + url);
          window.KCFinder = null;
      };
      window.open('{{ URL::asset("admin/dist/js/kcfinder/browse.php?type=images") }}', 'kcfinder_single','scrollbars=1,menubar=no,width='+ (w-300) +',height=' + (h-300) +',top=' + top+',left=' + left);
  }
    $(document).ready(function(){
      
      $('#btnUploadImage').click(function(){        
        //$('#file-image').click();
        openKCFinder_singleFile();
      });      
      var files = "";
      $('#file-image').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file', value);
          });   
          
          dataForm.append('date_dir', 1);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_image').attr('src',$('#upload_url').val() + response.image_path);
                $( '#image_url' ).val( response.image_path );
                $( '#image_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
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
      
      var type = $('#type').val();
      checkType( type );

      $('#type').change(function(){
      	checkType( $(this).val() );
      });
      
     
    });
    function checkType( type ){
    	if( type == 1){
    		$('#div_lk').hide();
    	}else{
    		$('#div_lk').show();
    	}
    }
</script>
@stop
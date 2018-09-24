@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sản phẩm mới    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('product.index') }}">Sản phẩm mới</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('product.index', ['parent_id' => $detail->parent_id, 'cate_id' => $detail->cate_id]) }}" style="margin-bottom:5px">Quay lại</a>
    <a class="btn btn-primary btn-sm" href="{{ route('product-detail', [Helper::getParentSlug($detail), $detail->slug] ) }}" target="_blank" style="margin-top:-6px"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
    <form role="form" method="POST" action="{{ route('product.update') }}" id="dataForm" class="productForm">
    <div class="row">
      <!-- left column -->
      <input type="hidden" name="id" value="{{ $detail->id }}">
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}          
            <div class="box-body">
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
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>                    
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Hình ảnh</a></li>                                                      
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="form-group col-md-6 none-padding">
                          <label for="email">Danh mục cha</label>
                          <select class="form-control" name="parent_id" id="parent_id">
                            <option value="">--Chọn--</option>
                            @foreach( $cateParentList as $value )
                            <option value="{{ $value->id }}"
                            <?php 
                            if( old('parent_id') && old('parent_id') == $value->id ){ 
                              echo "selected";
                            }else if( $detail->parent_id == $value->id ){
                              echo "selected";
                            }else{
                              echo "";
                            }
                            ?>

                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                          <div class="form-group col-md-6 none-padding pleft-5">
                          <label for="email">Danh mục con<span class="red-star">*</span></label>

                          <select class="form-control req" name="cate_id" id="cate_id">
                            <option value="">--Chọn--</option>
                            @foreach( $cateArr as $value )
                            <option value="{{ $value->id }}" {{ old('cate_id', $detail->cate_id) == $value->id ? "selected"  : "" }}
                              
                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>     
                        <div class="form-group" >                  
                          <label>CODE <span class="red-star">*</span></label>
                          <input type="text" class="form-control req" name="code" id="code" value="{{ old('code', $detail->code) }}">
                        </div>                      
                        <div class="form-group" >                  
                          <label>Tên <span class="red-star">*</span></label>
                          <input type="text" class="form-control req" name="name" id="name" value="{{ old('name', $detail->name) }}">
                        </div>
                        <div class="form-group">                  
                          <label>Slug <span class="red-star">*</span></label>                  
                          <input type="text" class="form-control req" readonly="readonly" name="slug" id="slug" value="{{ old('slug', $detail->slug) }}">
                        </div>                        
                        <div class="col-md-4 none-padding">
                          <div class="checkbox">
                              <label><input type="checkbox" name="is_hot" value="1" {{ old('is_hot', $detail->is_hot) == 1 ? "checked" : "" }}> NỔI BẬT </label>
                          </div>                          
                        </div>                                               
                        <div class="col-md-4 none-padding pleft-5">
                            <div class="checkbox">
                              <label><input type="checkbox" name="is_sale" id="is_sale" value="1" {{ old('is_sale', $detail->is_sale) == 1 ? "checked" : "" }}> SALE </label>
                          </div>
                        </div>
                        <div class="col-md-4 none-padding pleft-5">
                            <div class="checkbox">
                              <label><input type="checkbox" name="thanh_ly" value="1" {{ old('thanh_ly', $detail->thanh_ly) == 1 ? "checked" : "" }}> Thanh lý </label>
                          </div> 
                        </div>
                        <div class="clearfix"></div>
                         <div class="form-group col-md-4 none-padding" >                  
                            <label>Giá<span class="red-star">*</span></label>
                            <input type="text" class="form-control number" name="price" id="price" value="{{ old('price', $detail->price) }}">
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5" >                  
                            <label>Giá SALE</label>
                            <input type="text" class="form-control number" name="price_sale" id="price_sale" value="{{ old('price_sale', $detail->price_sale) }}">
                        </div>  
                        <div class="form-group col-md-4 pleft-5" >                  
                            <label>Giá thanh lý</label>
                            <input type="text" class="form-control number" name="gia_thanh_ly" id="gia_thanh_ly" value="{{ old('gia_thanh_ly', $detail->gia_thanh_ly) }}">
                        </div>                        
                        <div class="form-group">
                          <label>Màu sắc</label>
                          <select class="form-control select2" name="color_id[]" id="color_id" multiple="multiple">
                            @if( $colorArr->count() > 0)
                              @foreach( $colorArr as $value )
                              <option value="{{ $value->id }}" {{ in_array($value->id, $colorSelected) || (old('color_id') && in_array($value->id, old('color_id'))) ? "selected" : "" }}>{{ $value->name }}</option>
                              @endforeach
                            @endif
                          </select>
                   
                      </div>
                      <div style="margin-bottom:10px;clear:both"></div>
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->                    
                   
                     <div role="tabpanel" class="tab-pane" id="settings">
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                         
                          <div class="col-md-12" style="text-align:center">                            
                            
                            <input type="file" id="file-image"  style="display:none" multiple/>
                         
                            <button class="btn btn-primary btnMultiUpload" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                            <div class="clearfix"></div>
                            <div id="div-image" style="margin-top:10px">                              
                              @if( $hinhArr )
                                @foreach( $hinhArr as $k => $hinh)
                                  <div class="col-md-3">
                                    <img class="img-thumbnail" src="{{ Helper::showImage($hinh) }}" style="width:100%">
                                    <div class="checkbox">                                   
                                      <label><input type="radio" name="thumbnail_id" class="thumb" value="{{ $k }}" {{ $detail->thumbnail_id == $k ? "checked" : "" }}> Ảnh đại diện </label>
                                      <button class="btn btn-danger btn-sm remove-image" type="button" data-value="{{  $hinh }}" data-id="{{ $k }}" >Xóa</button>
                                    </div>
                                    <input type="hidden" name="image_id[]" value="{{ $k }}">
                                  </div>
                                @endforeach
                              @endif

                            </div>
                          </div>
                          <div style="clear:both"></div>
                        </div>

                     </div><!--end hinh anh-->
                     
                  </div>

                </div>
                  
            </div>
            <div class="box-footer">             
              <button type="button" class="btn btn-default" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
              <button type="submit" class="btn btn-primary" id="btnSave">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('product.index', ['parent_id' => $detail->parent_id, 'cate_id' => $detail->cate_id])}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-4">      
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>

          <!-- /.box-header -->
            <div class="box-body">
              <input type="hidden" name="meta_id" value="{{ $detail->meta_id }}">
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ !empty((array)$meta) ? $meta->title : "" }}">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="6" name="meta_description" id="meta_description">{{ !empty((array)$meta) ? $meta->description : "" }}</textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords">{{ !empty((array)$meta) ? $meta->keywords : "" }}</textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="6" name="custom_text" id="custom_text">{{ !empty((array)$meta) ? $meta->custom_text : ""  }}</textarea>
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
<input type="hidden" id="route_upload_tmp_image_multiple" value="{{ route('image.tmp-upload-multiple') }}">
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
<style type="text/css">
  .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #444345 !important;
  }
  .error{
    border : 1px solid red;
  }
  .select2-container--default .select2-selection--single{
    height: 35px !important;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice{
    color: red !important;    
    font-size: 20px !important; 
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
    color: red !important;
    
    font-size:20px !important;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__rendered{
    font-size:20px !important;
  }
</style>
@stop
@section('javascript_page')
<script type="text/javascript">
    $(document).ready(function(){           
      $('#parent_id').change(function(){
        location.href="{{ route('product.create') }}?parent_id=" + $(this).val();
      });     
    });
    
</script>
@stop

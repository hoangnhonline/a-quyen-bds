<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Căn hộ    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('articles.index')); ?>">Căn hộ</a></li>
      <li class="active">Cập nhật</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="<?php echo e(route('articles.index')); ?>" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="<?php echo e(route('articles.update')); ?>" id="dataForm" class="productForm">
    <input type="hidden" name="id" value="<?php echo e($detail->id); ?>">
    <div class="row">
      <!-- left column -->

      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Cập nhật</h3>
          </div>
          <!-- /.box-header -->               
            <?php echo csrf_field(); ?>          
            <div class="box-body">
              <?php if(Session::has('message')): ?>
              <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
              <?php endif; ?>
                <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors->all() as $error): ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>                    
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Hình ảnh</a></li>                    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                   
                    <div role="tabpanel" class="tab-pane active" id="home">                                                                        
                        <div class="form-group" >                  
                          <label>Tên dự án <span class="red-star">*</span></label>
                          <input type="text" class="form-control req" name="title" id="title" value="<?php echo e(old('title', $detail->title)); ?>">
                        </div>
                        <div class="form-group">                  
                          <label>Slug <span class="red-star">*</span></label>                  
                          <input type="text" class="form-control req" readonly="readonly" name="slug" id="slug" value="<?php echo e(old('slug', $detail->slug)); ?>">
                        </div>
                        <div class="form-group">
                          <label>Giới thiệu</label>                          
                          <textarea class="form-control" rows="4" name="about" id="about"><?php echo e(old('about', $detail->about)); ?></textarea>
                        </div>
                        <div class="form-group">
                          <label>Liên hệ</label>                          
                          <textarea class="form-control" rows="4" name="contact" id="contact"><?php echo e(old('contact', $detail->contact)); ?></textarea>
                        </div>
                        <div class="clearfix"></div> 
                        <div class="form-group" style="margin-top: 15px !important;">
                          <label>Mô tả ngắn</label>
                          <button class="btnUploadEditor btn btn-info" type="button" style="float:right;margin-bottom: 3px !important;" data-editor="description">Chèn ảnh</button>
                          <div class="clearfix"></div>
                          <textarea class="form-control" rows="4" name="description" id="description"><?php echo e(old('description', $detail->description)); ?></textarea>
                        </div>
                        <div class="form-group" style="margin-top: 15px !important;">
                          <label>Vị trí</label>
                          <button class="btnUploadEditor btn btn-info" type="button" style="float:right;margin-bottom: 3px !important;" data-editor="position">Chèn ảnh</button>
                          <div class="clearfix"></div>
                          <textarea class="form-control" rows="4" name="position" id="position"><?php echo e(old('position', $detail->position)); ?></textarea>
                        </div>
                        <div class="form-group" style="margin-top: 15px !important;">
                          <label>Tiện ích</label>
                          <button class="btnUploadEditor btn btn-info" type="button" style="float:right;margin-bottom: 3px !important;" data-editor="utilities">Chèn ảnh</button>
                          <div class="clearfix"></div>
                          <textarea class="form-control" rows="4" name="utilities" id="utilities"><?php echo e(old('utilities', $detail->utilities)); ?></textarea>
                        </div>
                        <div class="form-group" style="margin-top: 15px !important;">
                          <label>Mặt bằng</label>
                          <button class="btnUploadEditor btn btn-info" type="button" style="float:right;margin-bottom: 3px !important;" data-editor="ground">Chèn ảnh</button>
                          <div class="clearfix"></div>
                          <textarea class="form-control" rows="4" name="ground" id="ground"><?php echo e(old('ground', $detail->ground)); ?></textarea>
                        </div>                       
                        <div class="form-group" style="margin-top: 15px !important;">
                          <label>Tiến độ</label>
                          <button class="btnUploadEditor btn btn-info" type="button" style="float:right;margin-bottom: 3px !important;" data-editor="process">Chèn ảnh</button>
                          <div class="clearfix"></div>
                          <textarea class="form-control" rows="4" name="process" id="process"><?php echo e(old('process', $detail->process)); ?></textarea>
                        </div>
                        <div style="margin-bottom:10px;clear:both"></div>
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->                    
                    <input type="hidden" id="editor" value="">
                      <div role="tabpanel" class="tab-pane" id="settings">
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                         
                          <div class="col-md-12" style="text-align:center">                            
                            
                            <input type="file" id="file-image"  style="display:none" multiple/>
                         
                            <button class="btn btn-primary btnMultiUpload" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                            <div class="clearfix"></div>
                            <div id="div-image" style="margin-top:10px">                              
                              <?php if( $detail->images->count() > 0 ): ?>
                                <?php foreach( $detail->images as $k => $hinh): ?>
                                  <div class="col-md-3">
                                    <img class="img-thumbnail" src="<?php echo e(Helper::showImage($hinh->image_url)); ?>" style="width:100%">
                                    <div class="checkbox">                                   
                                      <label><input type="radio" name="thumbnail_id" class="thumb" value="<?php echo e($hinh->id); ?>" <?php echo e($detail->thumbnail_id == $k ? "checked" : ""); ?>> Ảnh đại diện </label>
                                      <button class="btn btn-danger btn-sm remove-image" type="button" data-value="<?php echo e($hinh->image_url); ?>" data-id="<?php echo e($hinh->id); ?>" >Xóa</button>
                                    </div>
                                    <input type="hidden" name="image_id[]" value="<?php echo e($hinh->id); ?>">
                                  </div>
                                <?php endforeach; ?>
                              <?php endif; ?>

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
              <a class="btn btn-default" class="btn btn-primary" href="<?php echo e(route('articles.index')); ?>">Hủy</a>
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
              <input type="hidden" name="meta_id" value="<?php echo e($detail->meta_id); ?>">
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo e(!empty((array)$meta) ? $meta->title : ""); ?>">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="6" name="meta_description" id="meta_description"><?php echo e(!empty((array)$meta) ? $meta->description : ""); ?></textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords"><?php echo e(!empty((array)$meta) ? $meta->keywords : ""); ?></textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="6" name="custom_text" id="custom_text"><?php echo e(!empty((array)$meta) ? $meta->custom_text : ""); ?></textarea>
              </div>
            
          </div>
        <!-- /.box -->
      </div>    
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image_multiple" value="<?php echo e(route('image.tmp-upload-multiple')); ?>">
<input type="hidden" id="route_upload_tmp_image" value="<?php echo e(route('image.tmp-upload')); ?>">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">

    $(document).ready(function(){
       $(".select2").select2();
      $('#parent_id').change(function(){
        location.href="<?php echo e(route('articles.create')); ?>?parent_id=" + $(this).val();
      })
      
      $('#dataForm').submit(function(){        
        $('#btnSave').hide();
        $('#btnLoading').show();
      });  
    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
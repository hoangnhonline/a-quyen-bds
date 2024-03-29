<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Banner của <span style="color:red"><?php echo e($detail->name); ?></span>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('banner.index', ['object_id' => $object_id, 'object_type' => $object_type])); ?>">banner</a></li>
      <li class="active">Tạo mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm " href="<?php echo e(route('banner.index', ['object_id' => $object_id, 'object_type' => $object_type])); ?>" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="<?php echo e(route('banner.store')); ?>">
    <div class="row">
      <!-- left column -->

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tạo mới</h3>
          </div>
          <!-- /.box-header -->               
            <?php echo csrf_field(); ?>


            <div class="box-body">
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php foreach($errors->all() as $error): ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>              
                 <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Banner <?php 
                  if($object_id == 1){
                    echo "( 1349 x 300 px)";
                  }elseif($object_id == 5){
                    echo "( 1349 x 200 px)";
                  }
                  ?></label>    
                  <div class="col-md-9">
                    <img id="thumbnail_image" src="<?php echo e(old('image_url') ? Helper::showImage(old('image_url')) : URL::asset('public/admin/dist/img/img.png')); ?>" class="img-thumbnail" width="500">
                    <button class="btn btn-default btn-sm btn btnSingleUpload" data-set="image_url" data-image="thumbnail_image" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>

                  </div>
                  <div style="clear:both"></div>
                </div>                  
                <input type="hidden" name="status" value="1">     
                <!-- textarea -->
                <div class="form-group">
                  <label>Loại banner</label>
                  <select name="type" class="form-control" id="type">
                  	<option value="1" <?php echo e(old('type') == 1  ? "selected" : ""); ?>>Không liên kết</option>
                  	<option value="2" <?php echo e(old('type') == 2 ? "selected" : ""); ?>>Có liên kết</option>
                  </select>
                </div>  
                <div class="form-group" id="div_lk" style="display:none">
                  <label>Liên kết</label>
                  <input type="text" name="ads_url" id="ads_url" value="<?php echo e(old('ads_url')); ?>" class="form-control">
                </div>  
                <input type="hidden" name="image_url" id="image_url" value="<?php echo e(old('image_url')); ?>"/>         
            	
                <input type="hidden" name="object_id" value="<?php echo e($object_id); ?>">
                <input type="hidden" name="object_type" value="<?php echo e($object_type); ?>">
            </div>                        
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="<?php echo e(route('banner.index', ['object_id' => $object_id, 'object_type' => $object_type])); ?>">Hủy</a>
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
<input type="hidden" id="route_upload_tmp_image" value="<?php echo e(route('image.tmp-upload')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).ready(function(){
      
      
      
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>            
            <li class="active"><?php echo $detail->title; ?></li>
        </ul>
    </div>
</div>
<div class="main">
    <div class="container">
        <div class="page-title">Về chúng tôi</div>
        <?php echo str_replace("[Caption]", "", $detail->content); ?>

    </div>    
</div><!-- End main -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
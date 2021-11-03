<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="container">
        <div class="real-estate">
		    <div class="row clearfix" id="can-ho">
		        <?php if($articlesList->count() > 0): ?>
		            <?php foreach($articlesList as $articles): ?>
		            <div class="col-sm-3">
		                <a href="<?php echo e(route('detail', $articles->slug)); ?>">

		                    <img src="<?php echo e(($articles->thumbnail) ? Helper::showImageThumb($articles->thumbnail->image_url ) :  ''); ?>" alt="<?php echo $articles->title; ?>">
		                    <h2 class="title-obj"><?php echo $articles->title; ?></h2>
		                    <div class="desc"><?php echo $articles->about; ?></div>
		                </a>
		            </div>
		            <?php endforeach; ?>
		        <?php endif; ?>
		    </div>
		</div>
    </div>    
</div><!-- End main -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo e(URL::asset('public/admin/dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo e(Auth::user()->full_name); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>    
     
      <li class="treeview <?php echo e(in_array(\Request::route()->getName(), ['articles.index', 'articles.create', 'articles.edit','articles-cate.create', 'articles-cate.index', 'articles-cate.edit']) ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Căn hộ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo e(in_array(\Request::route()->getName(), ['articles.edit', 'articles.index']) ? "class=active" : ""); ?>><a href="<?php echo e(route('articles.index')); ?>"><i class="fa fa-circle-o"></i> Căn hộ</a></li>
          <li <?php echo e(in_array(\Request::route()->getName(), ['articles.create']) ? "class=active" : ""); ?> ><a href="<?php echo e(route('articles.create', ['cate_id' => 1])); ?>"><i class="fa fa-circle-o"></i> Thêm căn hộ</a></li>
          <?php if(Auth::user()->role == 3): ?>
        <!--<li <?php echo e(in_array(\Request::route()->getName(), ['articles-cate.create', 'articles-cate.index', 'articles-cate.edit']) ? "class=active" : ""); ?> ><a href="<?php echo e(route('articles-cate.index')); ?>"><i class="fa fa-circle-o"></i> Danh mục blog</a></li>      -->
        <?php endif; ?>    
        </ul>
       
      </li>
      <li class="treeview <?php echo e(in_array(\Request::route()->getName(), ['pages.index', 'pages.create', 'pages.edit']) ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-twitch"></i> 
          <span>Trang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo e(in_array(\Request::route()->getName(), ['pages.index', 'pages.edit']) ? "class=active" : ""); ?>><a href="<?php echo e(route('pages.index')); ?>"><i class="fa fa-circle-o"></i> Trang</a></li>
          <li <?php echo e(in_array(\Request::route()->getName(), ['pages.create']) ? "class=active" : ""); ?>><a href="<?php echo e(route('pages.create')); ?>"><i class="fa fa-circle-o"></i> Thêm trang</a></li>          
        </ul>
      </li>
       
      
      <li <?php echo e(in_array(\Request::route()->getName(), ['contact.edit', 'contact.index']) ? "class=active" : ""); ?>>
        <a href="<?php echo e(route('contact.index')); ?>">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Liên hệ</span>          
        </a>       
      </li>    
      <li <?php echo e(in_array(\Request::route()->getName(), ['banner.list', 'banner.edit', 'banner.create']) ? "class=active" : ""); ?>>
        <a href="<?php echo e(route('banner.list')); ?>">
          <i class="fa fa-file-image-o"></i> 
          <span>Banner</span>
          
        </a>       
      </li>     
     
      <li class="treeview <?php echo e(in_array(\Request::route()->getName(), ['menu.index', 'size.index', 'size.create', 'size.edit', 'thuoc-tinh.index', 'color.index', 'color.edit', 'color.create', 'account.index', 'account.edit', 'account.create']) ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa  fa-gears"></i>
          <span>Cài đặt</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo e(\Request::route()->getName() == "settings.index" ? "class=active" : ""); ?>><a href="<?php echo e(route('settings.index')); ?>"><i class="fa fa-circle-o"></i> Thông tin sites</a></li> 
          <li <?php echo e(\Request::route()->getName() == "account.index" ? "class=active" : ""); ?>><a href="<?php echo e(route('account.index')); ?>"><i class="fa fa-circle-o"></i> Users</a></li>          
        </ul>
      </li>      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<style type="text/css">
  .skin-blue .sidebar-menu>li>.treeview-menu{
    padding-left: 15px !important;
  }
</style>
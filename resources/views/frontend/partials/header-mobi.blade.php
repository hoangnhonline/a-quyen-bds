<div class="header-mobile clearfix header-mobile-sticky">
	<p class="show-menu">
		<i class="fa fa-bars" aria-hidden="true"></i> Menu
	</p>
	<h2 class="logo">
		<a href="{!! route('home') !!}" title="LAHAVA">
        	<img src="{{ URL::asset('public/assets/images/common/logo.png') }}" alt="Logo LAHAVA">
    	</a>
	</h2>
	<div class="block-adside">		
		<a href="javascript:void(0)" title="" class="Sidebar_Card">
			<?php 
			if(!empty(Session::get('products'))){
				$totalP = 0;
				foreach(Session::get('products') as $pro){
					$totalP+= $pro;
				}
			}else{
				$totalP = 0;
			}
			?>
			@if($totalP > 0)
			<span class="circle">{{ $totalP }}</span>
			@endif
			<svg class="svg-drawing icon-shop-cart" viewBox="0 0 44 44"><g fill-rule="evenodd"><path d="M3.986 12.31L2.028 37.853c-.071.927.593 1.645 1.514 1.645l26.463-.019c.936 0 1.639-.74 1.595-1.676L30.41 12.28c-.044-.972-.877-1.767-1.846-1.767H5.916c-.973 0-1.855.818-1.93 1.799zm-1.994-.152c.155-2.022 1.904-3.646 3.924-3.646h22.648c2.038 0 3.75 1.635 3.845 3.674l1.19 25.523a3.572 3.572 0 0 1-3.592 3.77l-26.464.018c-2.087.001-3.67-1.71-3.51-3.797l1.959-25.542z" fill-rule="nonzero"></path><path d="M9.95 18.333c1.502 0 2.719-1.236 2.719-2.762 0-1.525-1.217-2.761-2.719-2.761-1.5 0-2.718 1.236-2.718 2.761 0 1.526 1.217 2.762 2.718 2.762zM24.818 18.244c1.501 0 2.718-1.237 2.718-2.762 0-1.526-1.217-2.762-2.718-2.762-1.502 0-2.719 1.236-2.719 2.762 0 1.525 1.217 2.762 2.719 2.762z"></path><path d="M10.875 16.095V8.223c0-3.077 2.66-5.476 6.35-5.476 3.684 0 6.349 2.407 6.349 5.476v7.872h2V8.223C25.574 4 21.97.747 17.224.747c-4.75 0-8.35 3.246-8.35 7.476v7.872h2z" fill-rule="nonzero"></path></g></svg>
		</a>
	</div>
</div><!-- /.header-mobile -->
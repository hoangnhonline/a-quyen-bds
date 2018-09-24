@if($routeName == "home")
<div class="std">
  <div class="page-title">
    <h2>Trang chủ LAHAVA</h2>
  </div>
</div>
@endif
<div class="fullscreen-container">
@if($routeName == "home")
 <?php 
$bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
?>
@if($bannerArr)
<div class="owl-carousel slide-dsk" data-nav="false" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="true" data-loop="true">
	@foreach($bannerArr as $banner)
	<div class="item">		
	  @if($banner->ads_url !='')
      <a href="{{ $banner->ads_url }}">
      @endif
      <img alt="" src="{{ Helper::showImage($banner->image_url) }}" title="">
      @if($banner->ads_url !='')
      </a>
      @endif
	</div><!-- /.item -->
	@endforeach
	
</div><!-- /.owl-carousel .slide-dsk -->

<div class="owl-carousel slide-ip" data-nav="false" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="true" data-loop="true">
	@foreach($bannerArr as $banner)
	<div class="item">		
	  @if($banner->ads_url !='')
      <a href="{{ $banner->ads_url }}">
      @endif
      <img alt="" src="{{ Helper::showImage($banner->ipad_url) }}" title="">
      @if($banner->ads_url !='')
      </a>
      @endif
	</div><!-- /.item -->
	@endforeach
</div><!-- /.owl-carousel .slide-ip -->

<div class="owl-carousel slide-mb" data-nav="false" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="true" data-loop="true">
	@foreach($bannerArr as $banner)
	<div class="item">		
	  @if($banner->ads_url !='')
      <a href="{{ $banner->ads_url }}">
      @endif
      <img alt="Slide LAHAVA" src="{{ Helper::showImage($banner->mobile_url) }}" title="Slide LAHAVA">
      @if($banner->ads_url !='')
      </a>
      @endif
	</div><!-- /.item -->
	@endforeach
</div><!-- /.owl-carousel slide-mb -->
@endif
  @endif
  <div class="more_info">
    <div class="links_categories clearfix">
    	<div class="pull-left">
			<ul class="link-pages">
				<li data-toggle="tooltip" data-placement="top" title="Liên hệ với chúng tôi"><a href="{{ route('pages', 'contacts') }}" title="Liên hệ với chúng tôi"><i class="fa fa-map-marker"></i></a></li>
				<li data-toggle="tooltip" data-placement="top" title="C&aacute;ch l&#7845;y s&#7889; &#273;o"><a href="/huong-dan-lay-so-do" title="C&aacute;ch l&#7845;y s&#7889; &#273;o"><i class="fa fa-male"></i>

</a></li>
				<li data-toggle="tooltip" data-placement="top" title="Thông tin" class="Sidebar_Tab"><i class="fa fa-info-circle"></i></li>
				<li data-toggle="tooltip" data-placement="top" title="Tư vấn - báo giá"><a href="{{ route('tuvan') }}" title=""><i class="fa fa-comments"></i></a></li>				
			</ul>
    	</div>
    	<div class="pull-right">
    		<ul class="link-pages">
				<li class="block-hotline dropup">
					<span class="border"></span>
					<div class="parents dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-phone-square"></i>
						<span>(028)6 2772777</span>
					</div>
					<ul class="dropdown-menu dropdown-menu-phone">
						<li>
							<a href="tel:0942926456" title="0942 926 456">
								<span class="red">Hotline 1</span>
								<span class="fontBold">0942 926 456</span>
							</a>
						</li>
						<li>
							<a href="tel:0975997567" title="0975 997 567">
								<span class="red">Holine 2</span>
								<span class="fontBold">0975 997 567</span>
							</a>
						</li>
						
					</ul>
				</li>
				
				<li class="Sidebar_Card block-hotline">
					<span class="border"></span>
					<a href="javascript:void(0)" title="">
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
						<span class="circle order_total_quantity">
						{{ $totalP }}</span>
						@endif
						<i class="fa fa-shopping-basket"></i>
					</a>
				</li>
			</ul>
    	</div>
    </div>
</div><!-- /.more_info -->
</div>


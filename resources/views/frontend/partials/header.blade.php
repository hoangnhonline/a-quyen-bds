<header class="header">
	<div class="header-container">
		<div class="header-sidebar">
			<span class="iconClose-sidebar">
				<img src="{{ URL::asset('public/assets/images/common/close2.png') }}" alt="">
			</span><!-- /.iconClose-sidebar -->
			<h1 class="logo">
				<strong>LAHAVA</strong>
				<a href="{!! route('home') !!}" title="LAHAVA" class="logo">
                	<img src="{{ URL::asset('public/assets/images/common/logo.png') }}" alt="Logo LAHAVA">
            	</a>
        	</h1><!-- /.logo -->
        	<div class="block-addmb">
        		<div class="clearfix">
    				<!--<div class="block-addmb_select">
    					<span>
                			<select name="">
                				<option value="">VI</option>
                				<option value="">EN</option>
                			</select>
                		</span>
                		<span>
                			<select name="">
                				<option value="">VNĐ</option>
                				<option value="">USD</option>
                			</select>
                		</span>
    				</div>-->
            		<form class="search_mb" action="{{ route('search') }}" method="GET">
					    <div class="">
					        <input id="search" type="text" name="keyword" value="{!! isset($tu_khoa) ? $tu_khoa : "" !!}" class="input-text" maxlength="128" autocomplete="off" placeholder="Tìm kiếm..">
					        <button type="submit" title="Tìm" class="button"><i class="fa fa-search"></i></button>
					    </div>
					</form>
        		</div>
        	</div><!-- /.block-addmb -->
        	<div class="box-scroll">
        		<div class="nav-container">
				    <a id="mobnav">Menu</a>
				    <ul id="nav" class="default">
				        @foreach($loaiSpList as $loaiSp)
				        <li class="level0 Francois @if(isset($parent_id) && $parent_id == $loaiSp->id) open @endif">
				        	<a href="{{ route('cate-parent', [$loaiSp->slug]) }}" title="{!! $loaiSp->name !!}">{!! $loaiSp->name !!}</a>
				        	@if(!empty($cateArrByLoai[$loaiSp->id]))
				        	<ul class="level0 submenu ">
				        		@foreach($cateArrByLoai[$loaiSp->id] as $cate)
								<li class="level1 @if(isset($cate_id) && $cate_id == $cate->id) open @endif"><a href="{{ route('cate-parent', [$cate->slug]) }}">{!! $cate->name !!}</a></li>
								@endforeach
							</ul>
							@endif
				        </li>
				        @endforeach
				        <li class="level0 Francois @if($routeName == "thanh-ly") open @endif">
				        	<a href="{{ route('thanh-ly') }}" title="Thanh lý">Thanh lý</a>
				        </li>
				       
				    </ul>
				</div>
				<form id="search_mini_form" action="{{ route('search') }}" method="GET">
				    <div class="form-search clearfix">
				        <input id="search" type="text" name="keyword" value="{!! isset($tu_khoa) ? $tu_khoa : "" !!}" class="input-text" maxlength="128" autocomplete="off" placeholder="Tìm kiếm..">
				        <button type="submit" title="Tìm" class="button"><i class="fa fa-search"></i></button>
				    </div>
				</form>
				<ul class="special_menu special_menu_mb clearfix">
					<li><a href="{{ route('hd-sodo') }}" title="Hướng dẫn số đo">Hướng dẫn lấy số đo</a></li>
					<li><a href="/tu-van-bao-gia" title="">Tư vấn / Báo giá</a></li>
				</ul>
				<ul class="special_menu clearfix">
					<li><a href="{{ route('customer-service') }}" title="Cách mua hàng">Cách mua hàng</a></li>
					<li><a href="{{ route('pages', 'about-lahava') }}" title="Giới thiệu">Giới thiệu</a></li>
					<li><a href="{{ route('customer-service') }}" title="">Thanh to&aacute;n</a></li>
					<li><a href="{{ route('pages', '/tu-van-bao-gia') }}" title="Liên hệ">Liên hệ</a></li>
					<li><a href="customer-service" title="">Giao hàng</a></li>
					<li><a href="{{ route('pages', 'tuyen-dung') }}" title="">Jobs</a></li>
					<li><a href="customer-service" title="">Đổi trả</a></li>
					<li><a href="{{ route('blog') }}" title="Blog">Blog</a></li>
				</ul>
        	</div><!-- /.box-scroll -->
        	<div class="social-icons social-iconsdk">
			    <a target="_blank" href="https://www.facebook.com/Lahava.vn" title="Facebook" class="facebook-icon">
			    	<i class="fa fa-facebook"></i>
			    </a>
			    <a target="_blank" href="https://www.instagram.com/lahavaofficial/" title="Instagram" class="instagram-icon">
			    	<i class="fa fa-instagram"></i>
			    </a>
			    <a target="_blank" href="https://www.pinterest.com/LahavaVietnam/" title="Pinterest" class="pinterest-icon">
			    	<i class="fa fa-pinterest"></i>
			    </a>
			    <a target="_blank" href="#" title="Youtube" class="youtube-icon">
			    	<i class="fa fa-youtube-play"></i>
			    </a>
			    <a target="_blank" href="https://plus.google.com/+LahavaVN" title="Googleplus" class="googleplus-icon">
			    	<i class="fa fa-google-plus"></i>
			    </a>
			    <a target="_blank" href="#" title="Twitter" class="twitter-icon">
			    	<i class="fa fa-twitter"></i>
			    </a>
			</div><!-- /.social-icons social-iconsdk -->
			<div class="block-address-mb text-center">
				<p>
					<a href="{{ route('home') }}">
						<h3>LAHAVA</h3>
					</a>
				</p>
84 Nguyễn Văn Trỗi, Phường 8, Phú Nhuận, HCM</br>
				
					<a href="tel:02862772777" title="">(028)6 2772777</a>
					&nbsp;&nbsp;
					<a href="tel:0942926456" title="">0942 926 456</a>
					&nbsp;&nbsp;
					<a href="tel:0975997567" title="">0975 997 567</a></br>
					<a href="mailto:lananhthoitrang@gmail.com">lananhthoitrang@gmail.com</a></br>
				T2-T7:9:00 - 21:00 / CN : 9:00 - 19:00</br>
				Than phiền: 0939 333 406</br></br>
				<div class="social-icons">
				    <a target="_blank" href="#" title="Facebook" class="facebook-icon">
				    	<i class="fa fa-facebook"></i>
				    </a>
				    <a target="_blank" href="#" title="Instagram" class="instagram-icon">
				    	<i class="fa fa-instagram"></i>
				    </a>
				    <a target="_blank" href="#" title="Pinterest" class="pinterest-icon">
				    	<i class="fa fa-pinterest"></i>
				    </a>
				    <a target="_blank" href="#" title="Youtube" class="youtube-icon">
				    	<i class="fa fa-youtube-play"></i>
				    </a>
				    <a target="_blank" href="#" title="Googleplus" class="googleplus-icon">
				    	<i class="fa fa-google-plus"></i>
				    </a>
				    <a target="_blank" href="#" title="Twitter" class="twitter-icon">
				    	<i class="fa fa-twitter"></i>
				    </a>
				</div><!-- /.social-icons social-iconsdk -->
			</div>
			<div class="copyrights">LAHAVA © 2018  -  SINCE 2008</div>
		</div>
	</div>
</header><!-- /.header -->
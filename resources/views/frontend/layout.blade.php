<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="vn">
<head>
	<title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="content-language" content="vi"/>
    <meta name="description" content="@yield('site_description')"/>
    <meta name="keywords" content="@yield('site_keywords')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>    
    <meta property="article:author" content="https://www.facebook.com/Lahava.vn"/>
    <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
    <link rel="canonical" href="{{ url()->current() }}"/>        
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('site_description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="lahava.vn" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="@yield('site_description')" />
    <meta name="twitter:title" content="@yield('title')" />     
    <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
	<link rel="icon" href="{{ URL::asset('public/assets/images/favicon.ico') }}" type="image/x-icon">

	<!-- ===== Style CSS ===== -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/assets/css/style.css') }}">
	<!-- ===== Responsive CSS ===== -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/assets/css/responsive.css') }}">

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<link href='css/animations-ie-fix.css' rel='stylesheet'>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="@if($routeName == 'home') home sidebar-open @else pageChild @endif">
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" id="tb" data-toggle="modal" data-target="#myModal" style="display:none;"></button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4>TH&Ocirc;NG B&Aacute;O NGH&#7880; L&#7876;</h4>
      </div>
      <div class="modal-body">
        
<p>
	&#272;&#7875; ch&agrave;o m&#7915;ng l&#7877; 30/4 v&agrave; 1/5. LAHAVA xin ph&eacute;p t&#7841;m ng&#432;ng ph&#7909;c v&#7909; trong 3 ng&agrave;y (29/04 - 01/05).<br />
	Ch&uacute;c qu&yacute; kh&aacute;ch c&oacute; k&#7923; ngh&#7881; l&#7877; vui v&#7867; v&agrave; h&#7841;nh ph&uacute;c!
</p>

      </div>      
    </div>

  </div>
</div>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-18743263-14"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-18743263-14');
</script>
	
<div class="sidebar-overlay"></div>
	<div class="wrapper">
		<div class="page">
			
			@include('frontend.partials.header-mobi')

			@include('frontend.partials.header')			

			<div class="main-container">
				<div class="main">
					<div class="col-main">
						@yield('content')						
						@include('frontend.partials.footer')
					</div><!-- /.col-main -->
				</div>
			</div><!-- /.main-container -->

			@include('frontend.partials.so-do')
			@include('frontend.partials.cart')

		</div>
		<a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
      		<span class="toTop-arrow"></span>
      		<span class="toTop-stick"></span>
    	</a>
	</div><!-- /wrapper -->
	<input type="hidden" id="route-add-to-cart" value="{{ route('add-product') }}" />
	<input type="hidden" id="route-payment" value="{{ route('payment') }}" />
	<input type="hidden" id="route-short-cart" value="{{ route('short-cart') }}" />
	<input type="hidden" id="route-update-product" value="{{ route('update-product') }}" />
	<!-- ===== JS ===== -->
	<script src="{{ URL::asset('public/assets/js/jquery.min.js') }}"></script>
	<!-- ===== JS Bootstrap ===== -->
	<script src="{{ URL::asset('public/assets/lib/bootstrap/bootstrap.min.js') }}"></script>
	<!-- carousel -->
	<script src="{{ URL::asset('public/assets/lib/carousel/owl.carousel.min.js') }}"></script>
	<!-- sticky -->
    <script src="{{ URL::asset('public/assets/lib/sticky/jquery.sticky.js') }}"></script>
    <!-- Js Common -->
	<script src="{{ URL::asset('public/assets/js/common.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery-ui-1.9.2.min.js') }}"></script>
	<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>-->
	<script type="text/javascript">
		$(function () {
			$.ajaxSetup({
			      headers: {
			          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      }
			  });
			$('[data-toggle="tooltip"]').tooltip();
			//if($.cookie("close") == undefined){
				//$('#tb').click();
			//}						
			//$("#myModal").on("hidden.bs.modal", function () {
			  //  $.cookie("close", 1, { expires: 7 });
			//});
		})

	</script>
	@yield('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('change', '.change_quantity', function() {
		        var quantity = $(this).val();
		        var id = $(this).data('id');
		        update_product_quantity(id, quantity, 'ajax');
		    });		
		    $(document).on('click', '.del_item', function() {
		    	if(confirm('Quý khách chắc chắn muốn xóa sản phẩm này?')){
		    		var id = $(this).data('id');
			        $(this).parents('.shop-cart-item').remove();
			        update_product_quantity(id, 0, 'ajax');	
		    	}
		        
		    });
		    $('.Sidebar_Card').on('click', function() {
		       $(this).addClass('active');
			   $('body').addClass('Rightsidebar');
		       $.ajax({
		            url: $('#route-short-cart').val(),
		            method: "GET",

		            success: function(data) {
		                $('#showSidebar_Card').addClass('active');
		                $('#showSidebar_Card').html(data);
		                calTotalProduct();
		                
		            }
		        });	
			   
			   
			});
		});
		function calTotalProduct() {
		    var total = 0;
		    $('.change_quantity ').each(function() {
		        total += parseInt($(this).val());
		    });
		    $('.order_total_quantity').html(total);
		}
		function update_product_quantity(id, quantity, type) {
		    $.ajax({
		        url: $('#route-update-product').val(),
		        method: "POST",
		        data: {
		            id: id,
		            quantity: quantity
		        },
		        success: function(data) {
		            $.ajax({
		                url: $('#route-short-cart').val(),
		                method: "GET",

		                success: function(data) {
		                    if (type == 'ajax') {
		                        $('#showSidebar_Card').html(data);
		                       	calTotalProduct();
		                    } else {
		                        window.location.reload();
		                    }
		                }
		            });
		        }
		    });
		}
	</script>
<div class="block-menumb-fixed">
			
	<a href="/customer-service">C&aacute;ch mua h&agrave;ng</a>
	<a href="/huong-dan-lay-so-do">c&aacute;ch &#273;o</a>
	<a href="/tu-van-bao-gia">T&#432; v&#7845;n / B&aacute;o gi&aacute;</a>
	<a href="/blog">blog</a>
			
</div>
<style type="text/css">
/*
	.modal {
  text-align: center;
}

@media screen and (min-width: 768px) { 
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
*/
</style>
</body>
</html>
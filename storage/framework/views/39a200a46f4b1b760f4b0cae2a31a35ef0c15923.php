<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="vn">
<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="content-language" content="vi"/>
    <meta name="description" content="<?php echo $__env->yieldContent('site_description'); ?>"/>
    <meta name="keywords" content="<?php echo $__env->yieldContent('site_keywords'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>    
    <meta property="article:author" content="https://www.facebook.com/Lahava.vn"/>
    <link rel="shortcut icon" href="<?php echo $__env->yieldContent('favicon'); ?>" type="image/x-icon"/>
    <link rel="canonical" href="<?php echo e(url()->current()); ?>"/>        
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>" />
    <meta property="og:description" content="<?php echo $__env->yieldContent('site_description'); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:site_name" content="lahava.vn" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="<?php echo e(Helper::showImage($socialImage)); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('site_description'); ?>" />
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title'); ?>" />     
    <meta name="twitter:image" content="<?php echo e(Helper::showImage($socialImage)); ?>" />
    <link rel="icon" href="<?php echo e(URL::asset('public/assets/images/favicon.ico')); ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/css/reset.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/css/slick.css')); ?>">
</head>
<body <?php if($routeName == 'home'): ?> class="home" <?php endif; ?>>
    <!-- header -->
    <div id="header">
        <div class="header-contact">
            <div class="container clearfix">
                <div class="header-tel">
                    <ul class="list-unstyled">
                        <li class="mailto hidden-xs"><a href="mailto:<?php echo $settingArr['email_header']; ?>"><?php echo $settingArr['email_header']; ?></a></li>
                        <li class="tel"><a href="tel:<?php echo $settingArr['hotline']; ?>"><?php echo $settingArr['hotline']; ?></a></li>
                    </ul>
                </div>
                <div class="header-connect">
                    <ul class="list-unstyled clearfix">
                        <li class="text-connect">Kết nối với chúng tôi</li>
                        <li><a target="_blank" href="<?php echo $settingArr['facebook_fanpage']; ?>"><img src="<?php echo e(URL::asset('public/assets/images/icon_face.png')); ?>" alt=""></a></li>
                        <li><a target="_blank" href="<?php echo $settingArr['link_twitter']; ?>"><img src="<?php echo e(URL::asset('public/assets/images/icon_twitter.png')); ?>" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <h1 class="main-logo"><a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(URL::asset('public/assets/images/logo.png')); ?>" alt="Bat dong san dong sai gon"></a></h1>
            <div class="mnu-sp visible-xs"></div>
            <span class="sp-style">
                <nav class="main-nav">
                    <ul class="list-unstyled clearfix">
                        <li <?php if($routeName == 'home'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
                        <li <?php if($routeName == 'pages'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('pages', 'gioi-thieu-bat-dong-san-dong-sai-gon')); ?>">Giới thiệu</a></li>
                        <li <?php if($routeName == 'can-ho'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('can-ho')); ?>">Căn hộ</a></li>
                        <li class="scrollToContact"><a href="javascript:;" class="contact-link">Liên hệ</a></li>
                    </ul>
                </nav>
            </span>
        </div>
    </div><!-- End header -->
    <?php if($bannerList->count() > 0): ?>
    <div class="banner">
        <?php $i = 0; ?>
        <?php foreach($bannerList as $banner): ?>
         <?php $i++; ?>        
            <?php if($banner->ads_url !=''): ?>
            <a href="<?php echo e($banner->ads_url); ?>">
            <?php endif; ?>
                <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner <?php echo e($i); ?>">
            <?php if($banner->ads_url !=''): ?>
            </a>
            <?php endif; ?>        
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
    <div class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="info-contact">
                    <div class="body-info">
                        <img src="<?php echo e(URL::asset('public/assets/images/logo_contact.png')); ?>" alt="Logo batdongsandongsaigon.com">
                        <h3>Về chúng tôi</h3>
                        <div class="us-body-desc">
                            <p>Chúng tôi đã giúp hàng trăm khách hàng tìm được căn hộ như ý. Với quỹ đa dạng nhất thị trường, Chúng tôi tự tin sẽ giúp bạn thực hiện được giấc mơ sỡ hữu BDS, Căn hộ và tối ưu hiệu quả đầu tư</p>
                        </div>
                        <p class="text-tel">Hãy liên hệ với chúng tôi ngay hôm nay:</p>
                        <p class="contact-tel">0908.195.468</p>
                    </div>
                </div>
                <div class="form-contact" id="contact">
                    <div class="form-body">
                        <h2 class="title-form">Đăng ký nhận thông tin dự án</h2>
                    
                        <?php if(Session::has('message')): ?>
                        <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
                        <?php endif; ?>                        
                        <form method="POST" action="<?php echo e(route('send-contact')); ?>">
                             <?php if(count($errors) > 0): ?>
                              <div class="alert alert-danger">
                                <ul>                           
                                    <li>Vui lòng nhập đầy đủ thông tin hợp lệ.</li>                            
                                </ul>
                              </div>
                            <?php endif; ?>  
                            <?php echo e(csrf_field()); ?>

                            <input type="text" class="<?php if($errors->has('full_name')): ?> error <?php endif; ?>" placeholder="Tên của bạn" name="full_name" id="full_name" value="<?php echo e(old('full_name')); ?>">
                            <input type="email" class="<?php if($errors->has('email')): ?> error <?php endif; ?>" placeholder="Địa chỉ email của bạn" name="email" id="email" value="<?php echo e(old('email')); ?>">
                            <input type="text" class="<?php if($errors->has('phone')): ?> error <?php endif; ?>" placeholder="Số điện thoại liên hệ" name="phone" id="phone" value="<?php echo e(old('phone')); ?>">
                            <textarea class="<?php if($errors->has('content')): ?> error <?php endif; ?>" placeholder="Nội dung yêu cầu..." name="content" id="content"><?php echo e(old('content')); ?></textarea>
                            <p class="text-center"><button id="btnSend" type="submit">Gửi</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container clearfix">
            <nav class="menu-footer">
                <ul class="list-unstyled clearfix">
                    <li class="active"><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
                    <li><a href="<?php echo e(route('pages', 'gioi-thieu-bat-dong-san-dong-sai-gon')); ?>">Giới thiệu</a></li>
                    <li><a href="<?php echo e(route('can-ho')); ?>">Căn hộ</a></li>
                    <li><a href="javascript:;" class="contact-link">Liên hệ</a></li>
                </ul>
            </nav>
            <p>Phát triển bởi BDS Dong Sai Gon<span> &nbsp; &nbsp;Truy cập hôm nay:</span> <?php echo e(number_format(Helper::view(1, 3, 1))); ?> &nbsp; &nbsp; <span>Tổng lượt truy cập:</span> <?php echo e(number_format(Helper::view(1, 3))); ?></p>
        </div>
    </div><!-- End Footer -->
    <div class="toTop">
        <img src="<?php echo e(URL::asset('public/assets/images/totop.png')); ?>" alt="">
    </div>
	<div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon">
        <div class="phonering-alo-ph-circle"></div>
        <div class="phonering-alo-ph-circle-fill"></div>
        <a href="tel:+84938399647" class="pps-btn-img" title="Liên hệ">
            <div class="phonering-alo-ph-img-circle"></div>
            <p>0938.399.647</p>
        </a>
    </div>
    <!-- SCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo e(URL::asset('public/assets/js/atgNav.slick.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            //menu mobile
            $('.mnu-sp').on('click',function () {
                if(!$(this).hasClass('active')) {
                    $(this).addClass('active');
                    $('.main-nav').slideDown();
                } else {
                    $(this).removeClass('active');
                    $('.main-nav').slideUp();
                }
            });

            $('.scrollToContact').on('click',function () {
                $('html,body').animate({
                    scrollTop: $("#contact").offset().top
                }, 'slow');
            });
            <?php if(Session::has('message') || count($errors) > 0): ?>
            $('html,body').animate({
                scrollTop: $("#contact").offset().top
            }, 'slow');
            <?php endif; ?>
            var w = $(window).width();
            if(w<=1024) {
                $(window).scroll(function() {
                    if ($(this).scrollTop() != 0) {
                        $('.toTop').fadeIn();
                    } else {
                        $('.toTop').fadeOut();
                    }
                });

                $('.toTop').click(function() {
                    $('body,html').animate({ scrollTop: 0 }, 800);
                });
            }
            $('.contact-link').click(function(){
                $('html, body').animate({
                    scrollTop: $("#contact").offset().top
                }, 500);
                $('#full_name').focus();
            });
        })
    </script>
    <?php echo $__env->yieldContent('javascript'); ?>
</body>
</html>
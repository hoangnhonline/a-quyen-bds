@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=567408173358902";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
  return t;
}(document, "script", "twitter-wjs"));</script>
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li><a href="{{ route('can-ho') }}">Căn hộ</a></li>
            <li class="active">{!! $detail->title !!}</li>
        </ul>
    </div>
</div>
<div class="main">
    <div class="container">
        <div class="top-house-detail">
            <div class="row clearfix">
                <div class="img-effect">
                	@if($detail->images->count() > 0 )
                    <ul class="list-unstyled">
                    	<?php $i = 0; ?>
                    	@foreach($detail->images as $img)
                    	<?php $i++; ?>
                        <li><img src="{{ Helper::showImage($img->image_url) }}" alt="ảnh {!! $detail->title !!} {{ $i }}"></li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="block block-share" id="share-buttons" style="margin-bottom:10px">
                        <div class="share-item">
                            <div class="fb-like" data-href="{{ url()->current() }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                        </div>
                        <div class="share-item" style="max-width: 65px;">
                            <div class="g-plus" data-action="share"></div>
                        </div>
                        <div class="share-item">
                            <a class="twitter-share-button"
                          href="https://twitter.com/intent/tweet?text={!! $detail->title !!}">
                        Tweet</a>
                        </div>
                        <div class="share-item">
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    </div><!-- /block-share-->
                </div>
                <div class="info-real-estate">
                    <h2 class="page-title">{!! $detail->title !!}</h2>
                    <div class="scrollbar-inner">                      
                        {!! $detail->description !!}                                         
                    </div>

                    <p class="tel-contact">{!! $detail->contact !!}</p>
                </div>
            </div>
        </div>

        <div class="detail-build">
            <div class="tab-build clearfix">
                <a class="detail-tab active" href="javascript:void (0)">Chi tiết dự án</a>
                <ul class="list-unstyled tab-scroll-to" id="ul-content">
                    <li><a href="javascript:;" data-ref="vi-tri">Vị trí</a></li>
                    <li><a href="javascript:;" data-ref="tien-ich">Tiện ích</a></li>
                    <li><a href="javascript:;" data-ref="mat-bang">Mặt bằng</a></li>
                    <li><a href="javascript:;" data-ref="tien-do">Tiến độ</a></li>
                </ul>
                <a class="another-house-tab" href="javascript:void (0)">Các dự án khác</a>
            </div>
            <div class="tab-content">
                <div class="tab-detail-house">                	
                    <div id="vi-tri">
                        {!! str_replace("[Caption]", "", $detail->position) !!}    
                    </div>
                    <div id="tien-ich">
                        {!! str_replace("[Caption]", "", $detail->utilities) !!}    
                    </div>
                    <div id="mat-bang">
                        {!! str_replace("[Caption]", "", $detail->ground) !!}    
                    </div>
                    <div id="tien-do">
                        {!! str_replace("[Caption]", "", $detail->process) !!}    
                    </div>
                </div>
                <div class="tab-another-house">
                    <div class="real-estate">
                        <div class="row clearfix">
                            @if($otherList->count() > 0)
                                @foreach($otherList as $articles)
                                <div class="col-sm-3">
                                    <a href="{{ route('detail', $articles->slug) }}">
                                        <img src="{{ ($articles->thumbnail) ? Helper::showImageThumb($articles->thumbnail->image_url ) :  '' }}" alt="{!! $articles->title !!}">
                                        <h2 class="title-obj">{!! $articles->title !!}</h2>
                                        <div class="desc">{!! $articles->about !!}</div>
                                    </a>
                                </div>
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div><!-- End main -->
<style type="text/css">
.block-share .share-item {
    display: inline-block;
    vertical-align: top;
    line-height: initial;
}
.slick-dots{
    display: none !important;
}
</style>
@stop
@section('javascript')
<script src="{{ URL::asset('public/assets/js/jquery.scrollbar.js') }}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59b215c2a2658a8a"></script>  
    <script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.scrollToContact').on('click',function () {
            $('html,body').animate({
                scrollTop: $("#contact").offset().top
            }, 'slow');
        });
        $('.another-house-tab').on('click', function () {
            $('.tab-detail-house,.tab-scroll-to').hide();
            $('.detail-tab').removeClass('active');
            $(this).addClass('active');
            $('.tab-another-house').show();
        });
        $('.detail-tab').on('click', function () {
            $('.tab-detail-house').show();
            $('.tab-scroll-to').css('display','inline-block');
            $(this).addClass('active');
            $('.another-house-tab').removeClass('active');
            $('.tab-another-house').hide();
        });

        $('.scrollbar-inner').scrollbar();
        $('#ul-content li a').click(function(){
            var obj = $(this);
            $('html, body').animate({
                scrollTop: $("#" + obj.data('ref')).offset().top
            }, 500);            
        });
	});
</script>
@stop
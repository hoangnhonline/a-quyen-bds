@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Căn hộ</a></li>
            <li class="active">Căn hộ chi tiết</li>
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
                </div>
                <div class="info-real-estate">
                    <h2 class="page-title">{!! $detail->title !!}</h2>
                    <div class="scrollbar-inner">                      
                        {!! $detail->description !!}                                         
                    </div>

                    <p class="tel-contact">Phòng kinh doanh chủ đầu tư : <strong>0909.869.292</strong> (Mr. Lân)</p>
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
                                        <img src="{{ Helper::showImageThumb($articles->thumbnail->image_url ) }}" alt="{!! $articles->title !!}">
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
@stop
@section('javascript')
<script src="{{ URL::asset('public/assets/js/jquery.scrollbar.js') }}"></script>
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
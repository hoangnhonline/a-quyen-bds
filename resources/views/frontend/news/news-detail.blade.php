@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="container">
    <div class="block-main">
        <div class="ban-ner">
            <img src="{{ $detail->image_url ? Helper::showImage($detail->image_url) : URL::asset('assets/images/no-img.png') }}" alt="">
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="block-blog">
                    <div class="blog-wrapper">
                        <h1 class="blogTitle">{!! $detail->title !!}</h1>
                        <p class="cateblog">
                            <span class="catename">{!! $detail->cates->name !!}</span>
                            <span class="catetime">{{ date('d/m/Y', strtotime($detail->created_at)) }}</span>
                        </p>
                        <div class="blogContent">
                            {!! $detail->content !!}
                            @if($tagSelected->count() > 0)
                            
<p style="padding: 7px; background-color:#dedede; color: #fff;">
	<a href="/tu-van-bao-gia">G&#7916;I M&#7850;U / T&#431; V&#7844;N / B&Aacute;O GI&Aacute; &#9658;</a>
</p>

<ul class="block-tags">
                                <li class="img"><i class="fa fa-tags"></i></li>                                    
                                @foreach($tagSelected as $tag)                                
                                <li class="txt">
                                    <a href="{{ (route('tag', urlencode($tag->name))) }}" title="{!! $tag->name !!}">{!! $tag->name !!}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            <div class="block-post-share cf">
                                <a href="#" class="cf service facebook" target="_blank" title="Share on Facebook">
                                    <i class="fa fa-facebook"></i>
                                    <span class="label">Share on Facebook</span>
                                </a>
                                <a href="#" class="cf service twitter" target="_blank" title="Share on Twitter">
                                    <i class="fa fa-twitter"></i>
                                    <span class="label">Share on Twitter</span>
                                </a>
                                <a href="#" class="cf service gplus" target="_blank" title="Google+">
                                    <i class="fa fa-google-plus"></i>
                                    <span class="label">Google+</span>
                                </a>
                                <a href="#" class="cf service pinterest" target="_blank" title="Pinterest">
                                    <i class="fa fa-pinterest"></i>
                                    <span class="label">Pinterest</span>
                                </a>
                                <a href="#" class="cf service linkedin" target="_blank" title="LinkedIn">
                                    <i class="fa fa-linkedin"></i>
                                    <span class="label">LinkedIn</span>
                                </a>
                                <a href="#" class="cf service email" target="_blank" title="Tumblr">
                                    <i class="fa fa-tumblr"></i>
                                    <span class="label">Tumblr</span>
                                </a>
                                <a href="#" class="cf service email" target="_blank" title="Email">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label">Email</span>
                                </a>
                                <a href="javascript:void(0)" class="show-more"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="block block-articles block-articles-relative">
                            <h2 class="block-title">Bài liên quan</h2>
                            <div class="row">
                                <div class="block-content">
                                    <ul class="list">
                                        @foreach( $otherArr as $articles)
                                        <li class="col-sm-6 col-xs-6">
                                            <div class="img">
                                                <a href="{{ route('news-detail', ['slug' => $articles->slug]) }}"><img src="{{ $articles->image_url ? Helper::showImage($articles->image_url) : URL::asset('assets/images/no-img.png') }}" alt="{!! $articles->title !!}" title="{!! $articles->title !!}"></a>
                                            </div>
                                            <div class="des">
                                                <a href="{{ route('news-detail', ['slug' => $articles->slug]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a>
                                            </div>
                                        </li>   
                                        @endforeach                                                           
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.news.sidebar')
        </div>
    </div>
    @include('frontend.partials.footer-2')                     
</div>
@stop  

@extends('frontend.layout')  
@include('frontend.partials.meta')
@section('content')
<div class="container">
	<div class="block-main">
		<div class="ban-ner">
			<img src="{{ isset($cateDetail) ? Helper::showImage($cateDetail->image_url) : URL::asset('assets/images/ban-ner.png')  }}" alt="{{ isset($cateDetail) ? $cateDetail->name : "Blog" }}">
		</div>
		@if(isset($is_tag) && $is_tag == 1)
		<h3 style="margin-bottom: 15px">Tag : "{{ urldecode($name ) }}"</h3>
		@endif
		<p class="count-item">{{ $articlesList->total() }} bài viết</p>
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<div class="block-blog">
					<ul class="blog-grid blog">
						@foreach( $articlesList as $articles )
						<li class="blog-item">							
							<a href="{{ route('news-detail', ['slug' => $articles->slug]) }}" title="{!! $articles->title !!}" class="blog-img">
								<img src="{{ $articles->image_url ? Helper::showImage($articles->image_url) : URL::asset('assets/images/no-img.png') }}" alt="{!! $articles->title !!}">
							</a>
							<p class="cateblog">
								<span class="catename">{!! $articles->cates->name !!}</span>
								<span class="catetime">{{ date('d/m/Y', strtotime($articles->created_at)) }}</span>
							</p>
							<h2 class="blog-title">
								<a href="{{ route('news-detail', ['slug' => $articles->slug]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a>
							</h2>
							<div class="blog-description">{!! $articles->description !!}</div>
						</li><!-- /.blog-item" -->
						@endforeach
					</ul>
				</div>
				<div style="display:none;">            
		            {{ $articlesList->links() }}
		        </div>
		        @if($articlesList->total() > 0)
		        <div class="product-viewmore">
		            <button type="button" id="btnMore">Xem thêm</button>
		        </div>
		        @endif
			</div>
			@include('frontend.news.sidebar')
		</div>
	</div>
	@include('frontend.partials.footer-2')
</div>					
@stop
@section('js')
<script type="text/javascript">

        (function($) {
            "use strict";
            @if($page >= $articlesList->lastPage())
            $('#btnMore').hide();
            @endif
        })(jQuery);
       
    </script>


@stop
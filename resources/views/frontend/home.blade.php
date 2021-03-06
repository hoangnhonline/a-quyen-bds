@extends('frontend.layout')
@include('frontend.partials.meta')  
@section('content')
<div class="main">
    <div class="container">
        <div class="real-estate">
		    <div class="row clearfix" id="can-ho">
		        @if($articlesList->count() > 0)
		            @foreach($articlesList as $articles)
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
</div><!-- End main -->
@stop
@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="container">
    <div class="block-main">
    	<h2 class="page_title">{!! $detailPage->title !!}</h2>
        {!! $detailPage->content !!}
    </div>
    @include('frontend.partials.footer-2')    
</div><!-- /container-->
@endsection  

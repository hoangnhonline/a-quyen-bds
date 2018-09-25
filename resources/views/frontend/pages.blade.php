@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="{{ route('home') }}">Trang chủ</a></li>            
            <li class="active">{!! $detail->title !!}</li>
        </ul>
    </div>
</div>
<div class="main">
    <div class="container">
        <div class="page-title">Về chúng tôi</div>
        {!! str_replace("[Caption]", "", $detail->content) !!}
    </div>    
</div><!-- End main -->
@stop
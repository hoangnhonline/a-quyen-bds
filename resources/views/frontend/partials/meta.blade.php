@section('title'){!! $seo['title'] !!}@stop
@section('site_description'){!! $seo['description'] !!}@stop
@section('site_keywords'){!! $seo['keywords'] !!}@stop
@section('site_name'){!! $settingArr['site_name'] !!}@stop
@section('favicon'){!! Helper::showImage($settingArr['favicon']) !!}@stop
@section('logo'){!! Helper::showImage($settingArr['logo']) !!}@stop
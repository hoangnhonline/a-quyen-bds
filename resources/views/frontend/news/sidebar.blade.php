<div class="col-sm-4 col-xs-12">
  <div class="sidebar">
    <div class="block block-categories">
      <h2 class="block-title">Danh mục Blog</h2>
      <div class="block-comtent">
        <ul class="list">
          @foreach($articlesCate as $cateA)
          <li><a href="{{ route('news-cate', [$cateA->slug]) }}" title="{!! $cateA->name !!}">{!! $cateA->name !!}</a></li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="block block-articles">
      <h2 class="block-title">Bài viết mới</h2>
      <div class="block-content">
        <ul class="list">
          @foreach( $newArr as $articles)
          <li>
              <div class="img">
                  <a href="{{ route('news-detail', ['slug' => $articles->slug]) }}" title="{!! $articles->title !!}"><img src="{{ $articles->image_url ? Helper::showImage($articles->image_url) : URL::asset('assets/images/no-img.png') }}" title="{!! $articles->title !!}" alt="{!! $articles->title !!}"></a>
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
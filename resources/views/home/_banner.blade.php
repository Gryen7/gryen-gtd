<div class="tar-index-slider hidden-xs">
    <ul class="swiper-wrapper">
        @foreach($banners as $banner)
            <li class="swiper-slide clearfix">
                <div class="t-index-sldtxtbx pull-left">
                    <div class="t-index-sldtxt">
                        <a href="{{ action('ArticlesController@show', ['id' => $banner->article_id]) }}"> {{ $banner->article_title }}</a>
                        <hr>
                        <div class="t-index-slddesc">{{ $banner->article_description }}</div>
                    </div>
                </div>
                <div class="t-index-sldimg pull-left">
                    <img class="" src="{{ imageView2($banner->cover, [
                        'w' => 896,
                        'h' => 540
                    ]) }}" alt="">
                </div>
            </li>
        @endforeach
    </ul>
</div>
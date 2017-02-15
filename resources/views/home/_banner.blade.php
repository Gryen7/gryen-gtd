<div class="tar-index-slider">
    <ul class="swiper-wrapper">
        @foreach($banners as $banner)
            <li class="row swiper-slide">
                <div class="col-xs-3 t-index-sldtxtbx">
                    <div class="t-index-sldtxt">
                        <a href="{{ action('ArticlesController@show', ['id' => $banner->article_id]) }}"> {{ $banner->article_title }}</a>
                        <hr>
                        <div class="t-index-slddesc">{{ $banner->article_description }}</div>
                    </div>
                </div>
                <div class="col-xs-9 t-index-sldimg">
                    <img class="" src="{{ $banner->cover }}?imageView2/1/w/960/h/540" alt="">
                </div>
            </li>
        @endforeach
    </ul>
</div>
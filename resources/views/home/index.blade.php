@extends('layouts._base', ['module' => 'home'])
@section('base_content')
    @parent
    @include('common._nav', ['extraClass' => ''])
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
    <div class="container">
        <h4 class="text-center t-index-plttl">摄影 · 旅行</h4>
        <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10 row t-index-pltbox">
                @for($i = 0; $i < 6; $i++)
                    <div class="col-xs-4 t-index-pht">
                        <a href="" class="thumbnail">
                            <img src="http://7xnswo.com1.z0.glb.clouddn.com/wallhaven-85912.jpg?imageView2/1/w/480/h/360"
                                 alt="">
                        </a>
                    </div>
                @endfor
            </div>
            <div class="col-xs-1"></div>
        </div>
    </div>
    <div class="container">
        <h4 class="text-center t-index-plttl">聆听 · 故事</h4>
        <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10 row t-index-pltbox">
                <div class="col-xs-4">
                    <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=520
                            src="//music.163.com/outchain/player?type=0&id=3777071&auto=0&height=430"></iframe>
                </div>
                <div class="col-xs-8">
                    <div class="t-index-desc">
                        @for($i = 0; $i < 10; $i++)
                        <p>这里可以有一些文字，这里可以有一些文字，这里可以有一些文字，这里可以有一些文字，这里可以有一些文字，</p>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-xs-1"></div>
        </div>
    </div>
    <div class="container">
        <h4 class="text-center t-index-plttl">随笔 · 感悟</h4>
        <div class="row t-index-pltbox">
                @for($i = 0; $i < 8; $i++)
                    <div class="col-xs-3">
                        <a href="" class="thumbnail">
                            <img src="http://7xnswo.com1.z0.glb.clouddn.com/wallhaven-118609.jpg?imageView2/1/w/360/h/360"
                                 alt="...">
                            <div class="caption">
                                <p><b>这里是文章的标题</b></p>
                                <p>这里是文章的描述这里是文章的描述这里是文章的描述...</p>
                            </div>
                        </a>
                    </div>
                @endfor
        </div>
    </div>
    <div class="container">
        <h4 class="text-center t-index-plttl">格物 · 致知</h4>
        <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10 row t-index-pltbox">
                <p>这里可以放一些话。。。</p>
            </div>
            <div class="col-xs-1"></div>
        </div>
    </div>
@endsection
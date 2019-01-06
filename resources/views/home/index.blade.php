@extends('layouts._default', [
    'module' => 'home',
    'noJsLoad' => true
])
@section('content')
    <div class="row t-min-height-100">
        <div class="col-md-8">
            <div id="carouselExampleIndicators" class="carousel slide t-index-carousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="http://static-dev.gryen.com/default-image.jpg"
                             alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="http://static-dev.gryen.com/default-image.jpg"
                             alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="http://static-dev.gryen.com/default-image.jpg"
                             alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4 t-index-right">
            <div class="t-index-intro">
                <div class="t-index-avatar d-none d-sm-block">
                    <img src="http://statics.gryen.com/logo.png" alt="..."
                         class="rounded mx-auto d-block">
                </div>
                <div class="p-5 t-index-social">
                    <dl class="row">
                        <dt class="col-5">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-github"></use>
                            </svg>
                            <span>Github：</span>
                        </dt>
                        <dd class="col-7">
                            <a href="https://www.douban.com/people/itargaryen/" target="_blank">
                                <span class="font-weight-light">Gryen</span>
                            </a>
                        </dd>
                        <dt class="col-5">
                            <svg class="icon icon-gitee" aria-hidden="true">
                                <use xlink:href="#icon-gitee"></use>
                            </svg>
                            <span>码云：</span>
                        </dt>
                        <dd class="col-7">
                            <a href="https://gitee.com/targaryen" target="_blank">
                                <span class="font-weight-light">Gryen</span>
                            </a>
                        </dd>
                        <dt class="col-5">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-social-douban"></use>
                            </svg>
                            <span>豆瓣：</span>
                        </dt>
                        <dd class="col-7">
                            <a href="https://www.douban.com/people/itargaryen/" target="_blank">
                                <span class="font-weight-light">Gryen</span>
                            </a>
                        </dd>
                        <dt class="col-5">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-email"></use>
                            </svg>
                            <span>Email：</span>
                        </dt>
                        <dd class="col-7">
                            <a href="mailto:targaryen@gryen.com">
                                <span class="font-weight-light">targaryen@gryen.com</span>
                            </a>
                        </dd>
                        <dt class="col-5">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-icon-beian"></use>
                            </svg>
                            <span>ICP 备案：</span>
                        </dt>
                        <dd class="col-7">
                            <a href="http://www.miitbeian.gov.cn/">
                                <span class="font-weight-light">鲁 ICP 备15009847号</span>
                            </a>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@stop

{{--@section('base_content')--}}
{{--@parent--}}
{{--@include('common._nav')--}}
{{--<div>--}}
{{--<section class="home-main">--}}
{{--<div class="slogan hidden-xs">与其波流茅靡，不如从容燃烧。</div>--}}
{{--</section>--}}
{{--</div>--}}
{{--@endsection--}}

<div class="col-md-8">
    <div id="carouselExampleIndicators" class="carousel slide t-index-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($banners as $banner)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                    @if ($loop->first) class="active" @endif></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($banners as $banner)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img class="d-block w-100" src="{{ imageView2($banner->cover, ['w' => 960,'h' => 540]) }}"
                         alt="First slide">
                </div>
            @endforeach
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
    <blockquote class="blockquote text-right d-none d-md-block">
        <p class="mb-1 mt-3">与其波流茅靡，不如从容燃烧。</p>
        <footer class="blockquote-footer">出自 Kurt Cobain</footer>
    </blockquote>
    <top-articles></top-articles>
</div>

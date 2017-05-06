<div class="container">
    <div class="text-center t-index-plttl">
        <span>图片、摄影</span>
    </div>
    <div class="row">
        @foreach($photos as $photo)
            <div class="col-md-4 t-index-pht">
                <a href="{{ action('ArticlesController@show', ['id' => $photo->id]) }}" class="thumbnail">
                    <img class="lazy"
                         data-original="{{ imageView2($photo->cover, ['w' => 350, 'h' => 233]) }}"
                         src=""
                         alt="{{ $photo->title }}">
                </a>
            </div>
        @endforeach
    </div>
</div>
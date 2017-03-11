<div class="container">
    <div class="text-center t-index-plttl t-border-image">摄影 · 旅行</div>
    <div class="row">
        <div class="col-xs-1"></div>
        <div class="col-xs-10 row t-index-pltbox">
            @foreach($photos as $photo)
                <div class="col-xs-4 t-index-pht">
                    <a href="{{ action('ArticlesController@show', ['id' => $photo->article_id]) }}" class="thumbnail">
                        <img src="{{ $photo->cover }}"
                             alt="{{ $photo->title }}">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="col-xs-1"></div>
    </div>
</div>
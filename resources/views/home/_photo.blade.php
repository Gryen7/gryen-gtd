<div class="container">
    <div class="text-center t-index-plttl t-border-image">影</div>
    <div class="row">
        @foreach($photos as $photo)
            <div class="col-md-4 t-index-pht">
                <a href="{{ action('ArticlesController@show', ['id' => $photo->article_id]) }}" class="thumbnail">
                    <img src="{{ $photo->cover }}"
                         alt="{{ $photo->title }}">
                </a>
            </div>
        @endforeach
    </div>
</div>
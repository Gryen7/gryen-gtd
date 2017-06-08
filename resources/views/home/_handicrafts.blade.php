<section class="container-fluid t-index-handicraft">
    <header class="text-center t-index-plttl">
        <div class="t-index-secttl"><a href="{{ action('HandicraftsController@index') }}">格安手作</a></div>
    </header>
    <section class="row">
        @foreach($handicrafts as $handicraft)
            <div class="col-md-2 col-xs-6 t-index-perhndcrft">
                <a href="{{ action('ArticlesController@show', ['id' => $handicraft->id]) }}">
                    <img class="img-circle lazy"
                         data-original="{{ imageView2($handicraft->cover, ['w' => 316, 'h' => 316]) }}"
                         src=""
                         alt="{{ $handicraft->title }}">
                </a>
            </div>
        @endforeach
    </section>
</section>
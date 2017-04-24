<ul class="list-group tar-article-box t-border-image">
    @foreach($articles as $article)
        <li class="list-group-item row tar-article-list">
            <div class="col-md-6 t-rtcl-lf">
                <h4>
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">
                        {{ $article->title }}
                    </a>
                </h4>
                <hr>
                <div class="tar-article-extra clearfix">
                     <span class="pull-right">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}</span>
                </div>
                <div class="tar-article-list-decs">{{ $article->description }}</div>
                <div class="t-rtcl-tag">
                    @foreach($article->tags as $tag)
                        <span class="label label-tag">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="tar-article-info clearfix">
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">
                        <img class="img-rounded lazy"
                             data-original="{{ imageView2($article->cover, ['w' => 600,'h' => 300]) }}"
                             src="" alt="...">
                    </a>
                </div>
            </div>
        </li>
    @endforeach
</ul>
<div class="t-rtcl-links">
    {{ $articles->links() }}
</div>

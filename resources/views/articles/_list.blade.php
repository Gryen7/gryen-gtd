<ul class="col-md-10 col-md-offset-1">
    @foreach($articles as $article)
        <li class="list-group-item row tar-article-list">
            <div class="col-md-12 t-artl-title">
                <a href="{{ action('ArticlesController@show',[$article->id]) }}">
                    {{ $article->title }}
                </a>
            </div>
            <div class="col-md-6 t-rtcl-lf">
                <div class="tar-article-extra clearfix">
                    <div class="t-rtcl-tag pull-left">
                        @foreach($article->tags as $tag)
                            <span class="label label-tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                     <div class="pull-right">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}</div>
                </div>
                <div class="tar-article-list-decs">{{ $article->description }}</div>
            </div>
            <div class="col-md-6">
                <div class="tar-article-info">
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">
                        <img class="lazy"
                             data-original="{{ imageView2($article->cover, ['w' => 600,'h' => 300]) }}"
                             src="" alt="...">
                    </a>
                </div>
            </div>
        </li>
    @endforeach
</ul>
<div class="col-md-10 col-md-offset-1 t-rtcl-links">
    {{ $articles->links() }}
</div>

<ul class="list-group tar-article-box">
    @foreach($articles as $article)
        <li class="list-group-item tar-article-list">
            <div class="tar-article-info clearfix">
                <div class="pull-left">
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">
                        <b>{{ $article->title }}</b>
                    </a>
                </div>
                <span class="tar-article-extra pull-right">
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}
                </span>
            </div>
            <div class="tar-article-list-decs">{{ $article->description }}</div>
            <div class="t-rtcl-tag">
                @foreach($article->tags as $tag)
                <span class="label label-tag">{{ $tag }}</span>
                @endforeach
            </div>
        </li>
    @endforeach
</ul>
{{ $articles->links() }}
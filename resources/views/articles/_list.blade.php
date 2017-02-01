<ul class="list-group">
    @foreach($articles as $article)
        <li class="list-group-item tar-article-list">
            <div class="tar-article-info clearfix">
                <h4 class="pull-left">
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">{{ $article->title }}</a>
                </h4>
                <span class="tar-article-extra pull-right">
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}
                </span>
            </div>
            <div class="tar-article-list-decs">{{ $article->description }}</div>
        </li>
    @endforeach
</ul>
{{ $articles->links() }}
<ul class="list-group">
    @foreach($articles as $article)
        <li class="list-group-item tar-article-list">
            <div class="tar-article-info clearfix">
                <h2 class="pull-left">
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">{{ $article->title }}</a>
                </h2>
                <span class="tar-article-extra pull-right">
                    {{ $article->updated_at }}
                </span>
            </div>
            <hr>
            <div class="article-content">{{ $article->description }}</div>
        </li>
    @endforeach
</ul>
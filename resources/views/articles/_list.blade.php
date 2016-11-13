<ul class="list-group">
    @foreach($articles as $article)
        <li class="list-group-item">
            <h2>
                <a href="{{ action('ArticlesController@show',[$article->id]) }}">{{ $article->title }}</a>
            </h2>
            <hr>
            <div class="article_content">{{ $article->description }}</div>
        </li>
    @endforeach
</ul>
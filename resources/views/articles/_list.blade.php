<ul class="list-group tar-article-box t-border-image">
    @foreach($articles as $article)
        <li class="list-group-item row tar-article-list">
            <div class="col-md-6 t-rtcl-lf">
                <h3>
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">
                        <b>{{ $article->title }}</b>
                    </a>
                </h3>
                <hr>
                <span class="tar-article-extra">
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}
                </span>
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
                        <img src="{{ imageView2(empty($article->cover) ? 'http://7xnswo.com1.z0.glb.clouddn.com/uploads/2017-01-06/4995f5a9d1389015190cc98f2108c406.jpg' : $article->cover, [
                'w' => 600,
                'h' => 300]) }}" alt="..." class="img-rounded">
                    </a>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $articles->links() }}
<div class="row t-rtcl">
  @foreach($articles as $article)
  <a href="{{ action('ArticlesController@show',[$article->id]) }}" class="col-md-4">
    <figure class="figure p-2 t-rtcl-figure">
      <img data-src="{{ imageView2($article->cover, ['w' => 600,'h' => 300]) }}" src="{{ env('SITE_DEFAULT_IMAGE') }}" class="figure-img img-fluid lazyload" alt="{{ $article->title }}">
      <figcaption class="figure-caption t-rtcl-figure-caption">
        <p class="text-left text-dark font-weight-bold t-line-ellipsis-1">{{ $article->title }}</p>
        <p class="text-left t-line-ellipsis-4 t-rtcl-desc">{{ $article->description }}</p>
        <p class="text-right">
          {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}
        </p>
      </figcaption>
    </figure>
  </a>
  @endforeach
</div>
<div class="row t-rtcl-pagination">
  {{ $articles->links() }}
</div>

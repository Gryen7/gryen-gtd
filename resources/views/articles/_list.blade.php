<div class="">
  @foreach($articles as $article)
  <a href="{{ action('ArticlesController@show',[$article->id]) }}" class="">
    <figure class="">
      <img src="{{ imageView2($article->cover, ['w' => 600,'h' => 300]) }}" class="" alt="{{ $article->title }}">
      <figcaption class="">
        <p class="">{{ $article->title }}</p>
        <p class="">{{ $article->description }}</p>
        <p class="">
          {{ $article->publishedAt }}
        </p>
      </figcaption>
    </figure>
  </a>
  @endforeach
</div>
<div class="">
  {{ $articles->links() }}
</div>

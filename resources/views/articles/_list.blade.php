<div class="">
    @foreach($articles as $article)
    <div class="rounded shadow mb-4">
        <a href="{{ action('ArticlesController@show',[$article->id]) }}" class="md:flex">
            <img src="{{ imageView2($article->cover, ['w' => 600,'h' => 300]) }}"
                class="rounded-t md:rounded-r-none md:rounded-l md:w-96 md:h-48" alt="{{ $article->title }}">
            <div class="p-2 md:flex-1 md:h-48">
                <p class="h-12 font-medium text-base overflow-ellipsis overflow-hidden">{{ $article->title }}</p>
                <p class="text-gray-500 mt-2 h-24">{{ $article->description }}</p>
                <p class="mt-1 h-5 text-right text-gray-500">
                    {{ $article->publishedAt }}
                </p>
            </div>
        </a>
    </div>
    @endforeach
</div>
{{ $articles->links() }}

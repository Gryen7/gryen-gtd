<div class="container">
    <div class="text-center t-index-plttl t-border-image">随笔</div>
    <div class="row t-index-pltbox">
        @foreach($notes as $note)
            <div class="col-xs-3">
                <a href="{{action('ArticlesController@show', ['id' => $note->id])}}" class="thumbnail">
                    <img src="{{ imageView2($note->cover, ['w' => 400, 'h' => 300]) }}"
                         alt="{{ $note->title }}">
                    <div class="caption">
                        <p><b>{{ $note->title }}</b></p>
                        <p>{{ $note->description }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
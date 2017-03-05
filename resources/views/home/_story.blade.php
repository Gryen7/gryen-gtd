<div class="container">
    <div class="text-center t-index-plttl">随笔 · 感悟</div>
    <div class="row t-index-pltbox">
        @foreach($storys as $story)
            <div class="col-xs-3">
                <a href="" class="thumbnail">
                    <img src="{{ $story->cover }}"
                         alt="{{ $story->title }}">
                    <div class="caption">
                        <p><b>{{ $story->title }}</b></p>
                        <p>{{ $story->description }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<div class="container">
    <div class="text-center t-index-plttl t-border-image">随笔 · 感悟</div>
    <div class="row t-index-pltbox">
        @foreach($notes as $note)
            <div class="col-xs-3">
                <a href="" class="thumbnail">
                    <img src="{{ $note->cover }}"
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
<section class="container-fluid t-index-note">
    <header class="text-center t-index-plttl">
        <div class="t-index-secttl">笔记</div>
    </header>
    <section class="row">
        @foreach($notes as $note)
            <div class="col-md-3 t-index-nt">
                <a href="{{action('ArticlesController@show', ['id' => $note->id])}}" class="thumbnail">
                    <img class="lazy"
                         data-original="{{ imageView2($note->cover, ['w' => 400, 'h' => 300]) }}"
                         src=""
                         alt="{{ $note->title }}">
                    <div class="caption">
                        <p class="t-index-ntttl">{{ $note->title }}</p>
                        <p class="t-index-ntdesc">{{ $note->description }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </section>
</section>
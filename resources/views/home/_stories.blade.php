<div class="container">
    <div class="text-center t-index-plttl t-border-image">听</div>
    <div class="row t-index-pltbox">
        <div class="col-md-6 t-index-cdcontent">
            {!! $stories->resource !!}
        </div>
        <div class="col-md-6 t-index-desc">
            {{ $stories->title }}
            {{ $stories->content }}
        </div>
    </div>
</div>
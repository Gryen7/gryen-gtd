<div class="container">
    <div class="text-center t-index-plttl t-border-image">听</div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 row t-index-pltbox">
            <div class="col-md-8 t-index-cdcontent">
                <div class="t-index-cdbox t-index-cdpaused" id="tIndexCdbox">
                    <img src="//statics.targaryen.top/images/cd.png" />
                </div>
                <audio id="tIndexAudio" src="{{ $stories->resource }}" controls>
                    浏览器不支持！
                </audio>
            </div>
            <div class="col-md-4 t-index-desc">
                {{ $stories->title }}
                {{ $stories->content }}
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
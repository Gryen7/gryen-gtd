<div class="col-md-4 t-index-right">
    <div class="t-index-intro">
        <div class="t-index-avatar">
            <img src="https://statics.gryen.com/logo-120.png" alt="..." class="rounded mx-auto d-block">
        </div>
        <div class="p-5 t-index-social">
            <div class="d-flex justify-content-around">
                <a href="https://github.com/itargaryen" target="_blank" title="Github">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-github"></use>
                    </svg>
                </a>
                <a href="https://gitee.com/targaryen" target="_blank" title="码云">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-gitee"></use>
                    </svg>
                </a>
                <a href="https://www.douban.com/people/itargaryen/" target="_blank" title="豆瓣">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-social-douban"></use>
                    </svg>
                </a>
                @if (! empty(env('APP_EMAIL')))
                <a href="mailto:{{ env('APP_EMAIL') }}" title="Email">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-email"></use>
                    </svg>
                </a>
                @endif
                <a href="/feed.xml" target="_blank" title="RSS">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-RSS"></use>
                    </svg>
                </a>
            </div>
            @if (!empty(env('DOMAIN_ICP')))
            <div class="position-absolute text-truncate miitbeian">
                <a href="http://www.miitbeian.gov.cn/" target="_blank">
                    <svg class="icon icon-miitbeian" aria-hidden="true">
                        <use xlink:href="#icon-icon-beian"></use>
                    </svg>
                    <span class="font-weight-light">env('DOMAIN_ICP')</span>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

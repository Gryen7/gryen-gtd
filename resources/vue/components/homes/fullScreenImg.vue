<template>
    <div v-show="imageLoaded" class="t-index-fullimg" :style="backgroundStyle">
        <a :href="link" class="t-index-content" :style="sloganHeight">
            <div style="width: 100%">
                <div class="text-center t-index-title">{{title}}</div>
                <div class="t-index-intro">{{description}}</div>
            </div>
        </a>
    </div>
</template>

<style lang="scss" type="text/scss">
    @import "../../../assets/sass/themes/variables";

    .t-index-fullimg {
        position: absolute;
        margin-top: -20px;

        .t-index-content {
            background: rgba(255, 255, 255, 0.85);
            padding: 2rem 4rem;
            font-size: 16px;
            font-weight: 400;
            border-radius: 2px;
            width: 80%;
            max-width: 750px;
            position: relative;
            left: 50%;
            animation: sloganFade 10s infinite;
            display: flex;
            align-items: center;

            .t-index-title {
                width: 100%;
                color: $cfont-focus;
                margin-bottom: 20px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .t-index-intro {
                width: 100%;
                color: $cfont;
                font-size: 14px;
                overflow: hidden;
                text-indent: 2em;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
            }
        }
    }

    @keyframes allFade {
        0% {
            opacity: 0;
            filter: alpha(opacity=80);
        }

        20% {
            opacity: 1;
            filter: alpha(opacity=100);
        }

        90% {
            opacity: 1;
            filter: alpha(opacity=100);
        }

        100% {
            opacity: 0;
            filter: alpha(opacity=0);
        }
    }

    @keyframes sloganFade {
        0% {
            transform: translate(-50%, 0%);
        }

        30% {
            transform: translate(-50%, 50%);
        }

        90% {
            transform: translate(-50%, 50%);
        }

        100% {
            transform: translate(-50%, -200%);
        }
    }
</style>

<script>
    const CHANGE_INTERVAL = 10000; // 页面改变的时间间隔
    const IMAGE_LOADED_LISTENER_OFFSET = 1000; // 单张图片是否加载完毕检测间隔
    const CLIENT_HEIGHT_OFFSET = -76; // 图片容器高度纠错值
    const SLOGAN_MIN_HEIGHT_OFFSET = -13; // 内容高度纠错值

    export default {
        data() {
            return {
                imageLoaded: false,
                allImagesCached: false,
                imageIndex: 0,
                banners: [],
                title: '',
                description: '',
                link: '',
                imgSrc: '',
                boxWidth: document.body.clientWidth,
                boxHeight: document.body.clientHeight + CLIENT_HEIGHT_OFFSET,
                backgroundImg: new Image(),
                backgroundStyle: {},
                sloganHeight: {}
            };
        },
        mounted() {
            this.sloganHeight = {
                animation: `sloganFade ${CHANGE_INTERVAL}ms infinite`,
                minHeight: `${this.boxHeight / 2 + SLOGAN_MIN_HEIGHT_OFFSET}px`
            }
            this.getFullScreenImgs();
        },
        watch: {
            imgSrc: function() {
                this.imageLoaded = false;

                this.backgroundStyle = {
                    backgroundImage: `url(${this.imgSrc})`,
                    backgroundRepeat: "no-repeat",
                    width: `${this.boxWidth}px`,
                    height: `${this.boxHeight}px`,
                    animation: `allFade ${CHANGE_INTERVAL}ms infinite`
                }

                if (!this.allImagesCached) {
                    this.imageLoadedListener();
                } else {
                    this.imageLoaded = true;
                }
            },
            allImagesCached: function () {
                if (this.allImagesCached) {
                    setInterval(() => {
                        this.changeImage();
                    }, CHANGE_INTERVAL);
                }
            }
        },
        methods: {
            /**
             * 轮循改变图片
             */
            changeImage() {
                if (this.imageIndex < this.banners.length) {
                    this.title = this.banners[this.imageIndex].title;
                    this.description = this.banners[this.imageIndex].description;
                    this.link = this.banners[this.imageIndex].link;
                    this.imgSrc = this.backgroundImg.src = this.banners[this.imageIndex].cover;
                    this.imageIndex++;
                } else {
                    this.title = this.banners[0].title;
                    this.description = this.banners[0].description;
                    this.link = this.banners[0].link;
                    this.imgSrc = this.backgroundImg.src = this.banners[0].cover;
                    this.imageIndex = 1;
                    this.allImagesCached = true;
                }
            },

            /**
             * 监听图片加载状态，加载完成后再显示
             */
            imageLoadedListener() {
                if (this.backgroundImg.width !== 0) {
                    this.imageLoaded = true;
                    setTimeout(() => {
                        this.changeImage();
                    }, CHANGE_INTERVAL);
                } else {
                    setTimeout(() => {
                        this.imageLoadedListener();
                    }, IMAGE_LOADED_LISTENER_OFFSET);
                }
            },

            /**
             * 服务端获取图片集合
             */
            getFullScreenImgs () {
                axios.get(`/api/homes/fullscreenimgs?width=${this.boxWidth}&height=${this.boxHeight}`).then(result => {
                    this.banners = result.data;
                    this.changeImage();
                }).catch(error => {
                    console.error(error);
                });
            }
        },
    }
</script>

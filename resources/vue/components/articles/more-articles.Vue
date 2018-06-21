<template>
    <div class="col-md-10 col-md-offset-1 more-article">
        <h5>相关文章</h5>
        <div class="row" v-lazy-container="{ selector: 'img' }">
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img data-src="//7xnswo.com1.z0.glb.clouddn.com/uploads/2018-04-23/e4eff9d791a6d5e83d85f19526f66282.jpg?imageView2/0" alt="测试图片">
                    <div class="caption">
                        <h5>第七篇文章</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img data-src="//7xnswo.com1.z0.glb.clouddn.com/uploads/2018-04-23/e4eff9d791a6d5e83d85f19526f66282.jpg?imageView2/0" alt="测试图片">
                    <div class="caption">
                        <h5>第七篇文章</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img data-src="//7xnswo.com1.z0.glb.clouddn.com/uploads/2018-04-23/e4eff9d791a6d5e83d85f19526f66282.jpg?imageView2/0" alt="测试图片">
                    <div class="caption">
                        <h5>第七篇文章</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import VueLazyload from 'vue-lazyload';

    Vue.use(VueLazyload);
</script>
<style>
    .more-article {
        background-color: #fff;
        margin-bottom: 30px;
        padding-top: 8px;
    }
</style>

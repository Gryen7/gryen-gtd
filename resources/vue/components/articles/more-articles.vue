<template>

    <div class="col-md-10 col-md-offset-1 more-article" v-if="articles.length">
        <h5>其他文章</h5>
        <div class="row">
            <div class="col-md-4" v-for="article in articles" :key='article.id'>
                <a :href="article.href" class="thumbnail">
                    <img v-lazy="article.cover" alt="测试图片">
                    <div class="caption">
                        <h5 class="article-title">{{ article.title }}</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import VueLazyload from 'vue-lazyload';

    Vue.use(VueLazyload);

    export default {
        data: function () {
            return {
                articles: []
            }
        },
        created: async function() {
            let articleId = this.getArticleId();
            let response = await axios.get('/api/articles/list', {
                params: {
                    articleId
                }
            });

            if (response && response.status === 200) {
                this.articles = response.data;
            }
        },
        methods: {
            getArticleId: function() {
                let articleId = -1;

                try {
                    articleId = /\/articles\/show\/(\d+).html/.exec(location.href)[1];
                } catch (error) {
                    console.error('not get articleId');
                }

                return articleId;
            }
        }
    };
</script>
<style>
    .more-article {
        background-color: #fff;
        margin-bottom: 30px;
        padding-top: 8px;
    }

    .more-article .article-title {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        text-align: center;
        line-height: 24px;
    }
</style>

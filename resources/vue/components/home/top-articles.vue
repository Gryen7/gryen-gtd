<template>
  <div class="t-index-top-article">
    <h6>推荐文章</h6>
    <ul class="list-group list-group-flush">
        <li v-for="article in articles" :key="article.id" class="list-group-item">
            <a :href="article.href">{{ article.title }}</a>
        </li>
    </ul>
    <div class="t-index-showmore">
        <a href="/articles">查看更多</a>
    </div>
  </div>
</template>
<style lang="scss">
.t-index-top-article {
    margin-top: 1rem;

    .t-index-showmore {
        margin: 1rem auto;
        text-align: center;
    }
}
</style>
<script>
export default {
    data: function() {
        return {
            articles: []
        };
    },
    created: async function() {
        let response = await axios.get(`/api/articles/list/top`);

        if (response && response.status === 200) {
            this.articles = response.data;
        }
    }
}
</script>

<template>
  <div class="card">
    <div class="card-header">可能还想看</div>
    <div class="row card-body">
      <a
        v-for="article in articles"
        :key="article.id"
        :href="article.href"
        class="col-md-4"
      >
        <figure class="figure">
          <img class="figure-img img-fluid rounded" :src="article.cover" :alt="article.title" />
          <figcaption class="figure-caption">
            <h6 class="t-line-ellipsis-1">{{ article.title }}</h6>
          </figcaption>
        </figure>
      </a>
    </div>
  </div>
</template>

<script>
import { onMounted, ref } from 'vue';

const getArticleId = () => {
  let articleId = -1;

  try {
    articleId = /\/articles\/show\/(\d+).html/.exec(location.href)[1];
  } catch (error) {
    console.error('not get articleId');
  }

  return articleId;
};

export default {
  name: 'MoreArticles',
  setup() {
    let articles = ref([]);
    let articleId = getArticleId();

    axios.get(`/api/articles/list/${articleId}`).then(response => {
        if (response && response.status === 200) {
            articles.value = response.data;
        }
    })

    return {
      articles,
    };
  },
};
</script>
<style lang="scss">
.card {
  .figure {
    width: 100%;

    img {
      width: 100%;
    }
  }
}
</style>

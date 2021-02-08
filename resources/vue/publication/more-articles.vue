<template>
  <div class="border-l-8 border-red-500 pl-1 h-8 leading-8 my-4">
    可能还想看
  </div>
  <ul>
    <li v-for="article in articles" :key="article.id" class="leading-6 truncate">
      <a :href="article.href" class="underline">
        {{ article.title }}
      </a>
    </li>
  </ul>
</template>

<script>
import { ref } from 'vue';

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

    axios.get(`/api/articles/list/${articleId}`).then((response) => {
      if (response && response.status === 200) {
        articles.value = response.data;
      }
    });

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

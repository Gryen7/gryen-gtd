<template>
  <div class="bg-red-500 flex justify-center rounded shadow p-4 text-white">
    <div class="flex space-x-4" role="group">
      <button
        type="button"
        class=""
        @click="filter('status', 0)"
        :disabled="
          listQueryParams.status === 0 && listQueryParams.onlyTrashed !== 'yes'
        "
      >
        待发布
      </button>
      <button
        type="button"
        class=""
        @click="filter('status', 1)"
        :disabled="
          listQueryParams.status === 1 && listQueryParams.onlyTrashed !== 'yes'
        "
      >
        已发布
      </button>
      <button
        type="button"
        class=""
        @click="filter('onlyTrashed', 'yes')"
        :disabled="listQueryParams.onlyTrashed === 'yes'"
      >
        已删除
      </button>
    </div>
  </div>
  <ul class="mt-4 sticky top-0">
    <li class="rounded-t bg-gray-200 p-4">
      <div class="grid gap-1 md:grid-cols-11 grid-cols-4">
        <div class="col-span-3">文章</div>
        <div class="col-span-2 hidden md:block cursor-pointer truncate" @click="order('published_at')">
          <span>发布时间</span>
        </div>
        <div class="col-span-2 hidden md:block cursor-pointer truncate" @click="order('created_at')">
          <span>新建时间</span>
        </div>
        <div class="col-span-2 hidden md:block cursor-pointer truncate" @click="order('updated_at')">
          <span>更新时间</span>
        </div>
        <div class="col-span-1 hidden md:block text-center truncate">
          <span>更新次数</span>
        </div>
        <div
          class="col-span-1 cursor-pointer text-center truncate"
          @click="order('views')"
        >
          <span>浏览量</span>
        </div>
      </div>
    </li>
  </ul>
  <ul class="divide-y divide-gray-100 min-h-screen">
    <li
      v-for="article in articleRes.data"
      :key="article.id"
      class="hover:bg-gray-100"
    >
      <a
        :href="article.href"
        target="_blank"
        class="grid gap-1 md:grid-cols-11 grid-cols-4 p-4"
      >
        <div class="col-span-3 truncate font-medium" :title="article.title">
          <span>{{ article.title }}</span>
        </div>
        <div class="col-span-2 hidden md:block truncate text-gray-500" :title="article.publishedAt">
          <span>{{ article.publishedAt }}</span>
        </div>
        <div class="col-span-2 hidden md:block truncate text-gray-500" :title="article.createdAt">
          <span>{{ article.createdAt }}</span>
        </div>
        <div class="col-span-2 hidden md:block truncate text-gray-500" :title="article.updatedAt">
          <span>{{ article.updatedAt }}</span>
        </div>
        <div class="col-span-1 hidden md:block text-center text-gray-500" :title="article.updatedAt">
          <span>{{ article.modified_times }}</span>
        </div>
        <div class="col-span-1 text-center">
          <span class="">{{ article.views }}</span>
        </div>
      </a>
    </li>
  </ul>
  <div aria-label="" class="sticky bottom-0 bg-gray-200 flex justify-center rounded-b py-2 px-4">
    <ul class="flex space-x-4">
      <li
        class="cursor-pointer"
        :class="{ disabled: articleRes.current_page === 1 }"
      >
        <span v-if="articleRes.current_page === 1" class="page-link"
          >第一页</span
        >
        <a v-else class="page-link" @click="firstPage">第一页</a>
      </li>
      <li
        class="cursor-pointer"
        :class="{ disabled: !articleRes.prev_page_url }"
      >
        <a v-if="articleRes.prev_page_url" class="page-link" @click="prevPage"
          >上一页</a
        >
        <span v-else class="page-link">上一页</span>
      </li>
      <li
        class="cursor-pointer"
        :class="{ disabled: !articleRes.next_page_url }"
      >
        <a v-if="articleRes.next_page_url" class="page-link" @click="nextPage"
          >下一页</a
        >
        <span v-else class="page-link">下一页</span>
      </li>
      <li
        class="cursor-pointer"
        :class="{ disabled: articleRes.current_page === articleRes.last_page }"
      >
        <span v-if="articleRes.current_page === articleRes.last_page" class=""
          >最后一页</span
        >
        <a v-else class="" @click="lastPage">最后一页</a>
      </li>
    </ul>
  </div>
</template>
<style lang="scss" scoped>
.g-pagination {
  position: absolute;
  bottom: 1rem;
  left: 15px;
}
</style>
<script>
export default {
  name: 'ArticleManager',
  data: function () {
    return {
      listQueryParams: {
        pageSize: 15,
        page: 1,
        sorter: 'published_at_desc',
        status: 1,
        onlyTrashed: 'no',
      },
      articleRes: {},
    };
  },
  created: async function () {
    this.renderArticleList();
  },
  methods: {
    renderArticleList: async function () {
      const res = await axios.get('/api/articles/list', {
        params: {
          ...this.listQueryParams,
        },
      });

      this.articleRes = res.data;
      this.listQueryParams.page = this.articleRes.current_page;
    },
    filter: function (type, value) {
      this.listQueryParams[type] = value;

      if (type === 'status') {
        this.listQueryParams.onlyTrashed = 'no';
      }
      this.renderArticleList();
    },
    order: function (type) {
      const sorterArr = this.listQueryParams.sorter.split('_');
      const oldValue = sorterArr[sorterArr.length - 1];
      const oldType = this.listQueryParams.sorter.replace(`_${oldValue}`, '');

      if (oldType === type) {
        if (oldValue === 'desc') {
          this.listQueryParams.sorter = `${type}_asc`;
        }

        if (oldValue === 'asc') {
          this.listQueryParams.sorter = `${type}_desc`;
        }
      } else {
        this.listQueryParams.sorter = `${type}_desc`;
      }

      this.renderArticleList();
    },
    firstPage: function () {
      if (this.listQueryParams.page < 1) {
        return;
      }

      this.listQueryParams.page = 1;

      this.renderArticleList();
    },
    prevPage: function () {
      if (this.listQueryParams.page < 1) {
        return;
      }

      this.listQueryParams.page = this.listQueryParams.page - 1;

      this.renderArticleList();
    },
    nextPage: function () {
      if (this.listQueryParams.page >= this.articleRes.last_page) {
        return;
      }

      this.listQueryParams.page = this.listQueryParams.page + 1;

      this.renderArticleList();
    },
    lastPage: function () {
      if (this.listQueryParams.page < 1) {
        return;
      }

      this.listQueryParams.page = this.articleRes.last_page;

      this.renderArticleList();
    },
  },
};
</script>

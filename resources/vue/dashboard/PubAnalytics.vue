<template>
  <div class="card mb-3">
    <div class="card-body">
      <p>
        每
        <span class="display-4 font-weight-bold text-primary">{{
          analytics.aveDist
        }}</span>
        天发布一篇文章，平均间隔
        <span class="display-4 font-weight-bold text-primary">{{
          analytics.aveRage
        }}</span>
        天。
      </p>
      <p>
        最后一篇文章发布日期是：
        <span class="display-4 font-weight-bold text-primary">{{
          analytics.maxDateCal
        }}</span
        >，已经过去了
        <span class="display-4 font-weight-bold text-primary">{{
          analytics.disNow
        }}</span>
        天。
      </p>
      <p>
        截止到今日，读者访问过
        <span class="display-4 font-weight-bold text-primary">{{
          analytics.viewsSum
        }}</span>
        次你的文章。
      </p>
    </div>
  </div>
</template>
<script>
import { ref } from 'vue';
export default {
  name: 'PubAnalytics',
  setup() {
    let analytics = ref({});

    axios.get('/api/dashboard/analytics').then((res) => {
      analytics.value = res.data;
    });

    return {
      analytics,
    };
  },
};
</script>

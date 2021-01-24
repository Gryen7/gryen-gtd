<template>
  <div class="card mb-3">
    <div class="card-body">
      <p>
        每
        <span class="display-4 font-weight-bold text-primary">{{analytics.aveDist}}</span> 天发布一篇文章，平均间隔
        <span class="display-4 font-weight-bold text-primary">{{analytics.aveRage}}</span> 天。
      </p>
      <p>
        最后一篇文章发布日期是：
        <span class="display-4 font-weight-bold text-primary">{{analytics.maxDateCal}}</span>，已经过去了
        <span class="display-4 font-weight-bold text-primary">{{analytics.disNow}}</span> 天。
      </p>
      <p>
          截止到今日，读者访问过 <span class="display-4 font-weight-bold text-primary">{{analytics.viewsSum}}</span> 次你的文章。
      </p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'PubAnalytics',
  data: function() {
    return {
      analytics: ''
    };
  },
  created: async function() {
    this.renderAnalytics();
  },
  methods: {
    renderAnalytics: async function() {
      const res = await axios.get('/api/dashboard/analytics');

      this.analytics = res.data;
    }
  }
};
</script>

<template>
  <div
    class="rounded shadow bg-white p-4 grid grid-cols-3 divide-x-2 divide-solid"
  >
    <div class="text-center leading-10 divide-y-1 divide-solid">
      <p class="font-semibold text-xl md:text-4xl text-red-500">
        {{ analytics.aveDist }}
        <span class="text-xs text-gray-400 font-light">天/篇</span>
      </p>
      <p>文章发布频率</p>
    </div>
    <div class="text-center leading-10 divide-y-1 divide-solid">
      <p class="font-semibold text-xl md:text-4xl text-red-500">
        {{ analytics.aveRage }}
        <span class="text-xs text-gray-400 font-light">天</span>
      </p>
      <p>文章发布间隔</p>
    </div>
    <div class="text-center leading-10 divide-y-1 divide-solid">
      <p class="font-semibold text-xl md:text-4xl text-red-500">
        {{ analytics.viewsSum }}
        <span class="text-xs text-gray-400 font-light">人次</span>
      </p>
      <p>站点总浏览量</p>
    </div>
  </div>
  <p class="mt-4">
    最后一篇文章发布日期是：
    <span class="text-4xl text-red-500 font-semibold">{{ analytics.maxDateCal }}</span
    >，已经过去了
    <span class="text-4xl text-red-500 font-semibold">{{ analytics.disNow }}</span>
    天。
  </p>
</template>
<script>
import { ref } from 'vue';
export default {
  name: 'PubAnalytics',
  setup() {
    let analytics = ref({
      aveDist: 8888,
      aveRage: 8888,
      viewsSum: 8888,
    });

    axios.get('/api/dashboard/analytics').then((res) => {
      analytics.value = res.data;
    });

    return {
      analytics,
    };
  },
};
</script>

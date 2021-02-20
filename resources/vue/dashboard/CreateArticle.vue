<template>
  <div class="max-w-4xl h-screen flex flex-col">
    <h1
      contenteditable="true"
      class="outline-none border-b border-gray-100 bg-white sticky top-0"
      placeholder="标题"
    ></h1>
    <editor></editor>
    <div class="sticky bottom-0 bg-gray-200 py-2 px-4">
      <button>发布文章</button>
    </div>
  </div>
</template>
<style lang="scss">
h1[contenteditable]:empty:before {
  @apply text-gray-300;
  content: attr(placeholder);
}
h1[contenteditable]:focus {
  content: none;
}
</style>
<script>
import Editor from './GryenEditor/Editor';
export default {
  components: {
    Editor,
  },
  setup(props, context) {},
};
</script>

<template>
  <div>
    <nav-header></nav-header>
    <div class="md:container md:mx-auto p-4">
      <router-view></router-view>
    </div>
  </div>
</template>
<script>
import NavHeader from "./NavHeader.vue";

export default {
  name: "Home",
  components: {
    NavHeader,
  },
  setup() {
    axios.get("/sanctum/csrf-cookie");
  }
};
</script>

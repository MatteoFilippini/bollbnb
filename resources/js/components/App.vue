<template>
  <div>
    <Header />
    <router-view></router-view>
  </div>
</template>

<script>
import Header from "./Header.vue";
export default {
  components: { Header },
  name: "App",
};
</script>

<style>
</style>
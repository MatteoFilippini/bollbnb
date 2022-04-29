<template>
  <div>
    <Header />
    <router-view></router-view>
    <!-- <FlatList /> -->
  </div>
</template>

<script>
import Header from "./Header.vue";
import FlatList from "./FlatList.vue";
export default {
  components: { Header, FlatList },
  name: "App",
};
</script>

<style>
</style>
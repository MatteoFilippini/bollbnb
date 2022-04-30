<template>
  <div>
    <h1>{{ flat.title }}</h1>
    <!-- <h3>{{ flat.name || flat.user.name}}</h3> -->

    <router-link
      :to="{ name: 'detail', params: { id: flat.id } }"
      class="btn btn-secondary btn-sm"
      v-if="!isShow"
      >dettaglio</router-link
    >
    <router-link
      :to="{ name: 'home' }"
      class="btn btn-danger btn-sm"
      v-if="isShow"
      >Indietro</router-link
    >
  </div>
</template>

<script>
export default {
  name: "FlatCard",
  props: ["flat", "is-show"],
};
</script>

<style>
</style>
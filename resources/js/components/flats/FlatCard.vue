<template>
  <div>
    <!-- <h3>{{ flat.name || flat.user.name}}</h3> -->
    <div class="border border-light">
      <h1>{{ flat.title }}</h1>
      <p>{{ flat.description }}</p>
      <h3>{{ flat.user.name }}</h3>
      <router-link
        :to="{ name: 'detail', params: { slug: flat.slug } }"
        class="btn btn-secondary btn-sm"
        v-if="!isShow"
        >dettaglio
        </router-link>
    </div>

    <router-link
      :to="{ name: 'home' }"
      class="btn btn-danger btn-sm"
      v-if="isShow"
      >Indietro
      </router-link
    >

    <router-link
      :to="{ name: 'messageForm', params: { id: flat.id } }"
      class="btn btn-primary btn-sm"
      v-if="isShow"
      >messaggio</router-link
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
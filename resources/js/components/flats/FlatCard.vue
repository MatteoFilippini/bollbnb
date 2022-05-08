<template>
  <div v-if="flat">
    <div id="image-wrapper">
      <img
        :src="flat.default_image"
        alt="immagine appartamento"
        class="img-fluid rounded"
      />
    </div>

    <div class="">
      <h1>{{ flat.id }}</h1>
      <h1>{{ flat.title }}</h1>
      <!-- <img :src="flat.default_image" alt="immagine"> -->
      <p>{{ flat.default_image }}</p>
      <p>{{ flat.description }}</p>
      <!-- <h3>{{ flat.user.name }}</h3> -->
      <router-link
        :to="{ name: 'detail', params: { slug: flat.slug } }"
        class="btn btn-secondary btn-sm"
        v-if="!isShow"
        >Dettaglio
      </router-link>

      <!-- SE SIAMO NELLA RICERCA VEDIAMO ANCHE I SERVIZI COSI -->
      <div v-if="isSearch">
        <h3>Servizi:</h3>
        <ul>
          <li v-for="service in flat.services" :key="service.id">
            {{ service.type }}
          </li>
        </ul>
      </div>
    </div>

    <!-- SE SIAMO INVECE NEL DETTAGLIO VEDIAMO QUESTI BOTTONI -->
    <div v-if="isShow">
      <button class="btn btn-danger btn-sm" onClick="window.history.back()">
        Indietro
      </button>
      <router-link
        :to="{ name: 'messageForm', params: { id: flat.id } }"
        class="btn btn-primary btn-sm"
        >messaggio</router-link
      >
    </div>
    <!-- <router-link
      :to="{ name: 'home' }"
      class="btn btn-danger btn-sm"
      v-if="isShow"
      >Indietro
      </router-link
    > -->
  </div>
</template>

<script>
export default {
  name: "FlatCard",
  props: ["flat", "is-show", "is-search"],
};
</script>

<style scoped lang="scss">
#image-wrapper {
  height: 400px;
  width: 400px;
}
</style>
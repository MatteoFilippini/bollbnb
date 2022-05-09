<template>
  <div class="col-sm-12 col-md-12 col-lg-3 py-4">
    <div v-if="flat">
              <div id="image-wrapper" class="border border-light">
                                    <img
                                      :src="flat.default_image"
                                      alt="immagine appartamento"
                                      class="img-fluid rounded"
                                    />
                                    <span>{{ flat.title }}</span> <br />
                                    <span>{{ flat.description }}</span> <br />
                                    <router-link
                                      :to="{ name: 'detail', params: { slug: flat.slug } }"
                                      class="btn btn-secondary btn-sm"
                                      v-if="!isShow"
                                      >Dettaglio
                                    </router-link>
              <!-- SE SIAMO NELLA RICERCA VEDIAMO ANCHE I SERVIZI COSI -->
                                    <div v-if="isSearch">
                                      <div v-if="flat.services.length">
                                        <h3>Servizi:</h3>
                                        <ul>
                                          <li v-for="service in flat.services" :key="service.id">
                                            {{ service.type }}
                                          </li>
                                        </ul>
                                      </div>
                                      <div v-else>
                                        <h5>Non ci sono servizi</h5>
                                      </div>
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
  </div>
</template>

<script>
export default {
  name: "FlatCard",
  props: ["flat", "is-show", "is-search"],
};
</script>


<style scoped lang="scss">
* {
  color: white;
}
#image-wrapper {
  height: 250px;
  width: 250px;
}
</style>
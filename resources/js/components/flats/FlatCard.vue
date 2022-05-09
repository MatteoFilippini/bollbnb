<template>
  <div v-if="flat">
    <div v-if="isSearch" class="flat-search">
      <div class="row">
        <div class="col-5 image-flat">
          <img :src="flat.default_image" alt="">
        </div>
        <div class="col-7 desc-flat">
          <div class="flat-search-title">
            <h3>{{flat.title}}</h3>
          </div>
          <div class="flat-search-details mb-5">
            <p class="text-muted">Ospiti: {{flat.beds}} - Camere: {{flat.rooms}} - Bagni: {{flat.bathrooms}}
              <br> Metri quadrati: {{flat.square_meters}}
            </p>
          </div>
          <div v-if="flat.services.length">
            <h5>Servizi:</h5>
              <ul>
                <li v-for="service in flat.services" :key="service.id">
                  {{ service.type }}
                </li>
              </ul>
          </div>
          <div v-else>
            <h5>Non ci sono servizi</h5>
          </div>
          <router-link
            :to="{ name: 'detail', params: { slug: flat.slug } }"
            class="btn btn-secondary btn-sm detail-bottom"
            v-if="!isShow"
            >Dettaglio
          </router-link>
        </div>
      </div>
    </div>

  </div>

    <!-- <div v-if="isSearch">
        SEARCH
    </div>
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
      
      <div v-if="isShow">
        <router-link
          :to="{ name: 'home' }"
          class="btn btn-danger btn-sm"
          v-if="isShow"
        >
          Indietro
        </router-link>
        <router-link
          :to="{ name: 'messageForm', params: { id: flat.id } }"
          class="btn btn-primary btn-sm"
        >
          messaggio
        </router-link>
      </div>
    </div>
  </div> -->
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

.flat-search{
  padding:30px;
  border-bottom: 1px solid white;
  position: relative;
  .image-flat{
    background-color:green;
    border-radius:20px;
    height: 250px;
    width: 100%;
    min-width: 200px;
  }
  .detail-bottom{
    position: absolute;
    right: 0;
    bottom: 0;
  }
}
</style>
<template>
  <div v-if="flat">
    <div>
      <!-- FLAT PAGINA SEARCH -->
      <div v-if="isSearch" class="flat-search">
        <div class="row">
          <!-- FLAT IMAGE Display sm-to-md -->
          <div class="col-12 d-md-none image-flat">
            <img
              :src="`http://127.0.0.1:8000/storage/${flat.default_image}`"
              alt="image"
              class="img-fluid"
            />
          </div>
          <!-- FLAT DETAILS -->
          <div class="col-12 desc-flat d-flex">
            <!-- FLAT IMAGE display md-to-lg-->
            <div class="fl-sh">
              <img
              :src="`http://127.0.0.1:8000/storage/${flat.default_image}`"
              alt="image"
              class="img-fluid d-none d-md-inline-block details"
              />
            </div>
            <!-- FLAT SPECIFICS-->
            <div class="flex-grow-1 px-4">
                          <!-- FLAT TITLE -->
                <div class="flat-search-title">
                  <h3>{{ flat.title }}</h3>
                </div>
                <!-- FLAT SPECIFICS -->
                <div class="flat-search-details mb-5">
                  <p>{{flat.description}}</p>
                  <p class="text-muted">
                    Ospiti: {{ flat.beds }} - Camere: {{ flat.rooms }} - Bagni:
                    {{ flat.bathrooms }} <br />
                    Metri quadrati: {{ flat.square_meters }}
                  </p>
                </div>
                <!-- FLAT SERVICES -->
                <div v-if="flat.services.length">
                  <h5>Servizi</h5>
                    <span v-for="service in flat.services" :key="service.id" class="badge badge-pill mx-1">
                      {{ service.type }}
                    </span>
                </div>
                <!-- no services -->
                <div v-else>
                  <h5>Non ci sono servizi</h5>
                </div>
            </div>
          </div>
          <!-- DETAIL BUTTON -->
          <div class="col-12">
            <router-link
              :to="{ name: 'detail', params: { slug: flat.slug } }"
              class="btn btn-secondary btn-sm detail-bottom"
              v-if="!isShow"
              >Dettaglio
              </router-link>
          </div>
        </div>
      </div>
      <!-- FLAT PAGINA SHOW -->
      <div v-if="isShow">
        <div class="flat-show">
          <h1>{{ flat.title }}</h1>
          <h3>{{ flat.address.address }}</h3>
          <div class="row  mb-5">
            <div class="col-sm-12 col-lg-6 main mb-5">
               <img
              :src="`http://127.0.0.1:8000/storage/${flat.default_image}`"
              alt="image"
              class="img-fluid show-img border border-light"
            />
            </div>
            <div
              class="col-xs-6 col-sm-6 col-lg-3 images"
            >
              <div class="border border-light">
                <img src="https://www.costadedoi.it/images/grid/appartamento-san-cassiano-1.jpg" alt="image" class="img-fluid">
              </div>
            </div>
            <div
              class="col-xs-6 col-sm-6 col-lg-3 images"
            >
              <div class="border border-light">
                <img src="https://www.costadedoi.it/images/grid/appartamento-san-cassiano-1.jpg" alt="image" class="img-fluid">
              </div>
            </div>
          </div>
          <h3>Host: {{ flat.user.name }}</h3>
          <h5>{{ flat.description }}</h5>
          <p class="text-muted">
            {{ flat.beds }} ospiti - {{ flat.rooms }} stanze -
            {{ flat.bathrooms }} bagni - {{ flat.sqyare_meters }} metri
          </p>
          <hr class="border border-light w-20" />
          <h3>Cosa troverai:</h3>
          <div v-if="flat.services.length">
            <ul>
              <li v-for="service in flat.services" :key="service.id">
                {{ service.type }}
              </li>
            </ul>
          </div>
          <div v-else>
            <h5>Non ci sono servizi</h5>
          </div>
          <div class="buttons">
            <router-link :to="{ name: 'home' }" class="button-b">
              Indietro
            </router-link>
            <router-link
              :to="{ name: 'messageForm', params: { id: flat.id } }"
              class="message"
            >
              Contatta l'host
            </router-link>
          </div>
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

// search
.flat-search {
  padding: 30px;
  border-bottom: 1px solid white;
  position: relative;
  .fl-sh{
    flex-shrink: 0;
  }
  img {
    border-radius:20px;
    border: 1px solid white;
  }
  .image-flat {
    margin-bottom: 30px;
    img {
      width: 100%;
      height: auto;
    }
  }
  .desc-flat{
    img{
        width:300px;
        height:165px;
    }
  }
  .detail-bottom {
    position: absolute;
    right: 0;
    bottom: 0;
  }
  .badge{
    background-color: #FF385C;
  }
}

// show
.flat-show {
  position: relative;
  .main {
    // height: 400px;
  }
  .images {
    height: 200px;
  }
  p {
    font-size: 20px;
  }
  h3 {
    font-weight: 600;
    margin-bottom: 20px;
  }
  .w-20 {
    width: 20%;
  }
  .buttons {
    position: absolute;
    bottom: 0;
    right: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    .button-b {
      font-size: 1rem;
      margin-right: 17px;
    }
    .message {
      border: 1px solid #fff;
      background-color: white;
      color: black;
      padding: 7px 15px;
      border-radius: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      font-size: 1.1rem;
      max-width: 200px;
      &:hover{
        background-color: black;
      color: white;
      }
    }
  }
}


.show-img{
  border: 0;
  border-radius:0;
}
</style>
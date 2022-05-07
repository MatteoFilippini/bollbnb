<template>
  <div class="flat-card">
    <div class="row justify-content-between align-items-center">
          <div class="col-6">
              <h1>{{flat.id}}</h1> 
              <h1>{{ flat.title }}</h1>
              <p>{{ flat.description }}</p>
            <!-- <h3>{{ flat.user.name }}</h3> -->
      <router-link
        :to="{ name: 'detail', params: { slug: flat.slug } }"
        class="btn btn-secondary btn-sm rad"
        v-if="!isShow"
        >dettaglio
        </router-link>
    
          </div>
          <div class="col-6">
                <img class="img-fluid" :src="flat.default_image" alt="immagine">
          </div>
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

<style lang="scss" scoped>
.flat-card{
  margin: 40px 0;
  background-color: white;
  border-radius: 15px;
  border: 0;
  color: black;
  padding: 35px 30px;
  .row{
    align-items: center;
  }
  .rad{
    border-radius: 15px;
    margin-top:70px;
    padding:5px;
  }
  img{
    border-radius: 10px;
  }
}
</style>
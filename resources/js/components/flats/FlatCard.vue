<template>

  <div class="flat-card" v-if="flat">
    <div class="row justify-content-between align-items-center">
          <div class="col-6">
              <h1>{{flat.id}}</h1> 
              <h1>{{ flat.title }}</h1>
              <p>{{ flat.description }}</p>
              <!-- SE SIAMO NELLA RICERCA VEDIAMO ANCHE I SERVIZI COSI -->
        <div v-if="isSearch">
           <h3>Servizi:</h3>
          <ul>
            <li v-for="service in flat.services" :key="service.id">{{service.type}}</li>
          </ul>          
        </div>
    
            <!-- <h3>{{ flat.user.name }}</h3> -->
      <router-link
        :to="{ name: 'detail', params: { slug: flat.slug } }"
        class="btn btn-secondary btn-sm rad"
        v-if="!isShow"
        >Dettaglio
        </router-link>   
       </div>
          <div class="col-6">
                <img class="img-fluid" :src="flat.default_image" alt="immagine">
          </div>
      </div>


    

    <!-- SE SIAMO INVECE NEL DETTAGLIO VEDIAMO QUESTI BOTTONI -->
  <div  v-if="isShow">
    <button class="btn btn-danger btn-sm" onClick="window.history.back()">Indietro</button>
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
  props: ["flat", "is-show","is-search"],
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
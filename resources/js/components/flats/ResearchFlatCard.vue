<template>
   <div class="flat-card">
    <div class="row justify-content-between align-items-center">
          <div class="col-6">
            <h1>{{flat.id}}</h1> 
              <h1>{{ flat.title }}</h1>
              <h3>{{flat.address.address}}</h3>
              <p>{{ flat.description }}</p>
              <h2>Servizi: </h2>
              <ul>
                <li v-for="service in flat.services" :key="service.id">{{service.type}}</li>
              </ul>
          </div>
          <div class="col-6">
            <img :src="flat.default_image" alt="image">
          </div>
    </div>  
      <!-- <h3>{{ flat.user.name }}</h3> -->

</template>

<script>
export default {
name:"ResearchFlatCard",
props:['flat']
}
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
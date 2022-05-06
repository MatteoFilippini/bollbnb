<template>
   
    <div class="border border-light">
     <h1>{{flat.id}}</h1> 
      <h1>{{ flat.title }}</h1>
      <!-- <img :src="flat.default_image" alt="immagine"> -->
      <img :src="flat.default_image" alt="image">
      <h3>{{flat.address.address}}</h3>
      <p>{{ flat.description }}</p>
      <!-- <h3>{{ flat.user.name }}</h3> -->
      <h2>Servizi: </h2>
      <ul>
        <li v-for="service in flat.services" :key="service.id">{{service.type}}</li>
      </ul>
    </div>
</template>

<script>
export default {
name:"ResearchFlatCard",
props:['flat']
}
</script>

<style>

</style>
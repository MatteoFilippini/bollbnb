<template>
  <div>
    Search
    <h1 class="text-primary">
      Query che passiamo: {{ $route.params.address }}
    </h1>
    <ul>
      <!-- <li v-for="flat in flats" :key="flat.id">a</li> -->
    </ul>
  </div>
</template>

<script>
export default {
  name: "Advancedsearch",
  data() {
    return {
      flats: [],
    };
  },
  methods: {
    getSearchedFlats() {
      axios
        .get("https://localhost:8000/api/search/" + this.$route.params.address)
        .then((res) => {
          this.flats = res.data;
        })
        .catch((err) => {
          console.log("errore");
        })
        .then((res) => {
          console.log("api terminata");
        });
    },
  },
  mounted() {
    this.getSearchedFlats();
  },
};
</script>

<style>
</style>
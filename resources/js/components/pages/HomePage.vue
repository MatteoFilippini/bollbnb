<template>
  <div>
    <h1>Home</h1>
    <h2 class="text-center">Appartamenti Sponsor</h2>
    <h4 v-for="flat_sponsor in flats_sponsor" :key="flat_sponsor.id">
      {{ flat_sponsor.title }}
    </h4>
    
    <h2 class="text-center">Tutti gli Appartamenti</h2>
    <h4 v-for="flat in flats" :key="flat.id">
      {{ flat.title }}
    </h4>
  </div>
</template>

<script>
export default {
  name: "HomePage",
  data() {
    return {
      flats_sponsor: [],
      flats: [],
    };
  },
  methods: {
    IndexFlats() {
      axios
        .get("http://localhost:8000/api/flats")
        .then((res) => {
          this.flats_sponsor = res.data['sponsor'];
          this.flats = res.data['not_sponsor'];
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
          console.log("Api terminata");
        });
    },
  },
  mounted() {
    this.IndexFlats();
  },
};
</script>

<style>
</style>
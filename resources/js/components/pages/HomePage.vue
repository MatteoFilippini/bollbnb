<template>
  <div class="container">
    <h1>Home</h1>
    <h2 class="text-center">Appartamenti Sponsor</h2>
    <FlatCard
      v-for="flat_sponsor in flats_sponsor"
      :key="flat_sponsor.id"
      :flat="flat_sponsor"
    />
    <Loader v-if="isLoading" />
    <h2 class="text-center">Tutti gli Appartamenti</h2>
    <FlatCard v-for="flat in flats" :key="flat.id" :flat="flat" />
  </div>
</template>

<script>
import FlatCard from "../flats/FlatCard.vue";
import Loader from "../Loader.vue";
export default {
  name: "HomePage",
  components: {
    FlatCard,
    Loader,
  },
  data() {
    return {
      flats_sponsor: [],
      flats: [],
      isLoading: false,
    };
  },
  methods: {
    IndexFlats() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/flats")
        .then((res) => {
          this.flats = res.data.Nsponsor;
          this.flats_sponsor = res.data.sponsor;
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
          console.log("index terminata");
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
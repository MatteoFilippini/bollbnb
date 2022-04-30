<template>
  <div class="container">
    <h1>Home</h1>
    <h2 class="text-center">Appartamenti Sponsor</h2>
    <!-- <h4 v-for="flat_sponsor in flats_sponsor" :key="flat_sponsor.id">
      {{ flat_sponsor.title }}
    </h4>  -->
    <FlatCard
      v-for="flat_sponsor in flats_sponsor"
      :key="flat_sponsor.id"
      :flat="flat_sponsor"
    />

    <h2 class="text-center">Tutti gli Appartamenti</h2>
    <!-- <h4 v-for="flat in flats" :key="flat.id">
      {{ flat.title }}
    </h4> -->

    <FlatCard v-for="flat in flats" :key="flat.id" :flat="flat" />
  </div>
</template>

<script>
import FlatCard from "../flats/FlatCard.vue";
export default {
  name: "HomePage",
  components: {
    FlatCard,
  },
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
          this.flats = res.data.Nsponsor;
          this.flats_sponsor = res.data.sponsor;
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
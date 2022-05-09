<template>
  <div class="container-fluid" id="index-flats">
    <h2 class="text-center">Appartamenti Sponsor</h2>
    <div class="row">
      <div class="col-sm-12 col-md-3 col-lg-3 py-4">
        <BestFlat
          v-for="flat_sponsor in flats_sponsor"
          :key="flat_sponsor.id"
          :flat="flat_sponsor"
        />
      </div>
    </div>
    <Loader v-if="isLoading" />
    <h2 class="text-center">Tutti gli Appartamenti</h2>
    <div class="row">
      <FlatCard v-for="flat in flats" :key="flat.id" :flat="flat" />
    </div>
  </div>
</template>

<script>
import FlatCard from "./flats/FlatCard.vue";
import Loader from "./Loader.vue";
import BestFlat from "./BestFlat.vue";

export default {
  components: {
    Loader,
    FlatCard,
    BestFlat,
  },
  name: "IndexFlats",
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

<style scoped lang="scss">
#index-flats {
  padding-top: 100px;
  h2 {
    font-size: 4rem;
    color: #fff;
  }
}
</style>
<template>
  <div class="container-fluid">
    <div class="container">
      <!-- sezione di benvenuto -->
      <section id="info" class="text-center my-5 rounded text-dark">
        <div class="h-100 d-flex justify-content-center align-items-center">
          <h1>BENVENUTO SU BOOLBNB</h1>
        </div>
      </section>

      <!-- sezione con immagine esempio più link ad eventuale registrazione -->
      <section id="example">
        <div class="mb-4">
          <div id="bottom-items" class="text-center">
            <p>Vivi la tua esperienza</p>
            <a href="#" class="btn">PROVA</a>
          </div>
        </div>
      </section>
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
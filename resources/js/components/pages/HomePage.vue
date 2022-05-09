<template>
  <div class="">
        <Header />
    <div>
      <!-- sezione di benvenuto -->
      <Welcome />

      <!-- sezione con immagine esempio più link ad eventuale registrazione -->
      <div class="container-fluid py-3">
        <Jumbotron />
      </div>

      <!-- ancora sfondo bianco, altre cards con i migliori appartamenti -->
      <!-- si può pensare di mettere qua alcuni appartamenti sponsorizzati -->
      <BestFlats />

      <!-- sezione con un altro jumbotron -->
      <div class="container-fluid py-3">
        <JumboLost />
      </div>

      <!-- cambio sfondo in bianco - risalto le prossime cards -->
      <!-- sezione "consigliati" -->
      <Locations />

      <!-- Jumbotron in cui proponiamo di diventare Host -->
      <div class="container-fluid py-3">
        <Host />
      </div>
    </div>
  </div>
</template>

<script>
import FlatCard from "../flats/FlatCard.vue";
import Loader from "../Loader.vue";
import Welcome from "../Welcome.vue";
import Jumbotron from "../Jumbotron.vue";
import JumboLost from "../JumboLost.vue";
import Locations from "../Locations.vue";
import BestFlats from "../BestFlats.vue";
import Host from "../Host.vue";
import Header from "../Header.vue";

export default {
  name: "HomePage",
  components: {
    FlatCard,
    Loader,
    Welcome,
    Jumbotron,
    JumboLost,
    Locations,
    BestFlats,
    Host,
    Header
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

<style scoped lang="scss">
</style>
<template>
  <div class="">
    <div class="container-fluid">
      <!-- sezione di benvenuto -->
      <Welcome />

      <!-- sezione con immagine esempio più link ad eventuale registrazione -->
      <Jumbotron />

      <!-- sezione Cards - esempio di quello che offriamo -->
      <Cards />

      <!-- sezione con un altro jumbotron -->
      <JumboLost />
    </div>
    <!-- cambio sfondo in bianco - risalto le prossime cards -->
    <!-- sezione "consigliati" -->
    <Locations />

    <!-- SECONDO ME QUESTA SEZIONE -->
    <!-- NON VA' QUI, MA SI DOVREBBE FARE UN ALTRO COMPONENTE -->
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
import Welcome from "../Welcome.vue";
import Jumbotron from "../Jumbotron.vue";
import Cards from "../Cards.vue";
import JumboLost from "../JumboLost.vue";
import Locations from "../Locations.vue";

export default {
  name: "HomePage",
  components: {
    FlatCard,
    Loader,
    Welcome,
    Jumbotron,
    Cards,
    JumboLost,
    Locations,
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
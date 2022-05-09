<template>
  <div>
    <Loader v-if="isLoading" />
    <Header />
    <div class="container detail"> 
     <FlatCard :flat="flat" :isShow="true" />
    </div>
  </div>
</template>

<script>
import FlatCard from "./FlatCard.vue";
import Loader from "../Loader.vue";
import Header from "../Header";

export default {
  name: "DetailFlat",
  components: {
    FlatCard,
    Loader,
    Header
  },
  data() {
    return {
      flat: null,
      isLoading: false,
    };
  },
  methods: {
    // FARE UNA CHIAMATA API CHE PRENDE L INDIRIZZO DELL APPARTAMENTO
    getFlat() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/flats/" + this.$route.params.slug)
        .then((res) => {
          this.flat = res.data;
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
          console.log("show terminata");
        });
    },
  },
  mounted() {
    this.getFlat();
  },
};
</script>

<style lang="scss" scoped>
.detail{
  padding: 85px 0;
  color: white;
}
</style>
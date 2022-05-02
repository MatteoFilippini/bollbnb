<template>
  <div>
    <h1>dettaglio</h1>
    <Loader v-if="isLoading" />
    <FlatCard :flat="flat" :isShow="true" />
  </div>
</template>

<script>
import FlatCard from "./FlatCard.vue";
import Loader from "../Loader.vue";
export default {
  name: "DetailFlat",
  components: {
    FlatCard,
    Loader,
  },
  data() {
    return {
      flat: null,
      isLoading: false,
    };
  },
  methods: {
    getFlat() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/flats/" + this.$route.params.id)
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

<style>
</style>
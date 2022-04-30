<template>
  <div>
    <h1>dettaglio</h1>
    <FlatCard :flat="flat" :isShow="true" />
  </div>
</template>

<script>
import FlatCard from "./FlatCard.vue";
export default {
  name: "DetailFlat",
  components: {
    FlatCard,
  },
  data() {
    return {
      flat: null,
    };
  },
  methods: {
    getFlat() {
      axios
        .get("http://localhost:8000/api/flats/" + this.$route.params.id)
        .then((res) => {
          this.flat = res.data;
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          console.log("pippo");
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
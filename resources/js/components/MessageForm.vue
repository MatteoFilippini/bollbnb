<template>
  <div class="container">
    <form>
      <div class="form-group mt-3 mb-1">
        <label for="exampleName">Nome</label>
        <input
          class="form-control"
          type="text"
          id="exampleName"
          placeholder="Default input"
          v-model="form.name"
        />
        <label for="exampleFormControlInput1">Email address</label>
        <input
          type="email"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="name@example.com"
          v-model="form.email"
        />
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea
          class="form-control"
          id="exampleFormControlTextarea1"
          rows="3"
          v-model="form.content"
        ></textarea>
      </div>
    </form>
    <button @click="sendMessage">Invia</button>
    <router-link :to="{ name: 'detail' }" class="btn btn-danger btn-sm"
      >Indietro</router-link
    >
  </div>
</template>

<script>
export default {
  name: "MessageForm",
  props: ["flat"],
  data() {
    return {
      form: {
        content: "",
        email: "",
        name: "",
        id: 0,
      },
    };
  },
  methods: {
    takeId() {
      this.form.id = this.$route.params.id;
    },
    sendMessage() {
      axios
        .post(
          "http://localhost:8000/api/send/" + this.$route.params.id,
          this.form
        )
        .then((res) => {
          console.log("si");
          this.form.email = "";
          this.form.content = "";
          this.form.name = "";
        });
    },
  },
  mounted() {
    this.takeId();
  },
};
</script>

<style>
</style>
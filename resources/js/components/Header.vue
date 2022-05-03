<template>
  <div class="container mt-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/admin">Diventa un HOST</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <!-- FORM SEARCH -->
            <form class="form-inline my-2 my-lg-0">
              <input
                class="form-control mr-sm-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
                v-model="searched"
              />
              <router-link
                :to="{ name: 'searchString', params: { address: searched } }"
                class="btn btn-primary"
                >Search</router-link
              >
              <!-- <button
                class="btn btn-outline-success my-2 my-sm-0"
                type="submit"
              >
                Search
              </button> -->
            </form>
            <!-- FINE FORM -->
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      searched: "",
    };
  },
  methods: {},
};
</script>

<style scoped lang='scss'>
nav {
  display: flex;
  justify-content: space-between;
}
</style>
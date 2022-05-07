<template>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="/">
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSu9r0YU-OAYPKyS-OakXtdXa1caFSRQEFE_g&usqp=CAU"
          alt="logo"
        />
      </a>
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
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 5;

  a {
    color: #63f0c1;
  }

  img {
    height: 45px;
  }
}
</style>
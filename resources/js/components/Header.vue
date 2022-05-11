<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white d-flex justify-content-between align-items-center">
      <a class="logo" href="/">
      BoolBnb
      </a>

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
      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav d-flex justify-content center">
          <li class="nav-item active">
            <!-- FORM SEARCH -->
            <form class="form-inline my-2 my-lg-0 d-flex justify-content-center">
              <input
                class="form-control ml-2 search-input-field"
                type="search"
                placeholder="Dove vuoi andare?"
                aria-label="Search"
                v-model="searched"
              />
              <router-link
                :to="{ name: 'searchString', params: { address: searched } }"
                class="search-button"
                >Search</router-link
              >
            </form>
            <!-- FINE FORM -->
          </li>
        </ul>
        <div class="d-flex justify-content-center">
      <a class="host" href="/admin">DIVENTA UN HOST</a>
        </div>
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
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.3);
  a {
    color: #63f0c1;
    &.logo{
      color: #FF385C;
      font-size: 1.7rem;
      font-weight: 600;
      text-decoration: none;
    }
    &.host{
      background-color: black;
      color: white;
      padding:7px 15px;
      border-radius:20px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.1rem;
      text-decoration: none;
      max-width: 200px;
      &:hover{
        background-color: white;
      color: black;
      border: 1px solid black;
      }
    }
  }

  img {
    height: 45px;
  }
}
.search-button{
  border-radius: 20px;
  padding: 5px 15px;
  border: 1px solid black;
  background-color:white;
  color: black;
  margin-left: 5px;
    text-decoration: none;
   &:hover{
      background-color: black;
      color:white;
  }
}
.search-input-field{
  border-radius: 20px;
  border: 1px solid black;
  padding-left: 20px;
}
</style>
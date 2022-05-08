<template>
  <section id="lost" class="container-fluid">
    <div class="mb-4">
      <div class="text-center bottom-items">
        <p>Non sai dove andare?</p>
        <router-link :to="{ name: 'index' }" class="btn"
          >LOSE YOURSELF</router-link
        >
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "JumboLost",
};
</script>

<style scoped lang="scss">
#lost {
  height: 800px;
  background-image: url("https://stayinn-apc.herokuapp.com/img/main.97b976e7.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;

  .bottom-items {
    p {
      font-size: 2rem;
      color: #fff;
    }

    .btn {
      background-color: #63f0c1;
      color: white;
      &:hover {
        background-color: dodgerblue;
      }
    }
  }
}
</style>
<template>
  <section id="example">
    <div class="container-fluid">
      <div class="mb-4">
        <div id="" class="text-center bottom-items">
          <p>Vivi la tua esperienza</p>
          <a href="#" class="btn">PROVA</a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Jumbotron",
};
</script>

<style scoped lang="scss">
#example {
  height: 800px;
  background-image: url("https://static2-viaggi.corriereobjects.it/wp-content/uploads/2021/06/frasi-sul-viaggiare-aforismi-citazioni-iStock-1158377050-1080x720.jpg?v=436531");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: flex-end;

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
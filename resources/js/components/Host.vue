<template>
  <div class="container-fluid">
    <section id="host">
      <div class="container-fluid">
        <div class="mb-4">
          <div class="bottom-items">
            <div class="h2">Diventa un Host</div>
            <p>
              Accedi a nuove opportunità <br />
              condividendo i tuoi spazi.
            </p>
            <a href="#" class="btn">PROVA</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "Host",
};
</script>

<style scoped lang="scss">
#host {
  height: 800px;
  background-image: url("https://stayinn-apc.herokuapp.com/img/1.986022ef.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-radius: 10px;
  display: flex;
  justify-content: flex-start;
  align-items: center;

  .bottom-items {
    p {
      font-size: 2rem;
      color: #fff;
    }

    .h2 {
      font-size: 4rem;
      color: white;
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
<template>
  <div class="container my-4">
    <div class="row">
      <div class="col-3">
        <div class="card bg-dark">
          <img
            src="https://www.cookesfurniture.co.uk/images/categories/12_large.jpg"
            class="card-img-top"
            alt="immagine letto"
          />
          <div class="card-body">
            <h5 class="card-title">Comfort</h5>
            <p class="card-text">
              Rigererati in un caldo abbraccio notturno nei migliori letti messi
              a disposizione dagli Host.
            </p>
            <a href="#" class="btn btn-primary">CERCA</a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card bg-dark">
          <img
            src="https://sagenceconsulting.com/wp-content/uploads/2017/04/iStock-133917602-cropped.jpg"
            class="card-img-top img-fluid"
            alt="uomo sorridente"
          />
          <div class="card-body">
            <h5 class="card-title">Disponibilità e cortesia</h5>
            <p class="card-text">
              Troverai tutto questo nelle case di chi ti ospiterà. <br />
              Prova adesso!
            </p>
            <a href="#" class="btn btn-primary">CERCA</a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card bg-dark">
          <img
            src="https://d.newsweek.com/en/full/1898130/dog-cat-under-sheet.jpg"
            class="card-img-top"
            alt="cane e gatto"
          />
          <div class="card-body">
            <h5 class="card-title">Animali</h5>
            <p class="card-text">
              Trova un host che può ospitare anche il tuo amico a quattro zampe!
            </p>
            <a href="#" class="btn btn-primary">CERCA</a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card bg-dark">
          <img
            src="https://cdn2.civitatis.com/espana/granada/guia/taxi.jpg"
            class="card-img-top"
            alt="taxi"
          />
          <div class="card-body">
            <h5 class="card-title">Taxi</h5>
            <p class="card-text">
              Siamo convenzionati con diversi servizi di Taxi - chiedi al tuo
              Host!
            </p>
            <a href="#" class="btn btn-primary">CERCA</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cards",
};
</script>

<style scoped lang="scss">
.card {
  color: white;
  height: 450px;
  img {
    height: 150px;
  }
}
</style>
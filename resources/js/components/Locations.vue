<template>
  <div id="locations">
    <div class="pt-4 container-fluid">
      <div class="text-center pt-5">
        <h2>Visita il meglio delle città italiane</h2>
      </div>
      <div class="row">
        <div class="col-3">
          <div class="personal-card">
            <img
              src="https://cdn.getyourguide.com/img/location/5ffeb3dc440b4.jpeg/68.jpg"
              alt="Roma"
              class="img-fluid"
            />
            <p>Roma</p>
          </div>
        </div>
        <div class="col-3">
          <div class="personal-card">
            <img
              src="https://www.costacrociere.it/content/dam/costa/costa-magazine/article-images/palermo-beaches/9-spiagge-palermo-694x390.jpg.image.694.390.low.jpg"
              alt="Palermo"
              class="img-fluid"
            />
            <p>Palermo</p>
          </div>
        </div>
        <div class="col-3">
          <div class="personal-card">
            <img
              src="https://cdn.getyourguide.com/img/tour/df14784133e3958d.jpeg/68.jpg"
              alt="Venezia"
              class="img-fluid"
            />
            <p>Venezia</p>
          </div>
        </div>
        <div class="col-3">
          <div class="personal-card">
            <img
              src="https://res.cloudinary.com/hzekpb1cg/image/upload/c_fill,h_410,w_800/q_auto:low,f_auto/s3/public/prod/s3fs-public/Italy_Trentino-Alto-Adige1.jpg"
              alt="Trentino Alto Adige"
              class="img-fluid"
            />
            <p>Trentino</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped lang="scss">
#locations {
  height: 600px;
  background-color: #fff;
  .personal-card {
    height: 500px;
    padding-top: 100px;
    img {
      border-radius: 15px;
    }
    p {
      font-weight: 600;
      font-size: 2rem;
    }
  }
}
</style>
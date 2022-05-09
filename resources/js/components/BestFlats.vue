<template>
  <div id="best-flats">
    <div class="container">
      <div class="row">
        <div class="col-12 my-5 text-center">
          <h3>I nostri migliori appartamenti</h3>
        </div>
        </div>
        <div class="row justify-content-center">

       
        <div
          class="col-sm-12 col-md-6 col-lg-4 py-4"
        >
          <div class="card-wrapper">
            <div class="card position-relative bounce-top">
              <div class="featured lh-lg">
                Sponsorizzato <i class="fa-solid fa-circle-check"></i>
              </div>

              <img
                src="https://stayinn-apc.herokuapp.com/img/1.4961db01.jpg"
                alt=""
              />
              <p class="mt-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic
                possimus minus ex nobis, nihil labore optio quidem, modi tempora
                excepturi eaque cupiditate laborum ad eum corporis ut? Eos,
                doloremque incidunt PIPPO.
              </p>
              <div class="d-flex justify-content-between">
                <p><strong>Stanze: </strong> 2</p>
                <p><strong>Bagni: </strong> 2</p>
                <p><strong>Letti:</strong> 2</p>
                <p><strong>Metri quadrati:</strong> 50</p>
              </div>

              <a href="#" class="btn btn-sm mt-3">Scopri di più</a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 py-4 mb-4">
          <div class="card-wrapper">
            <div class="card position-relative bounce-top">
              <div class="featured lh-lg">
                Sponsorizzato <i class="fa-solid fa-circle-check"></i>
              </div>

              <img
                src="https://stayinn-apc.herokuapp.com/img/1.850dedfc.jpg"
                alt=""
              />
              <p class="mt-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic
                possimus minus ex nobis, nihil labore optio quidem, modi tempora
                excepturi eaque cupiditate laborum ad eum corporis ut? Eos,
                doloremque incidunt.
              </p>
              <div class="d-flex justify-content-between">
                <p><strong>Stanze: </strong> 2</p>
                <p><strong>Bagni: </strong> 2</p>
                <p><strong>Letti:</strong> 2</p>
                <p><strong>Metri quadrati:</strong> 50</p>
              </div>

              <a href="#" class="btn btn-sm mt-3">Scopri di più</a>
            </div>
          </div>
        </div>
        <div
          class="col-sm-12 col-md-6 col-lg-4 py-4 "
        >
          <div class="card-wrapper">
            <div class="card position-relative bounce-top">
              <div class="featured lh-lg">
                Sponsorizzato <i class="fa-solid fa-circle-check"></i>
              </div>

              <img
                src="https://stayinn-apc.herokuapp.com/img/1.cdae0d7b.jpg"
                alt=""
              />
              <p class="mt-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic
                possimus minus ex nobis, nihil labore optio quidem, modi tempora
                excepturi eaque cupiditate laborum ad eum corporis ut? Eos,
                doloremque incidunt.
              </p>
              <div class="d-flex justify-content-between">
                <p><strong>Stanze: </strong> 2</p>
                <p><strong>Bagni: </strong> 2</p>
                <p><strong>Letti:</strong> 2</p>
                <p><strong>Metri quadrati:</strong> 50</p>
              </div>

              <a href="#" class="btn btn-sm mt-3">Scopri di più</a>
            </div>
          </div>
        </div>
       </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "BestFlats",
};
</script>

<style scoped lang="scss">
#best-flats {
  background-color: #fff;
  .card {
    a {
      background-color: #63f0c1;
      color: white;
      &:hover {
        background-color: dodgerblue;
      }
    }
    background-color: #fff;
    padding-bottom: 1rem;
    box-shadow: black 1px 4px 15px -4px;
    background-image: linear-gradient(
      var(--card-gradient),
      white max(17.5rem, 31vh)
    );
    overflow: hidden;
    border: 0;

    img {
      border-radius: 0.5rem 0.5rem 0 0;
      width: 100%;
      mix-blend-mode: var(--card-blend-mode);
      max-height: 235px;
      ~ * {
        margin-left: 1rem;
        margin-right: 1rem;
      }
    }

    > :last-child {
      margin-bottom: 0;
    }

    .featured {
      position: absolute;
      transform: rotate(45deg);
      top: 34px;
      right: -41px;
      height: 27px;
      width: 168px;
      background-color: #63f0c1;
      font-size: 0.8rem;
      text-align: center;
    }
  }

  .card h3 {
    margin-top: 1rem;
    font-size: 1.25rem;
  }

  .card-wrapper {
    list-style: none;
    padding: 0;
    margin: 0;

    &:hover {
      .bounce-top {
        animation: bounce-top 0.9s both;
      }
      @keyframes bounce-top {
        0% {
          transform: translateY(-45px);
          animation-timing-function: ease-in;
          opacity: 1;
        }
        24% {
          opacity: 1;
        }
        40% {
          transform: translateY(-24px);
          animation-timing-function: ease-in;
        }
        65% {
          transform: translateY(-12px);
          animation-timing-function: ease-in;
        }
        82% {
          transform: translateY(-6px);
          animation-timing-function: ease-in;
        }
        93% {
          transform: translateY(-4px);
          animation-timing-function: ease-in;
        }
        25%,
        55%,
        75%,
        87% {
          transform: translateY(0);
          animation-timing-function: ease-out;
        }
        100% {
          transform: translateY(0);
          animation-timing-function: ease-out;
          opacity: 1;
        }
      }
    }
  }
}
</style>
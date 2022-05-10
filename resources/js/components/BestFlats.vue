<template>
  <div id="best-flats">
    <div class="container">
      <div class="row">
        <div class="col-12 my-5 text-center">
          <h3>I nostri migliori appartamenti</h3>
        </div>
        </div>
        <div class="row justify-content-center">

       <BestFlat  v-for="bestFlat in flats_sponsor" :key="bestFlat.id" :flat="bestFlat"/>
        
        
       </div>
    </div>
  </div>
</template>

<script>
import BestFlat from './BestFlat.vue';
export default {
  name: "BestFlats",
  props:['flats_sponsor'],
  components:{
    BestFlat,
  }
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
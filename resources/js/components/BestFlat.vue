<template>
  <div class="col-sm-12 col-md-6 col-lg-4 py-4">
    <div class="card-wrapper">
      <div class="card position-relative bounce-top">
        <div class="featured lh-lg" v-if="isSponsored">
          SUPERHOST <i class="fa-solid fa-circle-check"></i>
        </div>
        <!-- <img
          :src="`http://127.0.0.1:8000/storage/${flat.default_image}`"
          alt="immagine appartamento"
          class="img-responsive img-fluid"
        />
        <h5 class="mt-4">
          {{ flat.title }}
        </h5>
        <p class="mt-4">
          {{ flat.description }}
        </p>
        <div class="d-flex justify-content-between">
          <p><strong>Stanze: </strong> {{ flat.rooms }}</p>
          <p><strong>Bagni: </strong> {{ flat.bathrooms }}</p>
          <p><strong>Letti:</strong> {{ flat.beds }}</p>
          <p><strong>Metri quadrati:</strong> {{ flat.square_meters }}</p>
        </div>
        <a href="#" class="btn btn-sm mt-3">Scopri di più</a> -->
        <img :src="`http://127.0.0.1:8000/storage/${flat.default_image}`" alt="image" />
        <h5 class="mt-4">
          {{flat.title}}
        </h5>
        <p class="mt-4">
          {{ flat.description }}
        </p>
        <div class="d-flex justify-content-between">
          <p><strong>Stanze: </strong> {{ flat.rooms }}</p>
          <p><strong>Bagni: </strong> {{ flat.bathrooms }}</p>
          <p><strong>Letti:</strong> {{ flat.beds }}</p>
          <p><strong>Metri quadrati:</strong> {{ flat.square_meters }}</p>
        </div>
        <router-link :to="{ name: 'detail', params: { slug: flat.slug } }" class="btn btn-sm mt-3">Scopri di più</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "BestFlat",
  props: ["flat", "is-show", "is-search", 'isSponsored'],
};
</script>

<style scoped lang="scss">
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
    height: 170px;
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

  @media (max-width: 768px) {
    img {
      height: 200px;
    }
  }
  @media (min-width: 769px) {
    .card {
      height: 450px;
    }
    img {
      height: 150px;
    }
  }
}
</style>
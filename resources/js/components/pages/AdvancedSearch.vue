<template>
  <!-- Header Search  -->

  <div class="container-fluid mt-3">
    <div class="all-navbar">
      <nav
        class="
          navbar navbar-expand-lg navbar-light
          bg-white
          d-flex
          justify-content-between
          align-items-center
        "
      >
        <a class="logo" href="/"> BoolBnb </a>
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
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarNav"
        >
          <ul
            class="navbar-nav d-flex justify-content-center align-items-center"
          >
            <li class="nav-item active">
              <!-- FORM SEARCH -->
              <div
                class="form-inline my-2 my-lg-0 d-flex justify-content-center"
              >
                <input
                  class="form-control ml-2"
                  type="search"
                  placeholder="Dove vuoi andare?"
                  aria-label="Search"
                  v-model="newSearchString"
                />
                <button class="search-button" @click="newRunAll()">
                  Search
                </button>
              </div>
              <!-- FINE FORM -->
            </li>
            <li class="radius ml-3 my-2">
              <span>Scegli il raggio </span>
              <input type="number" v-model="radius" placeholder="20km" />
            </li>
          </ul>
          <div class="d-flex justify-content-center">
            <a class="host" href="/admin">DIVENTA UN HOST</a>
          </div>
        </div>
      </nav>

      <nav class="nav-service col-12">
        <ul class="d-flex list-unstyled justify-content-center">
          <li
            :id="service.id"
            v-for="service in servicies"
            :key="service.id"
            class="mx-2"
            @click="getServicesCheck(service.id)"
          >
            {{ service.type }}
          </li>
        </ul>
      </nav>
    </div>

    <div class="row d-flex flex-direction-column corpo">
      <Loader v-if="isLoading" />
      <div class="col-xl-6 col-lg-12 apartment">
        <div
          class="text-white mt-5"
          v-if="!filteredFlats.length && checkedServices.length >= 1"
        >
          <h4>Nessun appartamento trovato</h4>
        </div>
        <div v-else>
          <h3 class="text-white text-uppercase mt-5">
            Ecco gli appartamenti nella zona cercata
          </h3>
          <div v-if="!checkedServices.length">
            <FlatCard
              v-for="flat in addresses"
              :key="flat.id"
              :flat="flat"
              :isSearch="true"
            />
          </div>
          <div v-else>
            <FlatCard
              v-for="flat in filteredFlats"
              :key="flat.id"
              :flat="flat"
              :isSearch="true"
            />
          </div>
        </div>
      </div>
      <div class="col-6 map">
        <div
          id="map"
          class="d-none d-xl-block"
          style="width: 100%; height: 720px"
        ></div>
      </div>
    </div>
  </div>
</template>

<script>
import FlatCard from "../flats/FlatCard.vue";
import tt from "@tomtom-international/web-sdk-maps";
import Loader from "../Loader.vue";

export default {
  name: "Advancedsearch",
  components: {
    FlatCard,
    Loader,
  },
  data() {
    return {
      radius: 20,
      isLoading: false,
      newSearchString: "",
      addresses: [],
      positionCenter: {
        lat: null,
        lon: null,
      },
      a: [],
      servicies: [],
      municipality: "",
      streetName: "",
      streetNumber: "",
      checkedServices: [], // array degli id selezionati dagli utenti
      newSearchString: "",
      filteredFlats: [],
    };
  },
  computed: {
    fixAddress() {
      return this.$route.params.address;
    },
    getEncodedQuery() {
      const encodedQuery = encodeURIComponent(this.$route.params.address);
      return encodedQuery;
    },
  },
  methods: {
    // CONFRONTA GLI ID DEI SERVIZI SELEZIONATI E GLI ID DEI SERVIZI DEL FLAT
    addMap(array){
    
    let center = [this.positionCenter.lon, this.positionCenter.lat];
            const map = tt.map({
              key: "Mkf8SDlv7IXjC285PFjO8O6lFhDYeFdx",
              container: "map",
              center: center,
              zoom: 10,
            });
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());
            this.array.forEach((address) => {
              var markerHeight = 50,
                markerRadius = 10,
                linearOffset = 25;
              var popupOffsets = {
                top: [0, 0],
                "top-left": [0, 0],
                "top-right": [0, 0],
                bottom: [0, -markerHeight],
                "bottom-left": [
                  linearOffset,
                  (markerHeight - markerRadius + linearOffset) * -1,
                ],
                "bottom-right": [
                  -linearOffset,
                  (markerHeight - markerRadius + linearOffset) * -1,
                ],
                left: [markerRadius, (markerHeight - markerRadius) * -1],
                right: [-markerRadius, (markerHeight - markerRadius) * -1],
              };
              map.on("load", () => {
                new tt.Marker()
                  .setLngLat({
                    lon: address.address.longitude,
                    lat: address.address.latitude,
                  })
                  .addTo(map);

                new tt.Popup({ offset: popupOffsets, className: "my-class" })
                  .setLngLat({
                    lon: address.address.longitude,
                    lat: address.address.latitude,
                  })
                  .setHTML(`<p>${address.address.address}</p>`)
                  .addTo(map);
              });
              map.flyTo({
                center: center,
              });
            });           
    },
    filterByServices() {
      let res_array = [];
      this.addresses.forEach((address) => {
        console.log("Serivizi di ogni flat " + address.service_ids);
        let result = this.checkedServices.every(function (element) {
          return address.service_ids.includes(element);
        });
        if (result) {
          res_array.push(address);
          console.log(result);
        }
        this.filteredFlats = res_array;
        console.log(this.filteredFlats);
      });
    },
    // PRENDE GLI ID SEI SERVIZI SELEZIONATI
    getServicesCheck(id_service) {
      let $selezionato = document.getElementById(id_service);
      $selezionato.classList.toggle("style");
      console.log(this.checkedServices);
      if (this.checkedServices.includes(id_service)) {
        let index = this.checkedServices.indexOf(id_service);
        this.checkedServices.splice(index, 1);
      } else {
        this.checkedServices.push(id_service);
      }
      console.log("-------------------------");
      console.log("Servizi selezionati " + this.checkedServices);

      this.filterByServices();
      this.addMap(this.filteredFlats);
    },
    // PRENDE TUTTI I SERVIZI
    getServicies() {
      axios
        .get("http://localhost:8000/api/services")
        .then((res) => {
          this.servicies = res.data;
          // console.log(this.addresses);
        })
        .catch((err) => {
          console.log("errore");
        })
        .then((res) => {
          console.log("api terminata");
        });
    },
    getEncodedStreetName() {
      if (this.newSearchString) {
        const splitted = this.newSearchString.split(/(\s+)/);
        if (splitted.length > 1) {
          this.municipality = encodeURIComponent(splitted[splitted.length - 1]);
          this.streetName = encodeURIComponent(splitted[2]);
          this.streetNumber = encodeURIComponent(splitted[4]);
          if ((splitted.length = 7)) {
            this.streetNumber = encodeURIComponent(splitted[4]);
          } else if ((splitted.length = 5)) {
            this.streetName = encodeURIComponent(splitted[2]);
          }
        } else if ((splitted.length = 1)) {
          this.municipality = encodeURIComponent(splitted[splitted.length - 1]);
        }
      } else {
        const splitted = this.$route.params.address.split(/(\s+)/);
        if (splitted.length > 1) {
          this.municipality = encodeURIComponent(splitted[splitted.length - 1]);
          this.streetName = encodeURIComponent(splitted[2]);
          this.streetNumber = encodeURIComponent(splitted[4]);
          if ((splitted.length = 7)) {
            this.streetNumber = encodeURIComponent(splitted[4]);
          } else if ((splitted.length = 5)) {
            this.streetName = encodeURIComponent(splitted[2]);
          }
        } else if ((splitted.length = 1)) {
          this.municipality = encodeURIComponent(splitted[splitted.length - 1]);
        }
      }
    },
    // PRENDERE TUTTE LE POSIZIONI
    getAllAddresses() {
      this.isLoading = true;
      setTimeout(() => {
        const encoded = encodeURIComponent(
          JSON.stringify({
            lat: this.positionCenter.lat,
            lon: this.positionCenter.lon,
            radius: this.radius,
          })
        );
        axios
          .get("http://localhost:8000/api/search/" + encoded)
          .then((res) => {
            this.addresses = res.data;
            this.addMap(this.addresses);
            console.log(this.addresses);
          })
          .catch((err) => {
            console.log("errore");
          })
          .then((res) => {
            this.isLoading = false;
            console.log("api terminata");
          });
      }, 2000);
    },
    // CREARE GLI SPAZI
    getAddress(str) {
      str = str.replace(/^\s+|\s+$/g, ""); // trim
      str = str.toLowerCase();

      // remove accents, swap ñ for n, etc
      var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
      var to = "aaaaeeeeiiiioooouuuunc------";
      for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
      }

      str = str
        .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
        .replace(/\s+/g, "%20") // collapse whitespace and replace by -
        .replace(/-+/g, "%20"); // collapse dashes

      return str;
    },
    //CERCA APPARTAMENTO
    getSearchedFlats() {
      let address = "";
      if (this.newSearchString) {
        address = this.getAddress(this.newSearchString);
      } else {
        address = this.getAddress(this.$route.params.address);
      }
      // console.log(address);
      axios
        .get(
          `https://api.tomtom.com/search/2/structuredGeocode.json?key=WXZABuumQvx5kWf9tjXpgP4SmEQfzjNx&countryCode=IT&municipality=${this.municipality}&streetName=${this.streetName}&streetNumber=${this.streetNumber}`
        )
        .then((res) => {
          console.log(res.data);
          this.positionCenter = res.data.results[0].position;
          console.log(this.positionCenter);
        })
        .catch((err) => {
          console.log("errore");
        })
        .then((res) => {
          console.log("api terminata");
        });
    },
    // CERCA VICINI APPARTAMENTI
    getNearlyFlats() {
      setTimeout(() => {
        console.log(this.addresses);
        const url = JSON.stringify(this.addresses);
        axios
          .get(
            //https://api.tomtom.com/search/2/geometryFilter.json?geometryList=[{%22type%22:%22CIRCLE%22,%20%22position%22:%2245.44406,10.01108%22,%20%22radius%22:20000}]&poiList=[{"poi":{"name":"Villa con piscina favolosa"},"address":{"freeformAddress":"via manzoni 2"},"position":{"lat":45.53622,"lon":9.47728}},{"poi":{"name":"Appartamento in piazza del Duomo"},"address":{"freeformAddress":"piazza roma 6"},"position":{"lat":40.92597,"lon":14.45826}},{"poi":{"name":"Grazioso appartamento vista mare"},"address":{"freeformAddress":"corso vittorio emanuele 15"},"position":{"lat":37.90196,"lon":13.42846}},{"poi":{"name":"Baita immersa nella natura in montagna"},"address":{"freeformAddress":"via bergamo 67"},"position":{"lat":45.14808,"lon":10.01025}},{"poi":{"name":"dsadsa"},"address":{"freeformAddress":"via caduti di via fani 2 orzivecchi"},"position":{"lat":45.4203,"lon":9.95693}},{"poi":{"name":"sdfdsfsd aaaaaaaaaaaa"},"address":{"freeformAddress":"via caduti di via fani 2 orzivecchi"},"position":{"lat":45.4203,"lon":9.95693}},{"poi":{"name":"saddsadsadsadas"},"address":{"freeformAddress":"via caduti di via fani 2"},"position":{"lat":42.93023,"lon":10.52129}},{"poi":{"name":"dsadsadsa"},"address":{"freeformAddress":"via garibaldi 31 Corzano"},"position":{"lat":45.44406,"lon":10.01108}},{"poi":{"name":"dsadsada"},"address":{"freeformAddress":"via caduti di via fani 2 orzivecchi"},"position":{"lat":45.4203,"lon":9.95693}},{"poi":{"name":"BSdddd"},"address":{"freeformAddress":"via garibaldi 31 corzano"},"position":{"lat":45.44406,"lon":10.01108}},{"poi":{"name":"ddddddddddddddddddddddd"},"address":{"freeformAddress":"via caduti di via fani 2 orzivecchi"},"position":{"lat":45.4203,"lon":9.95693}},{"poi":{"name":"dsadsadas"},"address":{"freeformAddress":"via caduti di via fani 2 orzivecchi"},"position":{"lat":45.4203,"lon":9.95693}},{"poi":{"name":"BSdsadasd"},"address":{"freeformAddress":"via caduti di via fani 2 orzivecchi"},"position":{"lat":45.4203,"lon":9.95693}},{"poi":{"name":"dsadsadsadasd"},"address":{"freeformAddress":"via caduti di via fani 2 orzivecchi"},"position":{"lat":45.4203,"lon":9.95693}},{"poi":{"name":"dsadsadsad"},"address":{"freeformAddress":"via caduti di via fani 2 orzivecchi"},"position":{"lat":45.4203,"lon":9.95693}},{"poi":{"name":"prova ennesima"},"address":{"freeformAddress":"via garibaldi 31 Corzano"},"position":{"lat":45.44406,"lon":10.01108}},{"poi":{"name":"dsadsadsadsa"},"address":{"freeformAddress":"via caduti di via fani 2 corznaoo"},"position":{"lat":42.93023,"lon":10.52129}},{"poi":{"name":"dsadsadsadddddddddddd"},"address":{"freeformAddress":"via garibaldi 31 Corzano"},"position":{"lat":45.44406,"lon":10.01108}}]&key=prsglhDY7UXLN07r6myMmkdbLGJJxLo2
            //             `https://api.tomtom.com/search/2/geometrySearch/${this.getEncodedQuery}.json?key=prsglhDY7UXLN07r6myMmkdbLGJJxLo2&geometryList={
            //   "type":"CIRCLE",
            //    "position":"${this.positionCenter.lat},${this.positionCenter.lon}",
            //    "radius":6000
            //  }&limit=20&idxSet=${url}&entityTypeSet=Country`
            `https://api.tomtom.com/search/2/geometryFilter.json?geometryList=[{%22type%22:%22CIRCLE%22,%20%22position%22:%22${this.positionCenter.lat},${this.positionCenter.lon}%22,%20%22radius%22:20000}]&poiList=${url}&key=prsglhDY7UXLN07r6myMmkdbLGJJxLo2`
          )
          .then((res) => {
            console.log(res.data.results);
            this.a = res.data;
          });
      }, 1000);
    },

    // [{"type":"CIRCLE", "position":`${positionCenter.lat}, ${positionCenter.lon}`, "radius":100}]

    // [
    //   {
    //   "poi":{"name":"S Restaurant Toms"},
    //   "address":{"freeformAddress":"2880 Broadway, New York, NY 10025"},
    //   "position":{"lat":40.80558,"lon":-73.96548}
    //   },
    //   {
    //     "poi":{"name":"Yasha Raman Corporation"},
    //   "address":{"freeformAddress":"940 Amsterdam Ave, New York, NY 10025"},
    //   "position":{"lat":40.80076,"lon":-73.96556}
    //   }
    // ]
    runAll() {
      this.getServicies();
      this.getEncodedStreetName();
      this.getSearchedFlats();
      this.getAllAddresses();
    },
    newRunAll() {
      // this.isLoading = true;

      this.$route.params.address = "";
      this.runAll();
      // this.isLoading = false;
    },
  },
  mounted() {
    // this.getNearlyFlats();
    // this.isLoading = true;

    this.runAll();
    // this.isLoading = false;
  },
};
</script>

<style lang="scss" scoped>
@import "../../../../node_modules/@tomtom-international/web-sdk-maps/dist/maps.css";

.corpo {
  padding-top: 95px;
}
.all-navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 5;
}
nav {
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.3);
  a {
    color: #63f0c1;
    &.logo {
      color: #ff385c;
      font-size: 1.7rem;
      font-weight: 600;
      text-decoration: none;
    }
    &.host {
      background-color: black;
      color: white;
      padding: 7px 15px;
      border-radius: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.1rem;
      text-decoration: none;
      max-width: 200px;
    }
  }
}
.search-button {
  border-radius: 5px;
  padding: 5px 15px;
  border: 1px solid black;
  background-color: white;
  color: black;
  margin-left: 5px;
  text-decoration: none;
}

.nav-service {
  width: calc(100vw);
  // height:90px;
  padding: 10px 0 10px 0;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  border-bottom: 1px solid lightgray;
  ul {
    flex-wrap: wrap;
    margin: 0;
    li {
      display: flex;
      justify-content: center;
      min-width: 80px;
      padding: 7px;
      border-radius: 19px;
      color: black;
      cursor: pointer;
      border: 1px solid lightgray;
      &.style {
        border: 1px solid black;
      }
    }
  }
}
.search {
  position: relative;
  top: 180px;
}
.map {
  position: fixed;
  right: 0;
  top: 160px;
}
</style>
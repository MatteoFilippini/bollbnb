<template>
  <div>
    Search
    <h1 class="text-primary">
      Query che passiamo:
      {{ fixAddress }}
    </h1>
    <h3>Posizione centrale app</h3>
    <h5>
      {{ positionCenter.lat }}
      {{ positionCenter.lon }}
    </h5>
    <h2>Posisioni tutti flats</h2>
    <ul>
      <li v-for="address in addresses" :key="address.id">
        {{ address.poi.name }}
        {{ address.address.freeformAddress }}
        {{ address.position.lat }}
        {{ address.position.lon }}
      </li>
    </ul>

    <h2>aaaaaaaaaaaaaaaaaaaaaaa</h2>
    <!-- <ul> -->
    <!-- <li v-for="adfg in a.results" :key="adfg.id"> -->
    <ResearchFlatCard v-for="flat in a.results" :key="flat.id" :flat="flat" />
    <!-- {{ adfg.poi.name }} -->
    <!-- </li> -->
    <!-- </ul> -->
  </div>
</template>

<script>
import ResearchFlatCard from "../flats/ResearchFlatCard.vue";
export default {
  name: "Advancedsearch",
  components: {
    ResearchFlatCard,
  },
  data() {
    return {
      addresses: [],
      positionCenter: {},
      a: [],
    };
  },
  computed: {
    fixAddress() {
      return this.$route.params.address;
    },
    getEncodedQuery(){
      const encodedQuery = encodeURIComponent(this.$route.params.address);
      return encodedQuery;
    }
  },
  methods: {
    // PRENDERE TUTTE LE POSIZIONI
    getAllAddresses() {
      axios
        .get("http://localhost:8000/api/search")
        .then((res) => {
          this.addresses = res.data;
          // console.log(this.addresses);
        })
        .catch((err) => {
          console.log("errore");
        })
        .then((res) => {
          console.log("api terminata");
        });
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
      let address = this.getAddress(this.$route.params.address);
      // console.log(address);
      axios
        .get(
          "https://api.tomtom.com/search/2/geocode/" +
            address +
            ".json?key=pkCWDKdXKoZyvsUh2s53ebk9fAJvlUQ35&typeahead=true&countrySet=ITA"
        )
        .then((res) => {
          console.log(res.data);
          this.positionCenter = res.data.results[0].position;
          // console.log(this.positionCenter);
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
  },
  mounted() {
    this.getAllAddresses();
    this.getSearchedFlats();
    this.getNearlyFlats();
  },
};
</script>

<style>
</style>
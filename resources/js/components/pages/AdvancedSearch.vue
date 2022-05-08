<template>
  <div>
    <Loader v-if="isLoading"/>
    <div v-else>

    <nav class="nav-service">
      <ul class="d-flex list-unstyled justify-content-center">
        <li :id="service.id" v-for="service in servicies" :key="service.id" class="mx-2" @click="getServicesCheck(service.id)">
          {{service.type}}
        </li>
      </ul>
    </nav>
    <div class="search container-fluid"> 
      <div class="row d-flex flex-direction-column">
        <div class="col-6 apartment">
          <h3>Ecco gli appartamenti nella zona cercata</h3>
    <div v-if="!checkedServices.length">
        <FlatCard v-for="address in addresses" :key="address.id" :flat="address" :isSearch="true"/>
      </div>
      <div v-else>
        <FlatCard v-for="address in filteredFlats" :key="address.id" :flat="address" :isSearch="true"/>
      </div> 
        </div>
        <div class="col-6 map bg-primary">MAPPA</div>
      </div>
    </div>
    </div>
  </div>
</template>
    <!-- <h1 class="text-primary">
      Query che passiamo:
      {{ fixAddress }}
    </h1> -->
    <!-- <h3>Posizione centrale app</h3>
    <h5>
      {{ positionCenter.lat }}
      {{ positionCenter.lon }}
    </h5> -->
    <!-- <h2>Posisioni tutti flats</h2> -->
    <!-- <ul>
      <li v-for="address in addresses" :key="address.id">
        {{ address.title }}
        {{ address.address.address }}
        {{ address.address.latitude }}
        {{ address.address.longitude }}
      </li>
    </ul> -->

    <!-- <h2>aaaaaaaaaaaaaaaaaaaaaaa</h2>
       
      </div> -->
  

<script>
import Loader from "../Loader.vue";
import FlatCard from "../flats/FlatCard.vue";
export default {
  name: "Advancedsearch",
  components: {
    FlatCard,
    Loader
  },
  data() {
    return {
    isLoading: false,

      addresses: [],
      positionCenter: {
        lat: null,
        lon: null
      },
      a: [],
      servicies: [],
      municipality: '',
      streetName: '',
      streetNumber: '',
      checkedServices:[], // array degli id selezionati dagli utenti

      filteredFlats:[]
    };
  },
  computed: {
    fixAddress() {
      return this.$route.params.address;
    },
    getEncodedQuery(){
      const encodedQuery = encodeURIComponent(this.$route.params.address);
      return encodedQuery;
    },
  },
  methods: {
    // CONFRONTA GLI ID DEI SERVIZI SELEZIONATI E GLI ID DEI SERVIZI DEL FLAT 
    filterByServices(){
      let res_array=[];
      this.addresses.forEach(address => {
        console.log("Serivizi di ogni flat "+address.service_ids);
        let result =  this.checkedServices.every(function (element) {
               return address.service_ids.includes(element);
             });
               if(result){
                res_array.push(address);
                console.log(result);
               }
               this.filteredFlats=res_array;
               console.log(this.filteredFlats);
      });
    },
    // PRENDE GLI ID SEI SERVIZI SELEZIONATI
    getServicesCheck(id_service){
      let $selezionato=document.getElementById(id_service);
      $selezionato.classList.toggle("style");
      console.log(this.checkedServices);
      if(this.checkedServices.includes(id_service)){
        let index=this.checkedServices.indexOf(id_service);
        this.checkedServices.splice(index,1);
      }   else{
        this.checkedServices.push(id_service);
      }
      console.log('-------------------------');
      console.log("Servizi selezionati "+this.checkedServices);

       this.filterByServices();
    },
    // PRENDE TUTTI I SERVIZI
    getServicies(){
      axios.get('http://localhost:8000/api/services').then((res) => {
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
    getEncodedStreetName(){
      const splitted = this.$route.params.address.split(/(\s+)/);
      if(splitted.length > 1){
        this.municipality = encodeURIComponent(splitted[splitted.length-1]);
        this.streetName = encodeURIComponent(splitted[2]);
        this.streetNumber = encodeURIComponent(splitted[4]);
        if(splitted.length = 7){
          this.streetNumber = encodeURIComponent(splitted[4]);
        } else if (splitted.length = 5){
          this.streetName = encodeURIComponent(splitted[2]);
        }
      } else if(splitted.length = 1){
        this.municipality = encodeURIComponent(splitted[splitted.length-1]);
      }
    },
    // PRENDERE TUTTE LE POSIZIONI
      getAllAddresses() {
        this.isLoading = true;
    setTimeout(() =>{
        const encoded = encodeURIComponent(JSON.stringify({"lat":this.positionCenter.lat,"lon":this.positionCenter.lon}));
        axios
          .get("http://localhost:8000/api/search/" + encoded)
          .then((res) => {
            this.addresses = res.data;
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
      let address = this.getAddress(this.$route.params.address);
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
  },
  mounted() {
    this.getServicies();
    this.getEncodedStreetName();
    this.getSearchedFlats();
    this.getAllAddresses();    
    // this.getNearlyFlats();
  },
  
};
</script>

<style lang="scss" scoped>

.nav-service{
  position: fixed;
  top: 50px;
  width: calc(100vw - 17px);
  z-index: 6;
  height:90px;
  background-color:white;
  display:flex;
  align-items: center;
  justify-content: center;
  border-bottom: 1px solid lightgray;
  ul{
    margin:0;
    li{
  display:flex;
  justify-content:center;
  min-width: 80px;
  padding: 7px;
  border-radius: 19px;
  color:black;
  cursor: pointer;
  border: 1px solid lightgray;
  &.style{
    border: 1px solid black;
  }
    }
  }
}
.search{
  position: relative;
  top: 180px;
  .map{
    position: fixed;
    right: 0;
    height:100vh;
    border: 1px solid black;
  }
}
</style>
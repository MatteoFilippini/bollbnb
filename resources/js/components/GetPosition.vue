<template>
<div>
    <div class="col-12">
        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address" required v-model="inputValue">
        </div>
    </div>
  <input type="hidden" value="" >
  <button type="submit" class="btn btn-success" @click="getPosition()">Conferma</button>
</div>    
</template>

<script>
export default {
    name:"GetPosition",
    data(){
        return{
            inputValue: "",
            position: {},
        }
    },
    methods:{
        getPosition(){
            axios.get(`https://api.tomtom.com/search/2/geocode/${encodeURIComponent(this.inputValue)}.json?key=pkCWDKdXKoZyvsUh2s53ebk9fAJvlUQ3`)
            .then((res) => {
                this.position = res.data.results.position;
            });
        }
    }
}
</script>

<style>

</style>
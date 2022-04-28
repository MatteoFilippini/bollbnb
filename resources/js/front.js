require('./bootstrap');

window.Vue = require('vue');

import App from "./components/App.vue";
 import router from "./routers.js"

const root = new Vue({
    el: "#root",
     router: router,
    render: h => h(App),
});
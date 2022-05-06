require('./bootstrap');

window.Vue = require('vue');

import App from "./components/App.vue";
import router from "./routers.js"
import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

const root = new Vue({
    el: "#root",
    router: router,
    render: h => h(App),
});
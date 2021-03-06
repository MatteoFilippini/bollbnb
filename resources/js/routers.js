import Vue from 'vue';
import VueRouter from "vue-router";

// Inizializziamo il router
Vue.use(VueRouter)

// importiamo i component
import HomePage from "./components//pages/HomePage";
import NotFoundPage from "./components/pages/NotFoundPage";
import DetailFlat from "./components/flats/DetailFlat";
import MessageForm from "./components/MessageForm";
import AdvancedSearch from "./components/pages/AdvancedSearch";
import IndexFlats from "./components/IndexFlats";

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { path: "/", component: HomePage, name: 'home' },
        { path: "/search/:address", component: AdvancedSearch, name: 'searchString' },
        { path: "/flats/:slug", component: DetailFlat, name: 'detail' },
        { path: "/message/:slug", component: MessageForm, name: 'messageForm' },
        { path: "/flats", component: IndexFlats, name: 'index' },
        { path: '*', component: NotFoundPage, name: '404' }
    ]
});

export default router;
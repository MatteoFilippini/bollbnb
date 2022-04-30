import Vue from 'vue';
import VueRouter from "vue-router";

// Inizializziamo il router
Vue.use(VueRouter)

// importiamo i component
import HomePage from "./components//pages/HomePage";
import NotFoundPage from "./components/pages/NotFoundPage";
import DetailFlat from "./components/flats/DetailFlat";
import MessageForm from "./components/MessageForm";

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { path: "/", component: HomePage, name: 'home' },
        { path: "/flats/:id", component: DetailFlat, name: 'detail' },
        { path: "/message/:id", component: MessageForm, name: 'messageForm' },
        { path: '*', component: NotFoundPage, name: '404' }
    ]
});

export default router;
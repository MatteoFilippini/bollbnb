import Vue from 'vue';
import VueRouter from "vue-router";

// Inizializziamo il router
Vue.use(VueRouter)

// importiamo i component
import HomePage from "./components//pages/HomePage";
import NotFoundPage from "./components/pages/NotFoundPage";
import RegisterPage from "./components/pages/RegisterPage";
// import FlatList from "./components/FlatList";

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { path: "/", component: HomePage, name: 'home' },
        // { path: "/flats", component: FlatList, name: 'index' },
        { path: "/register", component: RegisterPage, name: 'register_page' },
        { path: '*', component: NotFoundPage, name: '404' }
    ]
});

export default router;
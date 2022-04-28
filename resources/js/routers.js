import Vue from 'vue';
import VueRouter from "vue-router";

// Inizializziamo il router
Vue.use(VueRouter)

// importiamo i component
import ExampleComponent from "./components/ExampleComponent";
import NotFoundPage from "./components/pages/NotFoundPage";
import RegisterPage from "./components/pages/RegisterPage";

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { path: "/", component: ExampleComponent, name: 'home' },
        {path:"/register",component: RegisterPage, name: 'register_page'},
         { path: '*', component: NotFoundPage, name: '404' }
    ]
});

export default router;
import VueRouter from "vue-router";
import Bookables from "./components/bookables/Bookables.vue";
import Example2Component from "./components/Example2Vue.vue";

const routes = [
    {
        path: '/',
        component: Bookables,
        name: "home"
    },
    {
        path: '/second',
        component: Example2Component,
        name: "second"
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});


export default router;
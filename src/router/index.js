import { createRouter, createWebHistory } from "vue-router";

const routes = [
        {
            path: "/",        
            name: "home",
            component: () => import("../components/home.vue"),
        },

        {
            path: "/about",        
            name: "about",
            component: () => import("../components/about.vue"),
        },
        {
            path: "/contact",        
            name: "contact",
            component: () => import("../components/contact.vue"),
        },
        
]



export default createRouter({
    history: createWebHistory('/'),
    routes,
})
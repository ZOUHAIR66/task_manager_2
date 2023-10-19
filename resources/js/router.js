import { createRouter, createWebHistory }from 'vue-router';

import Login from './Auth/Login.vue'
import Register from './Auth/Register.vue'
import Dashboard from './Dashboard/Dashboard.vue'
import Home from './Home/Home.vue'
import {UserStore} from './store/UserStore.js'


const routes = [
    {
        path:'/',
        name:'Home',
        component:Home,
       
    },
    {
        path:'/dashboard',
        name:'Dashboard',
        component:Dashboard,
        meta: {
            requiresAuth: true
        }
    },
    {
        path:'/login',
        name:'Login',
        component:Login,
        meta: {
            requiresAuth: false
        }
    },
    {
        path:'/register',
        name:'Register',
        component:Register,
        meta: {
            requiresAuth: false
        }
    },

];    

const router = createRouter({
    history:createWebHistory(),
    routes
})

router.beforeEach((to, from) => {

    const store = UserStore();

    if (to.meta.requiresAuth && store.token == 0) {
        return { name: 'Login' }
    }
    if (to.meta.requiresAuth == false && store.token != 0) {
        return { name: 'Dashboard' }
    }
});

export default router;

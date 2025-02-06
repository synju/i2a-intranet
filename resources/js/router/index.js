import {createRouter,createWebHistory} from 'vue-router';

import Home from '../components/sections/standard/Home.vue';

const routes = [
	// Standard
	{path:'/',name:'Home',component:Home},
	// {path:'/register',name:'Register',component:() => import('../components/sections/standard/Register.vue'),},
	// {path:'/login',name:'Login',component:() => import('../components/sections/standard/Login.vue'),},
	// {path:'/logout',name:'Logout',component:() => import('../components/sections/standard/Logout.vue'),},
	// {path:'/account',name:'Account',component:() => import('../components/sections/standard/Account.vue'),},

	// Dashboards
	{path:'/globalstats',name:'GlobalStats',component:() => import('../components/sections/dashboards/GlobalStats.vue'),},
];

const router = createRouter({
	history:createWebHistory(),
	routes,
});

export default router;

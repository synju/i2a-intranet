<script setup>
	import {onMounted,ref} from 'vue';
	import {useGlobalStore} from "./store/store.js";
	import Header from './components/structure/Header.vue';
	import Sidebar from './components/structure/Sidebar.vue';
	import Footer from './components/structure/Footer.vue';

	const store = useGlobalStore()

	const isLoggedIn = ref(false);

	onMounted(() => {
		store.logoutIfUserExpired();
		store.updateViewType();
		window.addEventListener('resize', store.updateViewType);
	});
</script>

<style>
/* Mobile View */
@media (max-width: 1299px) {}

/* Desktop View */
@media (min-width: 1300px) {}
</style>

<template>
	<!-- Site Container -->
	<div class="app-wrapper">
		<!-- Header -->
		<Header/>

		<!-- Sidebar -->
		<Sidebar  v-if="store.getUser() !== null"/>

		<!-- App Main -->
		<main class="app-main">
			<router-view/>
		</main>

		<!-- Footer -->
		<Footer/>
	</div>
</template>

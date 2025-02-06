<script setup>
import {useRoute} from "vue-router";
import {onMounted, ref} from "vue";
import {useGlobalStore} from "../../../store/store.js";
import * as SharedUtils from '../../../sharedFunctions/sharedUtils.js';
import ContentHeader from "../../core/ContentHeader.vue";

const store = useGlobalStore();
const route = useRoute();

// V-Model Ref..
let form = ref({
	email_address: '',
	password: '',
})

onMounted(async() => {
	// Scroll to Top if Not Mobile
	if(!store.isMobileView) {
		window.scrollTo(0, 0)
	}
})

let authenticateUser = async() => {
	let formData = new FormData()
	formData.append('email_address', form.value.email_address)
	formData.append('password', form.value.password)

	let userData = {};
	let accountResponse = await SharedUtils.getAccount(form.value.email_address, form.value.password);
	console.log(accountResponse);
	// if(accountResponse) {
	// 	let email_address = form.value.email_address;
	// 	let password = form.value.password;
	//
	// 	userData.accounts = [];
	// 	let accountData = {};
	// 	accountData.name = accountResponse.accounts[0];
	// 	accountData.balance = await AccountUtils.getBalance(username, password, accountResponse.accounts[0]);
	// 	userData.accounts.push(accountData);
	// 	// Store Username & Password for later use in api, Note I was told to do this as a temporary measure... ~ Charlie.
	// 	userData.username = username;
	// 	userData.password = password;
	// 	userData.date_created = new Date();
	// 	userStore.setUser(userData);
	// 	userStore.changePrimaryAccount(accountResponse.accounts[0]['name']);
	//
	// 	// Browser Hard Redirect
	// 	let route = '/';
	// 	SharedUtils.routerPush(route, router);
	// }
}
</script>

<style>
/* Mobile View */
@media (max-width: 1299px) {
	.mobile-content-container {
		display: block;
		padding: 0;
	}

	.desktop-content-container {
		display: none;
	}
}

/* Desktop View */
@media (min-width: 1300px) {
	.mobile-content-container {
		display: none;
	}

	.desktop-content-container {
		display: block;
	}
}
</style>

<template>
	<!-- Mobile Content -->
	<div v-if="store.isMobileView" class="mobile-content-container">
		Mobile View Not Implemented Yet
	</div>

	<!-- Desktop Content -->
	<div v-else class="desktop-content-container">
		<!-- Header -->
		<ContentHeader title="Login" centered/>

		<!-- Content -->
		<div class="app-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card card-primary card-outline w-25 mx-auto">
							<!-- Form Header -->
							<div class="card-body">
								<!-- Email Address -->
								<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">Email address</label>
									<input type="email" class="form-control" id="email_address" v-model="form.email_address"/>
								</div>

								<!-- Password -->
								<div class="mb-3">
									<label for="exampleInputPassword1" class="form-label">Password</label>
									<input type="password" class="form-control" id="password" v-model="form.password"/>
								</div>
							</div>

							<!-- Form Footer -->
							<div class="card-footer">
								<!-- Submit Login Button -->
								<div class="btn btn-primary float-end w-100" @click="authenticateUser()">Submit</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</template>

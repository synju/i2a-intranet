<script setup>
import {nextTick,onMounted,ref} from "vue";
import {useRouter} from "vue-router";
import {useGlobalStore} from "../../store/store.js";
import Sidebar from "./Sidebar.vue";

const store = useGlobalStore()
const router = useRouter()

const props = defineProps({
	isLoggedIn: {
		type: Boolean,
		default: false
	}
})

const searchEnabled = ref(false);
const messagesEnabled = ref(false);
const notificationsEnabled = ref(false);

onMounted(() => {
	nextTick(() => {
		// Later usage...
	});
})
</script>

<template>
	<nav class="app-header navbar navbar-expand bg-body">
		<div class="container-fluid">
			<!-- Navbar Left -->
			<ul class="navbar-nav">
				<!-- Hide / Display Sidebar -->
				<li class="nav-item"  v-if="store.getUser() !== null">
					<a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
						<i class="bi bi-list"></i>
					</a>
				</li>

				<!-- Home -->
				<li class="nav-item d-none d-md-block">
					<router-link to="/" class="nav-link">Home</router-link>
				</li>
			</ul>

			<!-- Navbar Right -->
			<ul class="navbar-nav ms-auto">
				<!-- Logged in -->
				<template v-if="store.getUser() !== null">
					<!-- Search -->
					<li class="nav-item" v-if="searchEnabled">
						<a class="nav-link" data-widget="navbar-search" href="#" role="button">
							<i class="bi bi-search"></i>
						</a>
					</li>

					<!-- Messages -->
					<li class="nav-item dropdown" v-if="messagesEnabled">
						<a class="nav-link" data-bs-toggle="dropdown" href="#">
							<i class="bi bi-chat-text"></i>
							<span class="navbar-badge badge text-bg-danger">3</span>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
							<a href="#" class="dropdown-item">
								<!--begin::Message-->
								<div class="d-flex">
									<div class="flex-shrink-0">
										<img
											src="/adminlte-assets/img/user1-128x128.jpg"
											alt="User Avatar"
											class="img-size-50 rounded-circle me-3"
										/>
									</div>
									<div class="flex-grow-1">
										<h3 class="dropdown-item-title">
											Brad Diesel
											<span class="float-end fs-7 text-danger"
											><i class="bi bi-star-fill"></i
											></span>
										</h3>
										<p class="fs-7">Call me whenever you can...</p>
										<p class="fs-7 text-secondary">
											<i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
										</p>
									</div>
								</div>
								<!--end::Message-->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<!--begin::Message-->
								<div class="d-flex">
									<div class="flex-shrink-0">
										<img
											src="/adminlte-assets/img/user8-128x128.jpg"
											alt="User Avatar"
											class="img-size-50 rounded-circle me-3"
										/>
									</div>
									<div class="flex-grow-1">
										<h3 class="dropdown-item-title">
											John Pierce
											<span class="float-end fs-7 text-secondary">
                              <i class="bi bi-star-fill"></i>
                            </span>
										</h3>
										<p class="fs-7">I got your message bro</p>
										<p class="fs-7 text-secondary">
											<i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
										</p>
									</div>
								</div>
								<!--end::Message-->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<!--begin::Message-->
								<div class="d-flex">
									<div class="flex-shrink-0">
										<img
											src="/adminlte-assets/img/user3-128x128.jpg"
											alt="User Avatar"
											class="img-size-50 rounded-circle me-3"
										/>
									</div>
									<div class="flex-grow-1">
										<h3 class="dropdown-item-title">
											Nora Silvester
											<span class="float-end fs-7 text-warning">
                              <i class="bi bi-star-fill"></i>
                            </span>
										</h3>
										<p class="fs-7">The subject goes here</p>
										<p class="fs-7 text-secondary">
											<i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
										</p>
									</div>
								</div>
								<!--end::Message-->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
						</div>
					</li>

					<!--Notifications -->
					<li class="nav-item dropdown" v-if="notificationsEnabled">
						<a class="nav-link" data-bs-toggle="dropdown" href="#">
							<i class="bi bi-bell-fill"></i>
							<span class="navbar-badge badge text-bg-warning">15</span>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
							<span class="dropdown-item dropdown-header">15 Notifications</span>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="bi bi-envelope me-2"></i> 4 new messages
								<span class="float-end text-secondary fs-7">3 mins</span>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="bi bi-people-fill me-2"></i> 8 friend requests
								<span class="float-end text-secondary fs-7">12 hours</span>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
								<span class="float-end text-secondary fs-7">2 days</span>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
						</div>
					</li>

					<!-- User -->
					<li class="nav-item dropdown user-menu">
						<!-- Header -->
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
							<img
								src="/adminlte-assets/img/user2-160x160.jpg"
								class="user-image rounded-circle shadow"
								alt="User Image"
							/>
							<span class="d-none d-md-inline">Alexander Pierce</span>
						</a>

						<!-- User Dropdown -->
						<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
							<!-- User Image -->
							<li class="user-header text-bg-primary">
								<img
									src="/adminlte-assets/img/user2-160x160.jpg"
									class="rounded-circle shadow"
									alt="User Image"
								/>
								<p>
									Alexander Pierce - Web Developer
									<small>Member since Nov. 2023</small>
								</p>
							</li>

							<!-- User Menu -->
							<li class="user-body">
								<div class="row">
									<div class="col-4 text-center">
										<a href="#">Followers</a>
									</div>
									<div class="col-4 text-center">
										<a href="#">Sales</a>
									</div>
									<div class="col-4 text-center">
										<a href="#">Friends</a>
									</div>
								</div>
							</li>

							<!-- User Footer -->
							<li class="user-footer">
								<a href="#" class="btn btn-default btn-flat">Profile</a>
								<a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
							</li>
						</ul>
					</li>
				</template>

				<!-- Logged out -->
				<template v-else>
					<!-- Login -->
					<li class="nav-item d-none d-md-block">
						<router-link to="login" class="nav-link">Login</router-link>
					</li>
				</template>

				<!-- Fullscreen Toggle -->
				<li class="nav-item">
					<a class="nav-link" href="#" data-lte-toggle="fullscreen">
						<i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
						<i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
					</a>
				</li>
			</ul>
		</div>
	</nav>
</template>

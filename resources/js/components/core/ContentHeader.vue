<script setup>
import {defineProps} from 'vue';

// Define the props
const props = defineProps({
	title: {
		type: String,
		default: 'Dashboard'
	},
	centered: {
		type: Boolean,
		default: false
	}
});
</script>

<template>
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<!-- Title -->
				<template v-if="centered">
					<div class="col-12" style="text-align: center">
						<h3 class="mb-0">{{ title }}</h3>
					</div>
				</template>
				<template v-else>
					<div class="col-12">
						<h3 class="mb-0 float-start">{{ title }}</h3>
					</div>
				</template>
			</div>
		</div>
	</div>
</template>

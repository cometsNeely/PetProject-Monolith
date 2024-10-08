<script setup>

import { computed } from 'vue';
import { useStore } from "vuex";

const store = useStore();

		/*const counter = computed(() => {
			return store.state.count;
		});

		const increment = () => {
			store.commit('increment');
		};*/

</script>

<template>
	<h1>Home</h1>
	<!--<h1>Counter: {{ counter }}</h1>
	<button class="btn btn-success" @click="increment">Click me</button>-->
</template>


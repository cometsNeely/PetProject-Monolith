<script setup>

import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'

const store = useStore()

const router = useRouter()

const logout = async () => {

	try {
    await axios.post('/logout').then(res => {
		store.dispatch('getNewParamsMsgErrs')
    })
  	} catch (error) {
    	console.log('Error:', error);
  	}

	router.push({ path: '/login' })

		/*const counter = computed(() => {
			return store.state.count;
		});

		const increment = () => {
			store.commit('increment');
		};*/
}

</script>

<template>
	<div class="row">
    <div class="col-sm-12">
        <button class="btn btn-primary btn-md" Style="width: 100px;" @click="router.push({ path: '/login' })">Login</button>&nbsp;
		<button class="btn btn-dark btn-md" Style="width: 100px;" @click="router.push({ path: '/register' })">Register</button>&nbsp;
		<button class="btn btn-danger btn-md" Style="width: 100px;" @click="logout">Logout</button>
	</div>
	</div>
	<!--<h1>Counter: {{ counter }}</h1>
	<button class="btn btn-success" @click="increment">Click me</button>-->
</template>




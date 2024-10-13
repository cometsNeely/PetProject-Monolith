<script setup>
import { ref, watch } from 'vue'
import { onMounted } from 'vue'
import axios from 'axios'
import { useRoute } from 'vue-router'

const shows = ref([])
const path = ref()
const message = ref('')
const successFlag = ref(false)

const route = useRoute()

// with api token
//window.axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`

const getShowData = () => {

shows.value = []

  Echo.channel(`shows-channel.${path.value.substring(1)}`)
  .listen('.shows-app', (e) => {
  console.log(e.show);
  shows.value.push(e.show)
  });

axios
.post('/shows', {  path: path.value, })
.then(response => { 

  successFlag.value = true
  console.log(response.data.shows)

  response.data.shows.forEach(element => {
      shows.value.push(element)
  });

})

.catch(error => {
  if (error.message === 'Request failed with status code 401') {
    message.value = error.message
    successFlag.value = false
  }
})
}

watch(() => route.path,

    newPath => {
    if(path.value !== undefined) {
      Echo.channel(`shows-channel.${path.value.substring(1)}`)
      .stopListening('.shows-app')
      Echo.leaveChannel(`shows-channel.${path.value.substring(1)}`);
    }
    path.value = newPath
    getShowData()

  },

  { 

    immediate: true 

  })

onMounted(() => {

  //

})

</script>

<template>
  <div v-if="message !== ''" class="alert alert-danger" role="alert">
    {{ message }}
  </div>
  <div v-if="successFlag === true">
  <div class="alert alert-success" role="alert" v-if="shows.length === 0">
    Please, wait for loading data...
  </div>
  <div v-for="(show, index) in shows">

    {{ index+1 }}: {{ show.name }} 
    
  </div>
  </div>
</template>
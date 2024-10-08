<script setup>
import { ref, watch } from 'vue'
import { onMounted, onUpdated } from 'vue'
import axios from 'axios'
import { useRoute } from 'vue-router'

const shows = ref([])
const path = ref()

const route = useRoute()
axios.defaults.baseURL = 'http://localhost:80/api/'

window.Pusher.logToConsole = true;


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

function getShowData() {

  shows.value = []

    Echo.channel(`shows-channel.${path.value.substring(1)}`)
    .listen('.shows-app', (e) => {
    console.log(e.show);
    shows.value.push(e.show)
    });


axios
  .post('/shows', {  path: path.value, })
  .then(response => { 

    console.log(response.data.shows)

    response.data.shows.forEach(element => {
        shows.value.push(element)
    });

  })

  .catch(error => {
   console.log('Error:', error);
   
})
}

</script>

<template>
  <div class="alert alert-success" role="alert" v-if="shows.length===0">
    Please, wait for loading data...
  </div>
  <div v-for="(show, index) in shows">

    {{ index+1 }}: {{ show.name }} 
    
  </div>
</template>
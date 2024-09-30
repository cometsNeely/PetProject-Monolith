<script setup>
import { ref, watch } from 'vue'
import { onMounted, onUpdated } from 'vue'
import axios from 'axios'
import { useRoute } from 'vue-router'

const shows = ref([])
const path = ref()

const route = useRoute()
axios.defaults.baseURL = 'http://localhost:80/api/'

watch(() => route.path,

    newPath => {
    path.value = newPath
    shows.value = []
    getShowData()

  },

  { 

    immediate: true 

  })

onMounted(() => {

  //

})

function getShowData() {

axios
  .post('/shows', {  path: path.value, })
  .then(response => { 

    console.log(response.data.shows)

    response.data.shows.forEach(element => {
      element.forEach(elementInside => {
        shows.value.push(elementInside)
      });
    });

  })

  .catch(error => {
   console.log('Error:', error);
   
})
}

</script>

<template>
  <div v-for="(show, index) in shows">

    {{ index+1 }}: {{ show }} 
    
  </div>
</template>
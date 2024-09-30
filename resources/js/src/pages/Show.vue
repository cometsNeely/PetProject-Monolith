<script setup>
import { ref } from 'vue'
import { onMounted } from 'vue'
import axios from 'axios'

const shows = ref([])

axios.defaults.baseURL = 'http://localhost:80/api/';

onMounted(() => {

  axios
    .get('/shows')
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
     
});

})

</script>

<template>
  <div v-for="(show, index) in shows">
    {{ index+1 }}: {{ show }} 
  </div>
</template>
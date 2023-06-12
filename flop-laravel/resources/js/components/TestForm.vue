<template>
    <div>
      <form @submit.prevent="uploadFiles">
        <input type="file" ref="audio" accept="audio/*">
        <input type="file" ref="image" accept="image/*">
        <input type="text" v-model="textField">
        <input type="file" ref="video" accept="video/*">
        <button type="submit">Envoyer</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  export default {
    data() {
      return {
        textField: ''
      };
    },
    methods: {
      uploadFiles() {
        const formData = new FormData();
        formData.append('audio', this.$refs.audio.files[0]);
        formData.append('image', this.$refs.image.files[0]);
        formData.append('textField', this.textField);
        formData.append('video', this.$refs.video.files[0]);
        console.log(formData.get('audio'));
        console.log(formData.get('image'));
        console.log(formData.get('textField'));
        console.log(formData.get('video'));
        axios.post('/formSubmit', formData)
          .then(response => {
            console.log(response.data);
            // Traitez la réponse du serveur ici
          })
          .catch(error => {
            console.error(error);
            // Traitez les erreurs ici
          });
      }
    }
  };
  </script>
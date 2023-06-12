<template>
  <form @submit.prevent="uploadFiles">
    <div class="countdown-container" :class="{ 'expanded': isExpanded }" >
      <div class="arrow-container" @click="toggleExpand">
        <i class="arrow-icon" :class="{ 'expanded': isExpanded }" @click="isArrowClicked = true"></i>
      </div>
      <div class="image-container-title">
        <img src="img/défis.png" alt="Image">
      </div>
      <div class="text-container">
        <p class="countdown FontInter rose">{{ formatTime(countdown) }}</p>
        <div class="titre FontInter">Participe au défi en cours !</div>
      </div>
      <div class="expanded-content" v-if="isExpanded">
        <label for="video-upload" class="custom-file-upload FontMonserrat">
          Choisir une vidéo
          <input id="video-upload" class="expanded-input FontMonserrat champsVideo" type="file" accept="video/*" ref="video" name="video" @change="handleVideoUpload">
          <video class="selectedMedia" v-if="selectedVideo" :src="selectedVideo" controls></video>
        </label>

        <label for="image-upload" class="custom-file-upload FontMonserrat">
          Choisir une image
          <input id="image-upload" class="expanded-input FontMonserrat champsImage" type="file" ref="image" accept="image/*" name="image" @change="handleImageUpload">
          <img class="selectedMedia" v-if="selectedImage" :src="selectedImage" alt="Image">
        </label>
        <audio v-if="audioBlob" controls>
          <source :src="audioUrl" type="audio/webm">
          Votre navigateur ne prend pas en charge la lecture audio
        </audio>
        <button class="expanded-button audio FontMonserrat" @click="startRecording" v-if="!isRecording">Enregistrer</button>
        <button class="expanded-button audio FontMonserrat" @click="stopRecording" v-if="isRecording">Arrêter l'enregistrement</button>
        <input class="expanded-input FontMonserrat champsTexte" type="text" placeholder="Envoyer un message..." name="message" v-model="message" ref="expandedInput">
        <input type="hidden" ref="audio" name="audioBlob">
        <button class="expanded-button envoi FontMonserrat" type="submit">Envoyer ma participation</button>
        
      </div>
    </div>
  </form>
</template>


<script>
import axios from 'axios';
export default {
  data() {
    return {
      countdown: 0,
      intervalId: null,
      isExpanded: false,
      isArrowClicked: false,
      isRecording: false,
      mediaRecorder: null,
      chunks: [],
      audioBlob: null,
      selectedVideo: null,
      selectedImage: null,
      audioUrl: null,
      message: '',
      form: {
        video: null,
        image: null,
        message: '',
        audioBlob: null,
      },
    };
  },
  created() {
    this.startCountdown();
  },
  mounted() {
    axios.get('/api/home')
        .then(response => {
            console.log(response.challenges);
        })
        .catch(error => {
            console.log(error);
        });
},
  methods: {
    uploadFiles() {
        const formData = new FormData();
        /* formData.append('audio', this.$refs.audio.files[0]); */
        formData.append('image', this.$refs.image.files[0]);
        formData.append('message', this.message);
        formData.append('video', this.$refs.video.files[0]);
        /* console.log(formData.get('audio')); */
        console.log(formData.get('image'));
        console.log(formData.get('message'));
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
      },

    /* submit() {
      this.$emit('submit', this.form)
      console.log(this.form)
      console.log("test");

      let files = [this.form.video, this.form.image, this.form.message, this.form.audioBlob]
      const formData = new FormData();
      files.forEach(file=>{
        formData.append('filesName', file);
      }) */

      /* axios({
        method: 'post',
        url: '/participer',
        data: formData,
        headers: {'Content-Type': 'multipart/form-data' }
      })
      .catch(function (error) {
        console.log(error);
      }); */

      /* const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
     /*  let formData = new FormData();
      formData.append('video', this.form.video);
      formData.append('image', this.form.image);
      formData.append('message', this.form.message);
      formData.append('audioBlob', this.form.audioBlob);
       */

      /* axios.post('/participer', formData, config)
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error.response);
      }); */ 
      
    startCountdown() {
      const currentDate = new Date();
      const targetDate = new Date(currentDate.getFullYear(), 5, 16, 0, 0, 0); // 1er juin (mois indexé à partir de zéro)
      const remainingTime = targetDate.getTime() - currentDate.getTime();

      this.countdown = Math.ceil(remainingTime / 1000); // Conversion en secondes

      this.intervalId = setInterval(() => {
        this.countdown--;
        if (this.countdown <= 0) {
          clearInterval(this.intervalId);
          // Compte à rebours terminé, exécutez une action supplémentaire si nécessaire
        }
      }, 1000); // Mettez à jour le compte à rebours chaque seconde
    },
    formatTime(time) {
      const hours = Math.floor(time / 3600);
      const minutes = Math.floor((time % 3600) / 60);
      const seconds = time % 60;

      return `${this.padNumber(hours)}:${this.padNumber(minutes)}:${this.padNumber(seconds)}`;
    },
    padNumber(number) {
      return String(number).padStart(2, '0');
    },
    toggleExpand() {
      if (this.isExpanded) {
        this.isExpanded = false;
      } else {
        this.isExpanded = true;
      }
    },
    startRecording() {
      this.isRecording = true;
      this.chunks = [];

      navigator.mediaDevices.getUserMedia({ audio: true })
        .then((stream) => {
          this.mediaRecorder = new MediaRecorder(stream);
          this.mediaRecorder.addEventListener('dataavailable', this.onDataAvailable);
          this.mediaRecorder.addEventListener('stop', this.onRecordingStop);
          this.mediaRecorder.start();
        })
        .catch((error) => {
          console.error('Erreur lors de l\'accès à l\'enregistrement audio :', error);
        });
    },
    stopRecording() {
      this.isRecording = false;
      this.mediaRecorder.stop();
    },
    onDataAvailable(event) {
      if (event.data.size > 0) {
        this.chunks.push(event.data);
      }
    },
    onRecordingStop() {
     
      this.audioBlob = new Blob(this.chunks, { type: 'audio/webm' }); 
      this.form.audioBlob = this.audioBlob;
    },
    handleImageUpload(event) {
      const file = event.target.files[0];
      this.form.image = file;
      this.selectedImage = URL.createObjectURL(file);
    },
    handleVideoUpload(event) {
      const file = event.target.files[0];
      this.form.video = file;
      this.selectedVideo = URL.createObjectURL(file);
    },
  },
  
  computed: {
    audioUrl() {
      return this.audioBlob ? URL.createObjectURL(this.audioBlob) : '';
    },
    
  },
};
</script>

<style>
.countdown-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 50px;
  background-color: #303030;
  border-radius: 8px;
  margin-left: auto;
  margin-right: auto;
  width: 359px;
  position: relative;
  overflow: hidden;
  transition: all 0.3s ease;

}

.countdown-container.expanded {
  height: auto;
  align-items: flex-start;
  padding-bottom: 20px;
  display: flex; /* Ajouter cette ligne */
  flex-direction: column;
}

.arrow-container {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 30px;
  height: 30px;
  border-radius: 50% 0 0 0;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
  transform: rotate(45deg);
}

.arrow-icon {
  width: 12px;
  height: 12px;
  border-right: 2px solid #fff;
  border-top: 2px solid #fff;
  transform: rotate(90deg);
  transition: all 0.3s ease;
}

.arrow-icon.expanded {
  transform: rotate(-90deg);
}

.image-container-title {
  padding-top: 36px;
  padding-bottom: 20px;
  padding-left: 20px;
  padding-right: 20px;
}

.image-container-title img {
  width: 100px;
  height: auto;
  border-radius: 8px;
}

.countdown-container.expanded .image-container-title {
  padding: 0px;
  height: 20%;
}

.countdown-container.expanded .image-container-title img {
  border-radius: 0px;
  width: 100%;
}

.text-container {
  padding: 20px;
  padding-top: 10px;
}

.countdown {
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 10px; /* Ajout de la marge inférieure */
}

.titre {
  font-size: 20px;
  font-weight: bold;
  margin-top: 10px;
  margin-bottom: 10px;
}

.expanded-button {
  margin-bottom: 10px;
}

.expanded-input {
  width: 85%;
  padding: 8px;
  border-radius: 8px;
  border: none;
  margin-bottom: 10px;
  color: black;
}

.expanded-content {
  width: 100%;
  bottom: 40px;
  display: flex;
  align-items: center;
  flex-direction: column;
  
}
.expanded-button{
  border-radius: 8px;
  background-color: #E60099;
  font-weight: bold;
  border: none;
  width: 90%;
  font-size: 18px;
}

.custom-file-upload {
  width: 85%;
  padding: 8px;
  border-radius: 8px;
  border: none;
  margin-bottom: 10px;
  background-color: #E60099;
  color: #fff;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
  font-size: 18px;

}

.selectedMedia {
  width: 100%;
  height: auto;
  border-radius: 8px;
}

 #image-upload, #video-upload {
  display: none;
} 
</style>

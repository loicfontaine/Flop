<template>
  <div class="countdown-container" :class="{ 'expanded': isExpanded }" @click="toggleExpand">
    <div class="arrow-container">
      <i class="arrow-icon" :class="{ 'expanded': isExpanded }"></i>
    </div>
    <div class="image-container">
      <img src="img/défis.png" alt="Image">
    </div>
    <div class="text-container">
      <p class="countdown FontInter rose">{{ formatTime(countdown) }}</p>
      <div class="titre FontInter">Participe au défi en cours !</div>
      
    </div>
  <div class="expanded-content" v-if="isExpanded">
        <button class="expanded-button">Cliquez ici</button>
        <input class="expanded-input" type="text" placeholder="Remplissez le champ">
      </div>
      </div>
</template>

<script>
export default {
  data() {
    return {
      countdown: 0,
      intervalId: null,
      isExpanded: false
    };
  },
  created() {
    this.startCountdown();
  },
  methods: {
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
      this.isExpanded = !this.isExpanded;
    }
  }
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
  height: 330px;
  align-items: flex-start;
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

.image-container {
  padding-top: 35px;
  padding-bottom: 20px;
  padding-left: 20px;
  padding-right: 20px;
}

.image-container img {
  width: 100px;
  height: auto;
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

.expanded-content {
  padding: 20px;}

.expanded-button {
  margin-bottom: 10px;
}

.expanded-input {
  width: 100%;
  padding: 8px;
}
</style>

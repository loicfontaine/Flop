<template>
    <form>
      <input type="text" v-model="firstName" placeholder="Prénom">
        <input type="text" v-model="lastName" placeholder="Nom">
        <input type="text" v-model="username" placeholder="Nom d'utilisateur">
        <input type="email" v-model="email" placeholder="Adresse e-mail">
        <input type="number" v-model="phone" placeholder="Numéro de téléphone">
        <input type="password" v-model="password" placeholder="Mot de passe">
         <input type="text" v-model="address" placeholder="Adresse">
        <input type="radio" id="option1" value="option1" v-model="selectedOption">
        <label>
            <input type="checkbox" v-model="checkedOptions" value="option1">
            J'accepte les conditions d'utilisation
        </label>
        <label>
            <input type="checkbox" v-model="checkedOptions" value="option1">
            J'accepte la charte de confidentialité
        </label>
   
      <button type="submit">S'inscrire</button>
    </form>
  </template>
  
  <script>
  export default {
    data() {
      return {
        firstName: '',
        lastName: '',
        username: '',
        email: '',
        phone: '',
        password: '',
        address: '',
        
      };
    },
    methods: {
      submitForm() {
        // Traitement de la soumission du formulaire ici (par exemple, appel à une API Laravel)
      }
    }
  };
  </script>
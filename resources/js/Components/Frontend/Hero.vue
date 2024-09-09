<template>
  <section id="hero" class="relative flex items-center justify-center h-screen bg-parallax"
           :style="{ backgroundImage: 'url(' + heroBackgroundImage + ')' }">
    <div class="absolute inset-0 bg-black opacity-60"></div>
    <div class="relative z-10 text-center text-white px-6">
      <p class="text-xl md:text-2xl font-bold mb-2 animate-fade-in-down text-white ml-2">
        Welcome to my website
      </p>
      <br>
      <h1 class="text-4xl md:text-6xl font-bold animate-fade-in-down text-white">
        {{ profil.name }}
      </h1>
      <br>
      <br>
      <a href="/CV.pdf" class="cv-button bg-transparent text-white font-bold py-3 px-8 rounded-full transition-transform transform hover:scale-105 animate-slide-in-left ml-2">
        CV Creatif
      </a> 
    </div>
  </section>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  profil: Object
});

const heroBackgroundImage = 'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?auto=format&fit=crop&w=1400&q=80';
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Nerko+One&display=swap');

@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideInLeft {
  0% {
    opacity: 0;
    transform: translateX(-50px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-fade-in-down {
  animation: fadeInDown 1s ease-out;
}

.animate-fade-in-up {
  animation: fadeInUp 1s ease-out;
}

.animate-slide-in-left {
  animation: slideInLeft 0.5s ease-out;
}

.bg-parallax {
  background-attachment: fixed;
  background-size: cover;
  background-position: center;
  background-clip: border-box;
}

/* Custom Button Styles */
.cv-button {
  background-color: red;
  color: white;
 
  transition: background-color 0.5s ease, border-color 0.5s ease; /* Smooth transition */
}



.cv-button:focus {
  outline: none; /* Remove default focus outline */
}

h1{
  font-family: 'Nerko One', 'sans-serif';
}
</style>

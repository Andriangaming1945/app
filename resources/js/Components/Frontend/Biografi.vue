<template>
  <section class="relative bg-black text-white py-12">
    <div class="absolute inset-0 overflow-hidden w-full h-full">
      <div class="animated-background w-full h-full"></div>
    </div>
    <div class="container mx-auto h-full flex items-center justify-center relative z-10 px-4">
      <div 
        class="flex flex-col items-center justify-center p-6 bg-transparent rounded-lg"
        v-if="biografi" style="font-size: 18px;">
        <div class="flex flex-col sm:flex-row flex-wrap gap-6 sm:gap-8">
          <div class="flex flex-col items-center text-center sm:text-left">
            <p class="font-bold text-crimson">Nama:</p>
            <p>{{ biografi.longname }}</p>
          </div>
          <div class="flex flex-col items-center text-center sm:text-left">
            <p class="font-bold text-crimson">Umur:</p>
            <p>{{ biografi.umur }}</p>
          </div>
          <div class="flex flex-col items-center text-center sm:text-left">
            <p class="font-bold text-crimson">Email:</p>
            <p>{{ biografi.email }}</p>
          </div>
          <div class="flex flex-col items-center text-center sm:text-left">
            <p class="font-bold text-crimson">No. Telp:</p>
            <p>{{ biografi.notelp }}</p>
          </div>
          <div class="flex flex-col items-center text-center sm:text-left">
            <p class="font-bold text-crimson">Agama:</p>
            <p>{{ biografi.agama }}</p>
          </div>
          <div class="flex flex-col items-center text-center sm:text-left">
            <p class="font-bold text-crimson">Pendidikan:</p>
            <p>{{ biografi.pendidikan }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const props = defineProps({
  biografi: Object
});
</script>

<style scoped>
/* Define the keyframes for the background animation */
@keyframes colorMove {
  0% {
    background-position: 0% 0%;
  }
  25% {
    background-position: 100% 0%;
  }
  50% {
    background-position: 100% 100%;
  }
  75% {
    background-position: 0% 100%;
  }
  100% {
    background-position: 0% 0%;
  }
}

/* Apply animation to the entire background */
.animated-background {
  background: linear-gradient(135deg, red, #991b1b, transparent, transparent);
  background-size: 200% 200%;
  animation: colorMove 5s linear infinite;
}

/* Customize text color */
.text-crimson {
  color: #fff; /* Use crimson color for text */
}

/* Responsive design adjustments */


.container {
  padding: 0 1rem; /* Default padding for small screens */
}

@media (min-width: 640px) {
  section {
    min-height: auto; /* Allow height to adjust based on content */
  }
  .container {
    padding: 0 2rem; /* Increased padding for larger screens */
  }
}

/* Flex adjustments for smaller screens */
@media (max-width: 640px) {
  .flex-col {
    flex-direction: column;
    align-items: center; /* Center items in column layout */
  }
}
</style>

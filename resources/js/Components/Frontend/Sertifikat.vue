<template>
  <div id="sertifikat" class="p-4 flex flex-col relative overflow-hidden">
    <h1 class="text-center text-3xl font-bold mb-8 text-white" data-aos="fade-down">Certificate</h1>
    <div class="flex justify-center w-full">
      <div class="grid-container">
        <div
          v-for="sertifikat in sertifikats"
          :key="sertifikat.id"
          class="certificate-card bg-white shadow-lg rounded-lg p-4 flex flex-col items-center"
          data-aos="fade-up"
        >
          <img :src="`/storage/sertifikat_images/${sertifikat.images}`" alt="Certificate Image" class="w-full h-48 object-cover rounded-lg mb-4"/>
          <h2 class="text-lg font-bold mb-2 text-center">{{ sertifikat.desc }}</h2>
          <a :href="sertifikat.sertif_url" target="_blank" class="text-blue-500 underline">Lihat Sertifikat</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  sertifikats: Array
});
</script>

<style scoped>
/* Background with a new gradient animation */
#sertifikat {
  position: relative;
  overflow: hidden;
  background: linear-gradient(135deg, red, black, crimson, #991b1b);
  background-size: 400% 400%; /* Increase the size for smooth animation */
  animation: gradientMove 17s linear infinite; /* Animation to move background */
  padding-top: 40px; /* Adds padding to move the content down */
  height: 450px;
}

/* Keyframes for the new gradient animation */
@keyframes gradientMove {
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

/* Parallax effect */
#sertifikat::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: inherit; /* Inherits background from the parent */
  z-index: -1;
  transform: translateZ(-1px) scale(1.5); /* Adjust scale for parallax effect */
  will-change: transform;
  background-attachment: fixed; /* Ensures the background moves at different speeds */
}

/* Grid Container Styles */
.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1rem;
  max-width: 100%;
  justify-content: center;
}

/* Certificate Card Styles */
.certificate-card {
  transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for zoom effect */
}

/* Hover effect for certificate cards */
.certificate-card:hover {
  transform: scale(1.05); /* Zoom effect */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Optional: Enhance shadow on hover */
}

/* Responsive adjustments */
@media (max-width: 640px) {
  #sertifikat {
    height: auto; /* Allow height to adjust based on content */
    padding-top: 20px; /* Reduced padding for smaller screens */
  }

  .certificate-card {
    padding: 2px; /* Adjust padding for smaller screens */
  }

  .text-lg {
    font-size: 1rem; /* Adjust font size for smaller screens */
  }

  .w-full {
    width: 100%; /* Ensure full width for images */
  }

  .h-48 {
    height: 200px; /* Adjust image height for smaller screens */
  }
}

@media (min-width: 641px) {
  #sertifikat {
    height: 450px; /* Default height for larger screens */
    padding-top: 40px; /* Default padding */
  }

  .text-lg {
    font-size: 1.125rem; /* Default font size for larger screens */
  }
}
</style>

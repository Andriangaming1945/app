<template>
  <div class="full-width-background">
    <section id="organisasi" class="container">
      <h1 class="text-4xl font-bold text-center mb-8 text-white">Organizational Experience</h1>

      <!-- Organizational Experience Section -->
      <section class="experience-section">
        <article v-for="organisasi in organisasis" :key="organisasi.id" class="experience-card">
          <h3 class="text-xl font-semibold text-white">{{ organisasi.nama_organisasi }} - {{ organisasi.periode }}</h3>
          <br>
          <p><strong>Posisi:</strong> {{ organisasi.posisi }}</p>
          <br>
          <p><strong>Tugas:</strong></p>
          <ul>
            <li v-for="(tugas, index) in formatTugas(organisasi.tugas)" :key="index">{{ tugas }}</li>
          </ul>
          <br>
          <p v-if="organisasi.hasil_karya"><strong>Hasil karya:</strong> 
            <a :href="organisasi.hasil_karya" target="_blank" class="text-blue-400 hover:text-blue-600" style="margin-left: 5px;">Lihat hasil karya</a>
          </p>

        </article>
      </section>
    </section>
  </div>
</template>

<script>
export default {
  props: {
    organisasis: Array
  },
  methods: {
    formatTugas(tugas) {
      return tugas ? tugas.split('\n').map(item => item.trim()) : ['N/A'];
    }
  }
}
</script>

<style scoped>
/* Full width background container */
.full-width-background {
  width: 100%;
  background: linear-gradient(135deg, #991b1b, #991b1b 25%, black 25%, black 50%, #991b1b 50%, #991b1b 75%, black 75%, black);
  background-size: 400% 400%;
  animation: splashScreenHorizontal 15s ease infinite;
  padding: 0;
  position: relative;
  min-height: 600px;
}

/* Container styles */
.container {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  max-width: 1200px;
  padding: 2rem;
  margin: 0 auto;
  padding-top: 80px;
}

/* Title Styles */
h1 {
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  margin-bottom: 1rem;
}

/* Experience Section */
.experience-section {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  width: 100%;
  margin-left: 3px;
}

/* Experience Card Styles */
.experience-card {
  background-color: rgba(26, 26, 26, 0.8);
  border: 1px solid #ff0000;
  color: white;
  padding: 1.5rem;
  border-radius: 8px;
  margin-top: 1rem;
  width: 100%;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  text-align: left;
  opacity: 0;
  transform: translateX(-50px);
  animation: slideInFromLeft 1s forwards;
}

@keyframes slideInFromLeft {
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

/* Hover effect for card */
.experience-card:hover {
  transform: scale(1.02);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

/* List Styles */
ul {
  padding-left: 1.5rem;
  list-style-type: disc;
}

li {
  margin-bottom: 0.5rem;
  color: #e0e0e0;
}

/* Keyframes for Gradient Animation */
@keyframes splashScreenHorizontal {
  0% {
    background-position: 0% 0%;
  }
  50% {
    background-position: 100% 0%;
  }
  100% {
    background-position: 0% 0%;
  }
}
</style>
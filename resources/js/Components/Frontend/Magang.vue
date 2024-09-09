<template>
  <div ref="backgroundContainer" :class="['full-width-background', backgroundClass]">
    <section id="magang" class="container">
      <br />
      <h1 class="text-4xl font-bold text-center mb-4 text-white">
        Work Experience
      </h1>
      <section class="experience-section">
        <article
          v-for="magang in magangs"
          :key="magang.id"
          class="experience-card"
          ref="cards"
        >
          <h3 class="text-xl font-semibold text-white">
            {{ magang.perusahaan }} - {{ magang.durasi }}
          </h3>
          <br>
          <div class="flex items-center">
            <strong>Divisi:</strong>
            <p v-html="magang.divis" class="ml-2"></p>
          </div>
          <br>
          <p><strong>Tugas:</strong></p>
          <ul>
            <li
              v-for="(tugas, index) in formatTugas(magang.tugas)"
              :key="index"
            >{{ tugas }}</li>
          </ul>
        </article>
      </section>
    </section>
  </div>
</template>

<script>
import { gsap } from 'gsap';

export default {
  props: {
    magangs: {
      type: Array,
      required: true,
    },
    backgroundClass: {
      type: String,
      default: 'default-height', // Default class if not provided
    },
  },
  mounted() {
    this.animateCards();
    this.updateBackgroundHeight();
    window.addEventListener('resize', this.updateBackgroundHeight);
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.updateBackgroundHeight);
  },
  methods: {
    animateCards() {
      gsap.from(this.$refs.cards, {
        opacity: 0,
        y: 50,
        stagger: 0.3,
        duration: 1,
        ease: 'power2.out',
      });
    },
    formatTugas(tugas) {
      if (!tugas || tugas.trim() === '') return ['N/A'];
      const tasks = tugas
        .split('\n')
        .map((item) => item.trim())
        .filter((item) => item.length > 0);

      return tasks.map((task) => {
        return task
          .replace(/\*(.*?)\*/g, '<strong>$1</strong>')
          .replace(/_(.*?)_/g, '<em>$1</em>');
      });
    },
    updateBackgroundHeight() {
      const container = this.$refs.backgroundContainer;
      container.style.height = `${container.scrollHeight}px`;
    },
  },
};
</script>


<style scoped>
/* Full width background container */
.full-width-background {
  width: 100%;
  background: linear-gradient(
    135deg,
    #991b1b,
    #991b1b 25%,
    black 25%,
    black 50%,
    #991b1b 50%,
    #991b1b 75%,
    black 75%,
    black
  );
  background-size: 400% 400%;
  animation: gradientAnimation 15s ease infinite;
  padding: 0;
  position: relative;
}

/* Default height */
.default-height {
  min-height: 1200px; /* Set minimum height */
}

/* Container styles */
.container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  max-width: 1200px;
  padding: 2rem;
  margin: 0 auto;
  padding-top: 100px;
}

/* Title Styles */
h1 {
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  margin-bottom: 0.5rem;
}

/* Experience Section */
.experience-section {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  width: 100%;
  min-height: 900px; /* Set minimum height */
}

/* Experience Card Styles */
.experience-card {
  background-color: rgba(26, 26, 26, 0.8);
  border: 1px solid #ff0000;
  color: white;
  padding: 1.5rem;
  border-radius: 8px;
  margin-top: 0.5rem;
  width: 100%;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  text-align: left;
}

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
@keyframes gradientAnimation {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

/* Responsive Styles */
@media (max-width: 768px) {
  .container {
    padding: 1rem; /* Adjust padding for smaller screens */
    padding-top: 60px; /* Adjust top padding */
  }

  h1 {
    font-size: 2rem; /* Reduce font size for smaller screens */
  }

  .experience-section {
    min-height: 600px; /* Increase height for smaller screens */
  }

  .experience-card {
    padding: 1rem; /* Reduce padding for smaller screens */
  }

  ul {
    padding-left: 1rem; /* Adjust padding for smaller screens */
  }
}

@media (max-width: 480px) {
  h1 {
    font-size: 1.5rem; /* Further reduce font size for very small screens */
  }

  .experience-section {
    min-height: 900px; /* Further increase height for very small screens */
  }

  .experience-card {
    padding: 0.75rem; /* Further reduce padding */
  }

  ul {
    padding-left: 0.75rem; /* Further adjust padding */
  }
}
</style>

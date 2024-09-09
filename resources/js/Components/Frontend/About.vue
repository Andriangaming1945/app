<template>
  <section id="about" class="section bg-gradient">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col xl:flex-row gap-8 xl:gap-24 items-center xl:items-start">
        <div class="image-container" data-aos="flip-left">
          <img 
            class="profile-image medium"  
            :src="`/storage/${profil.images}`" 
            alt="about"
          />
        </div>

        <div class="text-container flex flex-col items-center text-center xl:items-start xl:text-left fade-in">
          <div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3" style="color: aliceblue;">
              About me
            </h2>
            <p class="mb-4 text-black" style="color: aliceblue;">{{ profil.name }}</p>
            <hr class="styled-hr mb-8">
            <p class="description mb-8">
              {{ profil.desc }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    profil: Object,
  },
  mounted() {
    this.addScrollAnimation();
  },
  methods: {
    addScrollAnimation() {
      const fadeInElements = document.querySelectorAll('.fade-in');
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
          }
        });
      }, { threshold: 0.1 });
      
      fadeInElements.forEach(element => {
        observer.observe(element);
      });
    }
  }
};
</script>

<style scoped>
.bg-gradient {
  background: linear-gradient(400deg, #991b1b, #991b1b 50%, black 50%, black);
  background-size: 200% 200%; 
  animation: gradientAnimation 5s ease infinite; 
}

@keyframes gradientAnimation {
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

.profile-image {
  width: 100%;
  max-width: 300px; /* Smaller image size for responsiveness */
  height: auto; 
  object-fit: cover;
  border-radius: 16px;
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.profile-image.medium {
  max-width: 250px; /* Medium size */
}

.profile-image.large {
  max-width: 400px; /* Larger size for bigger screens */
}

.profile-image:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.styled-hr {
  border: none;
  height: 4px;
  background-color: white;
  opacity: 1;
  margin-top: 1rem;
  margin-bottom: 2rem;
}

.text-container {
  padding: 1rem;
}

.description {
  font-size: 16px;
  line-height: 1.8;
  margin-top: 0;
  margin-bottom: 1.5rem;
  text-align: justify;
  color: white;
}

.fade-in {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.fade-in.visible {
  opacity: 1;
  transform: translateY(0);
}

@media (min-width: 640px) {
  .profile-image {
    max-width: 200px; /* Even smaller image size for mobile screens */
  }
}

@media (min-width: 1280px) {
  .image-container {
    width: 50%;
  }
  .text-container {
    padding-left: 2rem;
    padding-right: 2rem;
  }
}
</style>

<template>
  <section id="contact" class="contact-section">
    <div class="contact-form">
      <h3>Contact Me</h3>
      <form @submit.prevent="handleSubmit" ref="contactForm">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" v-model="form.name" required />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" v-model="form.email" required />
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" v-model="form.message" rows="4" required></textarea>
        </div>
        <button type="submit">Send Message</button>
      </form>
    </div>
  </section>
</template>

<script>
import emailjs from 'emailjs-com';

// Initialize EmailJS with your User ID
emailjs.init('Vorlw_ZnZwoW9M3fH');

export default {
  data() {
    return {
      form: {
        name: '',
        email: '',
        message: ''
      }
    };
  },
  methods: {
    async handleSubmit() {
      console.log('Form Data:', this.form);
      try {
        const response = await emailjs.sendForm('service_andiro', 'template_4wl25zi', this.$refs.contactForm);
        if (response.status === 200) {
          alert('Message sent successfully!');
          this.resetForm();
        } else {
          console.error('Failed to send message. Status:', response.status);
          alert('Failed to send message. Please try again.');
        }
      } catch (error) {
        console.error('Error sending message:', error);
        alert('Failed to send message. Please try again.');
      }
    },
    resetForm() {
      this.form.name = '';
      this.form.email = '';
      this.form.message = '';
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

/* Keyframes for background animation */
@keyframes backgroundAnimation {
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

.contact-section {
  padding: 50px 1rem;
  position: relative;
  overflow: hidden;
  background: linear-gradient(135deg, #b91c1c, black, #b91c1c, #991b1b);
  background-size: 400% 400%;
  animation: backgroundAnimation 17s ease infinite;
}

.contact-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: url('https://via.placeholder.com/1920x1080') no-repeat center center fixed;
  background-size: cover;
  transform: translateZ(-1px) scale(1.5);
  z-index: -1;
  filter: blur(8px);
}

.contact-form {
  max-width: 600px;
  margin: 0 auto;
  background: rgba(255, 255, 255, 0.9);
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.contact-form:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
}

.contact-form h3 {
  margin-bottom: 16px;
  color: #333;
  font-size: 1.8rem;
  font-family: 'Roboto', sans-serif;
}

.contact-form .form-group {
  margin-bottom: 20px;
}

.contact-form .form-group label {
  display: block;
  margin-bottom: 8px;
  color: #555;
}

.contact-form .form-group input,
.contact-form .form-group textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ddd;
  border-radius: 6px;
  box-sizing: border-box;
}

.contact-form button {
  background: linear-gradient(90deg, #ff0000, #000000); /* Gradient from red to black */
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  transition: background 0.3s ease, transform 0.3s ease;
}

.contact-form button:hover {
  background: linear-gradient(90deg, #000000, #ff0000); /* Gradient reversed on hover */
  transform: translateY(-2px); /* Slight lift effect on hover */
}

.contact-form button:active {
  background: linear-gradient(90deg, #ff4500, #000000); /* Slightly different gradient on active (click) */
  transform: translateY(0); /* Remove the lift effect when clicked */
  transition: background 0.2s ease, transform 0.2s ease; /* Smooth transition when clicking */
}

/* Responsive Styles */

/* For tablets and small laptops */
@media (max-width: 1024px) {
  .contact-form {
    padding: 15px; /* Adjust padding for medium screens */
  }

  .contact-form h3 {
    font-size: 1.6rem; /* Slightly smaller font size */
  }
}

/* For mobile devices */
@media (max-width: 768px) {
  .contact-form {
    padding: 10px; /* Further reduce padding for smaller screens */
  }

  .contact-form h3 {
    font-size: 1.4rem; /* Further reduce font size */
  }
}

/* For very small mobile devices */
@media (max-width: 480px) {
  .contact-form {
    padding: 8px; /* Further reduce padding for very small screens */
  }

  .contact-form h3 {
    font-size: 1.2rem; /* Further reduce font size */
  }
}
</style>

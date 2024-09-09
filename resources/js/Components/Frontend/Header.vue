<template>
  <nav :class="['fixed top-0 left-0 w-full z-50 transition-all', { 'navbar-bg-black': isScrolled }]" style="height: 90px; padding-top: 13px;">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <!-- Logo and Title -->
      <a href="/dashboard" class="flex items-center space-x-3 rtl:space-x-reverse">
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">PORTOFOLIO</span>
      </a>

      <!-- Mobile Menu Button -->
      <button @click="toggleMobileMenu" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg :class="{'is-active': showMobileMenu}" class="hamburger w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>

      <!-- Dropdown Menu -->
      <div :class="{'hidden': !showMobileMenu, 'block': showMobileMenu, 'dropdown-bg': !isScrolled, 'dropdown-bg-scrolled': isScrolled}" class="w-full md:block md:w-auto transition-all ease-in-out duration-300" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700 transition-all ease-in-out duration-300">
          <li><a @click.prevent="scrollToSection('hero')" class="block py-2 px-3 text-white rounded hover:text-red-500 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-red-500 md:dark:hover:bg-transparent">Home</a></li>
          <li><a @click.prevent="scrollToSection('about')" class="block py-2 px-3 text-white rounded hover:text-red-500 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-red-500 md:dark:hover:bg-transparent">About</a></li>
          <li><a @click.prevent="scrollToSection('sertifikat')" class="block py-2 px-3 text-white rounded hover:text-red-500 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-red-500 md:dark:hover:bg-transparent">Certificate</a></li>
          <li><a @click.prevent="scrollToSection('magang')" class="block py-2 px-3 text-white rounded hover:text-red-500 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-red-500 md:dark:hover:bg-transparent">Work experience</a></li>
          <li><a @click.prevent="scrollToSection('organisasi')" class="block py-2 px-3 text-white rounded hover:text-red-500 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-red-500 md:dark:hover:bg-transparent">Organizational experience</a></li>
          <li><a @click.prevent="scrollToSection('contact')" class="block py-2 px-3 text-white rounded hover:text-red-500 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-red-500 md:dark:hover:bg-transparent">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const showMobileMenu = ref(false);
const isScrolled = ref(false);

const toggleMobileMenu = () => {
  showMobileMenu.value = !showMobileMenu.value;
};

const handleScroll = () => {
  isScrolled.value = window.scrollY > 10;
};

const scrollToSection = (id) => {
  const element = document.getElementById(id);
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' });
    showMobileMenu.value = false; // Close the mobile menu after clicking on a link
  }
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Nerko+One&display=swap');

.navbar-bg-black {
  background-color: black !important;
  transition: background-color 0.3s ease;
}

.dropdown-bg {
  background-color: transparent;
  transition: background-color 0.3s ease-in-out;
}

.dropdown-bg-scrolled {
  background: linear-gradient(to bottom, black,);
  transition: background-color 0.3s ease-in-out;
}

nav, .font-medium a {
  font-family: 'Nerko One', sans-serif;
  font-size: 20px;
}

.hamburger {
  transition: transform 0.3s ease;
}

.hamburger.is-active {
  transform: rotate(90deg);
}

.hamburger.is-active path {
  stroke: #b91c1c; /* Optional: change the color of the hamburger lines when active */
}

#navbar-default > ul {
  background-color: inherit; /* Ensure dropdown items have the same background color */
  border-radius: 10px; /* Ensure background and border-radius match */
  padding: 0; /* Reset padding if needed */
}

#navbar-default.dropdown-bg {
  background-color: transparent;
}

#navbar-default.dropdown-bg-scrolled {
  background: black;
  transition: background-color 0.3s ease-in-out;
}

#navbar-default::before {
  content: "";
  position: absolute;
  top: -10px; /* Adjust as needed to cover border-radius */
  left: -10px; /* Adjust as needed to cover border-radius */
  width: calc(100% + 20px); /* Adjust width to cover border-radius */
  height: calc(100% + 20px); /* Adjust height to cover border-radius */
  border-radius: 20px; /* Adjust border-radius to match */
  background-color: inherit; /* Use the background color of dropdown-bg or dropdown-bg-scrolled */
  z-index: -1; /* Place behind the dropdown content */
  transition: background-color 0.3s ease-in-out;
}
</style>

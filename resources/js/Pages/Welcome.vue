<template>
  <div>
    <Head title="Welcome to Portfolio" />
    <Frontend>
      <!-- Hero section -->
      <Hero :profil="profil" v-if="profil" />
      <!-- About section -->
      <About :profil="profil" v-if="profil" />
      <!-- Biografi section -->
      <Biografi :biografi="biografi" v-if="biografi" />
      <!-- Pengalaman sertifkat section -->
      <Sertifikat :sertifikats="sertifikats" />

      <!-- Pengalaman magang section -->
      <Magang :magangs="magangs" /> 

       <!-- Pengalaman magang section -->
       <Organisasi :organisasis="organisasis" /> 


       <!----Contact ---->
       <Contact />
    </Frontend>
  </div>
</template>


<script setup>
import { Head } from '@inertiajs/vue3';
import Frontend from '@/Layouts/Frontend.vue';
import Hero from '@/Components/Frontend/Hero.vue';
import About from '@/Components/Frontend/About.vue';
import Biografi from '@/Components/Frontend/Biografi.vue';
import Sertifikat from '@/Components/Frontend/Sertifikat.vue';
import Magang from '@/Components/Frontend/Magang.vue';
import Organisasi from '@/Components/Frontend/Organisasi.vue';
import Contact from '@/Components/Frontend/Contact.vue';

const props = defineProps({
  profil: Object,
  biografi: Object,
  sertifikats: Array, // Prop sertifikats harus sesuai dengan nama yang digunakan
  magangs: Array,
  organisasis: Array
});
</script>

<script setup>   
import Footer from '@/Components/Frontend/Footer.vue';
import Header from '@/Components/Frontend/Header.vue';
</script>
<template>
    <div class="bg-slate-200 dark:g-slate-900">
        <!--header-->
        <Header />
        <main class="min-h-screen">
            <slot />
        </main>

         <!--footer-->
         <Footer />
    </div>
</template>



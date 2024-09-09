<template>
    <Head :title="'Profile - ' + profil.name" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile Details</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6">
                            <img :src="`/storage/${profil.images}`" :alt="profil.name" class="w-64 h-64 object-cover rounded-lg">
                        </div>
                        <h3 class="text-2xl font-bold mb-2">{{ profil.name }}</h3>
                        <p class="text-gray-700 whitespace-pre-wrap">{{ profil.desc }}</p>
                        <div class="mt-4">
                            <Link :href="route('profil.edit', profil.id)" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                                Edit Profile
                            </Link>
                            <Link :href="route('profil.index')" class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 ml-2">
                                Back to List
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    profil: Object,
});
</script>
<template>
    <Head title="Sertifikat" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sertifikat</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 py-2">
                    <Link :href="route('sertifikat.create')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">
                        Sertifikat Baru
                    </Link>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div v-if="sertifikats.length">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-10 py-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">URL</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="sertifikat in sertifikats" :key="sertifikat.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img :src="`/storage/sertifikat_images/${sertifikat.images}`" alt="Sertifikat Image" class="w-20 h-20 object-cover">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <a :href="sertifikat.sertif_url" target="_blank" class="text-blue-500 underline">
                                                {{ sertifikat.sertif_url }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            <p class="whitespace-pre-wrap">
                                                {{ sertifikat.desc }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button @click="deleteSertifikat(sertifikat.id)" class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700" title="Delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="text-center text-gray-500">
                            No certificates available.
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
import { Inertia } from '@inertiajs/inertia';

const props = defineProps(['sertifikats']);

const deleteSertifikat = async (id) => {
    if (confirm('Are you sure you want to delete this certificate?')) {
        try {
            await Inertia.delete(route('sertifikat.destroy', id));
        } catch (error) {
            console.error('Error deleting certificate:', error);
        }
    }
};
</script>

<style scoped>
.table-fixed {
    table-layout: fixed;
    width: 100%;
}
.whitespace-pre-wrap {
    white-space: pre-wrap;
    word-wrap: break-word;
}
</style>

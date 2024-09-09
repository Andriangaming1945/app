<template>
    <Head title="Profil" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profil</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 py-2">
                    <Link :href="route('profil.create')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">
                        Profile baru
                    </Link>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div v-if="profils.length">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-10 py-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Image
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="profil in profils" :key="profil.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img :src="`/storage/${profil.images}`" alt="Profil Image" class="w-20 h-20 object-cover">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ profil.name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            <p class="whitespace-pre-wrap">
                                                {{ profil.desc }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <Link :href="`/profil/${profil.id}`" class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700" title="Show">
                                                Show
                                            </Link>

                                            <Link :href="`/profil/${profil.id}/edit`" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 mx-2" title="Edit">
                                                Edit
                                            </Link>
                                            <button @click="deleteProfil(profil.id)" class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700" title="Delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="text-center text-gray-500">
                            No profiles available.
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

// Assuming 'profils' is passed from the server-side
const props = defineProps(['profils']);

// Method to handle deletion
const deleteProfil = async (id) => {
    if (confirm('Are you sure you want to delete this profile?')) {
        try {
            const response = await axios.delete(`/profil/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            });

            if (response.status === 200) {
                // Notify Inertia to refresh the list without reloading the page
                Inertia.visit(route('profil.index'), { preserveState: true });
            } else {
                throw new Error('Failed to delete profile');
            }
        } catch (error) {
            console.error('Error deleting profile:', error);
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
    white-space: pre-wrap; /* This preserves whitespace and wraps text */
    word-wrap: break-word; /* This allows breaking long words if necessary */
}
</style>
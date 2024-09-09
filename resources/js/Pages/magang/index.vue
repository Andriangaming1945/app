<template>
    <Head title="Magang" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Magang</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 py-2">
                    <Link :href="route('magang.create')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">Tambah Magang</Link>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div v-if="magangs.length">
                            <div class="table-container">
                                <table class="table">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Perusahaan</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Divisi</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tugas</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="magang in magangs" :key="magang.id">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ magang.perusahaan }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ magang.durasi }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" v-html="formatText(magang.divis)"></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <div class="tugas-text" v-html="formatText(magang.tugas)"></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right flex gap-2">
                                                <Link :href="`/magang/${magang.id}/edit`" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700" title="Edit">
                                                    Edit
                                                </Link>
                                                <button @click="deleteMagang(magang.id)" class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700" title="Delete">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div v-else class="text-center text-gray-500">
                            Tidak ada data magang yang tersedia.
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

const props = defineProps({
    magangs: Array
});

const deleteMagang = (id) => {
    if (confirm('Apakah Anda yakin ingin menghapus magang ini?')) {
        Inertia.delete(route('magang.destroy', id), {
            onSuccess: () => {
                // Menghapus item dari array `magangs` tanpa me-refresh halaman
                magangs = magangs.filter(magang => magang.id !== id);
            },
            preserveScroll: true, // Menjaga posisi scroll saat penghapusan
            preserveState: true   // Menjaga state halaman
        });
    }
};

const formatText = (text) => {
    // Replace text formatting markers with HTML
    return text
        .replace(/\*(.*?)\*/g, '<strong>$1</strong>') // Bold
        .replace(/_(.*?)_/g, '<em>$1</em>') // Italic
        .replace(/^- (.*)$/gm, '<li>$1</li>') // Bullet points
        .replace(/^\d+\. (.*)$/gm, '<li>$1</li>'); // Numbered list
};
</script>

<style scoped>
.table-container {
    width: 100%;
    overflow-x: auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 14px 19px;
    text-align: left;
}

.table td {
    white-space: normal;
}

.table .flex {
    display: flex;
    justify-content: flex-end;
    gap: 0.5rem;
}

.tugas-text {
    white-space: pre-wrap;
    line-height: 1.5;
}
</style>

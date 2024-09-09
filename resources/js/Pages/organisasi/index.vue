<template>
    <Head title="Organisasi" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Organisasi</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 py-2">
                    <Link :href="route('organisasi.create')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">Tambah Organisasi</Link>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div v-if="organisasis.length">
                            <div class="table-container">
                                <table class="table">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Organisasi</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periode</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posisi</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tugas</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hasil Karya</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="organisasi in organisasis" :key="organisasi.id">
                                            <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900">{{ organisasi.nama_organisasi }}</td>
                                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">{{ organisasi.periode }}</td>
                                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">{{ organisasi.posisi }}</td>
                                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">{{ organisasi.durasi }}</td>
                                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">{{ organisasi.tugas }}</td>
                                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                                                <template v-if="organisasi.hasil_karya">
                                                    <a :href="organisasi.hasil_karya" class="text-indigo-600 hover:text-indigo-900" target="_blank">Lihat Hasil Karya</a>
                                                </template>
                                                <template v-else>
                                                    Tidak ada hasil karya
                                                </template>
                                            </td>
                                            <td class="px-9 py-10 whitespace-nowrap text-sm font-medium flex justify-between">
                                                <!-- Edit Link -->
                                                <Link :href="`/organisasi/${organisasi.id}/edit`" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700" title="Edit">
                                                    Edit
                                                </Link>
                                                <!-- Delete Button -->
                                                <button @click="deleteOrganisasi(organisasi.id)" class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700" title="Delete">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div v-else class="text-center text-gray-500">
                            Tidak ada data organisasi yang tersedia.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link, usePage, router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    organisasis: Array,
});

const deleteOrganisasi = async (id) => {
    if (confirm('Apakah Anda yakin ingin menghapus organisasi ini?')) {
        try {
            await router.delete(`/organisasi/${id}`, {
                preserveState: true, // Menjaga state halaman agar tidak reload
                onSuccess: () => {
                    // Remove the deleted item from the local state (for instant UI update)
                    props.organisasis = props.organisasis.filter(organisasi => organisasi.id !== id);
                },
            });
        } catch (error) {
            console.error('Error deleting organisasi:', error);
        }
    }
};
</script>

<style scoped>
.table-container {
    width: 100%;
    overflow-x: auto; /* Mengizinkan scroll horizontal jika tabel melebihi lebar kontainer */
}

.table {
    width: 100%; /* Memastikan tabel mengambil seluruh lebar kontainer */
    border-collapse: collapse; /* Menghapus jarak antar border sel */
}

.table th, .table td {
    padding: 14px 19px; /* Padding di sekitar sel tabel */
    text-align: left;
}

.table td {
    white-space: normal; /* Mengizinkan teks membungkus ke baris berikutnya */
    word-wrap: break-word; /* Memecah kata yang terlalu panjang */
}

.table .flex {
    display: flex;
    justify-content: space-between; /* Mengatur tombol Edit dan Delete di kiri dan kanan */
    margin-top: 25%;
}
</style>

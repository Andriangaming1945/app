<template>
    <Head title="Edit Organisasi" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Organisasi</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submitForm">
                            <div class="mb-4">
                                <label for="nama_organisasi" class="block text-sm font-medium text-gray-700">Nama Organisasi</label>
                                <input id="nama_organisasi" v-model="form.nama_organisasi" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="mb-4">
                                <label for="periode" class="block text-sm font-medium text-gray-700">Periode</label>
                                <input id="periode" v-model="form.periode" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="mb-4">
                                <label for="posisi" class="block text-sm font-medium text-gray-700">Posisi</label>
                                <input id="posisi" v-model="form.posisi" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="mb-4">
                                <label for="durasi" class="block text-sm font-medium text-gray-700">Durasi</label>
                                <input id="durasi" v-model="form.durasi" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="mb-4">
                                <label for="tugas" class="block text-sm font-medium text-gray-700">Tugas</label>
                                <textarea id="tugas" v-model="form.tugas" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="hasil_karya" class="block text-sm font-medium text-gray-700">Hasil Karya</label>
                                <input id="hasil_karya" v-model="form.hasil_karya" type="url" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="https://example.com">
                            </div>

                            <div class="flex justify-end">
                                <Link :href="route('organisasi.index')" class="mr-4 inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">Batal</Link>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-700">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    organisasi: Object,
});

const form = useForm({
    id: props.organisasi.id,
    nama_organisasi: props.organisasi.nama_organisasi,
    periode: props.organisasi.periode,
    posisi: props.organisasi.posisi,
    durasi: props.organisasi.durasi,
    tugas: props.organisasi.tugas,
    hasil_karya: props.organisasi.hasil_karya,
});

const submitForm = () => {
    form.put(route('organisasi.update', form.id));
};
</script>

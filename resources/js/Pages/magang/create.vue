<template>
    <Head title="New Magang" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Magang</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="perusahaan" class="block text-sm font-medium text-gray-700">Perusahaan</label>
                                    <input
                                        id="perusahaan"
                                        v-model="form.perusahaan"
                                        type="text"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="durasi" class="block text-sm font-medium text-gray-700">Durasi</label>
                                    <input
                                        id="durasi"
                                        v-model="form.durasi"
                                        type="text"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="divisi" class="block text-sm font-medium text-gray-700">Divisi</label>
                                    <ckeditor
                                        :editor="ClassicEditor"
                                        v-model="form.divis"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    />
                                </div>

                                <div>
                                    <label for="tugas" class="block text-sm font-medium text-gray-700">Tugas</label>
                                    <textarea
                                        id="tugas"
                                        v-model="form.tugas"
                                        rows="4"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        required
                                    ></textarea>
                                </div>

                                <div>
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md"
                                    >
                                        Save
                                    </button>
                                    <Link :href="route('magang.index')" class="ml-4 text-indigo-600 hover:text-indigo-900">Back to List</Link>
                                </div>
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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { Inertia } from '@inertiajs/inertia';

const form = useForm({
    perusahaan: '',
    durasi: '',
    divis: '', // Perbaiki penamaan dari 'divisi' ke 'divis'
    tugas: '',
});

const submit = () => {
    form.post(route('magang.store'), {
        onSuccess: () => {
            Inertia.visit(route('magang.index')); // Mengarahkan ke halaman daftar setelah berhasil
        },
        onError: (errors) => {
            console.error(errors);
        }
    });
};
</script>

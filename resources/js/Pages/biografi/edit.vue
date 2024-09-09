<template>
    <Head :title="'Edit Biografi - ' + form.longname" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Biografi</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="longname">
                                    Full Name
                                </label>
                                <input v-model="form.longname" id="longname" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="umur">
                                    Age
                                </label>
                                <input v-model="form.umur" id="umur" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input v-model="form.email" id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="notelp">
                                    Phone Number
                                </label>
                                <input v-model="form.notelp" id="notelp" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="agama">
                                    Religion
                                </label>
                                <input v-model="form.agama" id="agama" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="pendidikan">
                                    Education
                                </label>
                                <input v-model="form.pendidikan" id="pendidikan" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Update Biografi
                                </button>
                                <Link :href="route('biografi.index')" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                    Cancel
                                </Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    biografis: Object,
});

const form = useForm({
    longname: props.biografis.longname,
    umur: props.biografis.umur,
    email: props.biografis.email,
    notelp: props.biografis.notelp,
    agama: props.biografis.agama,
    pendidikan: props.biografis.pendidikan,
});

const submit = () => {
    form.put(route('biografi.update', props.biografis.id), {
        preserveScroll: true,
        preserveState: true,
    });
};
</script>

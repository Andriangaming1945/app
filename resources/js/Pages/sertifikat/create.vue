<template>
    <Head title="New Sertifikat" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Sertifikat</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded p-6">
                <form @submit.prevent="submit">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="sertif_url">
                            Sertifikat URL
                        </label>
                        <input v-model="form.sertif_url" type="text" id="sertif_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <div v-if="errors.sertif_url" class="text-red-500 text-sm mt-1">
                            {{ errors.sertif_url }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="desc">
                            Description
                        </label>
                        <textarea v-model="form.desc" id="desc" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        <div v-if="errors.desc" class="text-red-500 text-sm mt-1">
                            {{ errors.desc }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="images">
                            Image
                        </label>
                        <input type="file" id="images" @change="handleImageUpload" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <div v-if="errors.images" class="text-red-500 text-sm mt-1">
                            {{ errors.images }}
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                        <Link :href="route('sertifikat.index')" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Cancel
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';

const form = useForm({
    sertif_url: '',
    desc: '',
    images: null,
});

const errors = ref({});

const handleImageUpload = (e) => {
    form.images = e.target.files[0];
};

const submit = () => {
    form.post(route('sertifikat.store'), {
        onError: (err) => {
            errors.value = err;
        },
        onSuccess: () => {
            // Redirect to index page on success
            Inertia.visit(route('sertifikat.index'), { preserveState: true });
        }
    });
};
</script>

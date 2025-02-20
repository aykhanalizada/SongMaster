<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, router, useForm } from '@inertiajs/vue3';


defineOptions({
    layout: AppLayout
});


const form = useForm({
    title: '',
    music_file: null
})

const submitForm = () => {

    router.post(route('songs.store'), {
        title: form.title,
        music_file: form.music_file
    }, {
        preserveScroll: true,
        onSuccess: () => {
            console.log('Song created successfully!');
        }
    })
}
</script>

<template>

    <div class="content-container">

        <h1 class="mt-4 d-flex justify-content-center">Create New Song</h1>

        <div class="container row center mt-5">
            <div class="col-6 m-auto ">
                <form @submit.prevent="submitForm">

                    <div class="form-group mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" v-model="form.title">

                        <p v-if="form.errors.title" class="text-danger">{{ form.errors.title }}</p>

                    </div>

                    <div class="form-group mb-3">
                        <label>Upload Music File</label>
                        <input type="file" class="form-control" @change="e =>form.music_file= e.target.files[0]">
                    </div>

                    <div class="d-flex justify-content-between mb-5">
                        <button class="btn btn-primary" :disabled="form.processing">Submit</button>
                        <Link :href="route('songs.index')" class="btn btn-light">Go Back</Link>
                    </div>
                </form>


            </div>
        </div>

    </div>


</template>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

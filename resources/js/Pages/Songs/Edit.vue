<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: AppLayout
})

const props = defineProps({
    song: Object
})

const form = useForm({
    title: props.song.title,
    artist_name: props.song.artist_name,
    release_year: props.song.release_year
})


const submitForm = () => {
    form.put(route('songs.update', props.song.id), {
        preserveScroll: true,
        onSuccess: () => console.log('Song updated successfully!')
    })
}

</script>

<template>
    <div class="content-container">

        <h1 class="m-4 text-light d-flex justify-content-center">Edit New Song</h1>
        <div class="container row center mt-5">
            <div class="col-6 m-auto ">
                <form @submit.prevent="submitForm">
                    <div class="form-group mb-3">
                        <label class="text-light">Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" v-model="form.title">
                        <p v-if="form.errors.title" class="text-danger">{{ form.errors.title }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-light">Artist Name</label>
                        <input type="text" class="form-control" placeholder="Enter artist name"
                               v-model="form.artist_name">
                        <p v-if="form.errors.artist_name" class="text-danger">{{ form.errors.artist_name }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-light">Release Year</label>
                        <input type="text" class="form-control" placeholder="Enter release year"
                               v-model="form.release_year">
                        <p v-if="form.errors.release_year" class="text-danger">{{ form.errors.release_year }}</p>
                    </div>


                    <div class="d-flex justify-content-between mb-5">
                        <button class="btn btn-primary" :disabled="form.processing">Submit</button>
                        <Link class="btn btn-light" :href="route('songs.index')">Go Back</Link>
                    </div>
                </form>


            </div>
        </div>

    </div>


</template>

<style scoped>

</style>

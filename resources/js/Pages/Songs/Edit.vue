<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import Multiselect from "vue-multiselect";

defineOptions({
    layout: AppLayout
})

const props = defineProps({
    song: Object,
    artists: Array
})

const form = useForm({
    title: props.song.title,
    artist_id: props.song.artists,
    release_year: props.song.release_year,
    music_file: null
})

const submitForm = () => {
    form.artist_id = form.artist_id.map(artist => artist.id);

    router.post(route('songs.update', props.song.id), {
        _method: 'put', // Form method spoofing for Laravel
        title: form.title,
        artist_id: form.artist_id,
        release_year: form.release_year,
        music_file: form.music_file,
    }, {
        forceFormData: true, // Ensures FormData usage
        preserveScroll: true,
        onSuccess: () => console.log('Song updated successfully!')
    });

    console.log(form.errors);
}
</script>

<template>
    <div class="content-container">
        <h1 class="m-4 d-flex justify-content-center">Edit New Song</h1>
        <div class="container row center mt-5">
            <div class="col-6 m-auto">
                <form @submit.prevent="submitForm">
                    <div class="form-group mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" v-model="form.title">
                        <p v-if="form.errors.title" class="text-danger">{{ form.errors.title }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label>Artist Name</label>
                        <multiselect
                            v-model="form.artist_id"
                            :options="artists"
                            :multiple="true"
                            :searchable="true"
                            label="name"
                            track-by="id"
                            placeholder="Select artists"
                            class="bg-light"
                        />
                        <p v-if="form.errors.artist_id" class="text-danger">{{ form.errors.artist_id }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label>Release Year</label>
                        <input type="text" class="form-control" placeholder="Enter release year"
                               v-model="form.release_year">
                        <p v-if="form.errors.release_year" class="text-danger">{{ form.errors.release_year }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label>Upload Music File</label>
                        <input type="file" class="form-control" @change="e => form.music_file = e.target.files[0]">
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

<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import Multiselect from "vue-multiselect";

defineOptions({
    layout: AppLayout
})

const props = defineProps({
    playlist: Object,
    songs: Object
})

const form = useForm({
    name: props.playlist.name,
    song_id: props.playlist.songs || []
})


const submitForm = () => {
    form.song_id = form.song_id.map(song => song.id)

    form.put(route('playlists.update', props.playlist.id), {
        preserveScroll: true,
        onSuccess: () => console.log('Playlist updated successfully!')
    })
}

</script>

<template>
    <div class="content-container">

        <h1 class="m-4 text-light d-flex justify-content-center">Edit Playlist</h1>
        <div class="container row center mt-5">
            <div class="col-6 m-auto ">
                <form @submit.prevent="submitForm">
                    <div class="form-group mb-3">
                        <label class="text-light">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" v-model="form.name">
                        <p v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <multiselect
                            v-model="form.song_id"
                            :options="songs"
                            :multiple="true"
                            :close-on-select="true"
                            label="title"
                            track-by="id"
                            placeholder="Select options"
                        />
                    </div>

                    <div class="d-flex justify-content-between mb-5">
                        <button class="btn btn-primary" :disabled="form.processing">Submit</button>
                        <Link class="btn btn-light" :href="route('playlists.index')">Go Back</Link>
                    </div>
                </form>


            </div>
        </div>

    </div>


</template>

<style scoped>

</style>

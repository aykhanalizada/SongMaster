<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import Multiselect from "vue-multiselect";


const props = defineProps({
    songs: Array
})

defineOptions({
    layout: AppLayout
});

const form = useForm({
    name: '',
    music_id: []
})

const submitForm = () => {
    form.music_id = form.music_id.map(song => song.id)

    form.post(route('playlists.store'), {
        preserveScroll: true,
        onSuccess: () => {
            console.log('Playlist created successfully!');
        }
    })
}

console.log(props.songs)
</script>

<template>

    <div class="content-container">

        <h1 class="mt-4 text-light d-flex justify-content-center">Create New Playlist</h1>

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
                            v-model="form.music_id"
                            :options="songs"
                            :multiple="true"
                            :close-on-select="true"
                            label="title"
                            track-by="id"
                            placeholder="Select options"
                        />

                        <p v-if="form.errors.music_id" class="text-danger">{{ form.errors.music_id }}</p>

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

<style scoped>

</style>

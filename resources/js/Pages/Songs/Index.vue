<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import Swal from 'sweetalert2';
import VuePlyr from "vue-plyr";
import "vue-plyr/dist/vue-plyr.css";


defineOptions({
    layout: AppLayout
})

const props = defineProps({
    songs: Array
});
console.log(props.songs)

const playerOptions = {
    autoplay: false, // Prevent unexpected playback
    muted: false, // Ensure audio is not muted by default
    controls: [
        'play',
        // 'restart', // Allow users to restart the song
        // 'progress',
        'current-time',
        'duration',
        // 'volume', // Allow volume control
        'settings' // Provide additional settings (like playback speed)
    ],
    hideControls: true, // Hide controls when not interacting
};


const deleteSong = (id) => {

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to undo this action!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel"
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('songs.destroy', id));
            Swal.fire(
                "Deleted!",
                "The song has been removed.",
                "success"
            )
        }
    })
}


</script>

<template>

    <div class="content-container">

        <div class="m-4 d-flex">
            <Link :href="route('songs.create')" class="btn btn-success me-auto">Create New Song</Link>
        </div>

        <table class="table table-striped table-dark text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Username</th>
                <th scope="col">Song</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="(song,index) in songs" :key="song.id" class="align-middle">
                <td>{{ index + 1 }}</td>
                <td>{{ song.title }}</td>

                <td>{{ song.user.username }}</td>

                <td style="max-width: 100px;">
                    <vue-plyr
                        v-if="song.file_path"
                        :options="playerOptions"
                    >
                        <audio :src="`/storage/${song.file_path}`" type="audio/mpeg"></audio>
                    </vue-plyr>

                    <span v-else>No audio available</span>
                </td>


                <td>
                    <div class="d-flex justify-content-center">
                        <Link class="btn btn-success me-2" :href="route('songs.edit',song.id)">Edit</Link>
                        <button class="btn btn-danger" @click="deleteSong(song.id)">Delete</button>
                    </div>
                </td>


            </tr>

            </tbody>
        </table>

    </div>

</template>

<style scoped>

</style>

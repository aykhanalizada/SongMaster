<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import Swal from 'sweetalert2'

defineOptions({
    layout: AppLayout
})

const props = defineProps({
    songs: Array
});

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
                <th scope="col">Artis Name</th>
                <th scope="col">Release Year</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>


            <tr v-for="(song,index) in songs" :key="song.id" class="align-middle">
                <td>{{ index + 1 }}</td>
                <td>{{ song.title }}</td>

                <td>
                    <span v-for="(artist, index) in song.artists" :key="index">
                         {{ artist.name }}
                        <span v-if="index !== song.artists.length - 1">, </span>
                    </span>
                </td>


                <td>{{ song.release_year }}</td>
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

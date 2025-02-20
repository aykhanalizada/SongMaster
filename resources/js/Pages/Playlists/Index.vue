<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import Swal from 'sweetalert2'

defineOptions({
    layout: AppLayout
})

const props = defineProps({
    playlists: Array
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
            router.delete(route('playlists.destroy', id));
            Swal.fire(
                "Deleted!",
                "The playlist has been removed.",
                "success"
            )
        }
    })
}

console.log(props.playlists)
</script>

<template>
    <div class="content-container">
        <!-- Button Container -->
        <div class="m-4 d-flex">
            <Link :href="route('playlists.create')" class="btn btn-success">Create New Playlist</Link>
        </div>

        <!-- Table Container -->
        <div class="table-responsive w-100">
            <table class="table table-striped table-dark text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Song Count</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(playlist, index) in playlists" :key="playlist.id" class="align-middle">
                    <td>{{ index + 1 }}</td>
                    <td>{{ playlist.name }}</td>
                    <td>{{ playlist.songs_count }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <Link class="btn btn-success me-2" :href="route('playlists.edit', playlist.id)">Edit</Link>
                            <button class="btn btn-danger" @click="deleteSong(playlist.id)">Delete</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>


<style scoped>

</style>

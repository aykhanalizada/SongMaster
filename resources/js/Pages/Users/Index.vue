<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import Swal from 'sweetalert2'


defineProps({
    users: Array
})

defineOptions({
    layout: AppLayout
})


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
            router.delete(route('users.destroy', id));
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
        <!-- Button Container -->
<!--        <div class="m-4 d-flex">
            <Link :href="route('users.create')" class="btn btn-success">Create New User</Link>
        </div>-->

        <!-- Table Container -->
        <div class="table-responsive w-100">
            <table class="table table-striped table-dark text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(user, index) in users" :key="user.id" class="align-middle">
                    <td>{{ index + 1 }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.surname }}</td>
                    <td>{{ user.username }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <Link class="btn btn-success me-2" :href="route('users.edit', user.id)">Edit</Link>
                            <button class="btn btn-danger" @click="deleteSong(user.id)">Delete</button>
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

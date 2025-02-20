<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: AppLayout
});

const form = useForm({
    name: '',
    surname: '',
    username: '',
    email: '',
    password: ''
})

const submitForm = () => {
    form.post(route('users.store'), {
        preserveScroll: true,
        onSuccess: () => {
            console.log('User created successfully!');
        }
    })
}
</script>

<template>

    <div class="content-container">

        <h1 class="mt-4 text-light d-flex justify-content-center">Create New User</h1>

        <div class="container row center mt-5">
            <div class="col-6 m-auto ">
                <form @submit.prevent="submitForm">

                    <div class="form-group mb-3">
                        <label class="text-light">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" v-model="form.name">

                        <p v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</p>

                    </div>


                    <div class="form-group mb-3">
                        <label class="text-light">Surname</label>
                        <input type="text" class="form-control" placeholder="Enter surname" v-model="form.surname">

                        <p v-if="form.errors.surname" class="text-danger">{{ form.errors.surname }}</p>

                    </div>

                    <div class="form-group mb-3">
                        <label class="text-light">Username</label>
                        <input type="text" class="form-control" placeholder="Enter username" v-model="form.username">

                        <p v-if="form.errors.username" class="text-danger">{{ form.errors.username }}</p>

                    </div>

                    <div class="form-group mb-3">
                        <label class="text-light">Email</label>
                        <input type="text" class="form-control" placeholder="Enter email" v-model="form.email">

                        <p v-if="form.errors.email" class="text-danger">{{ form.errors.email }}</p>

                    </div>

                    <div class="form-group mb-3">
                        <label class="text-light">Password</label>
                        <input type="password" class="form-control" placeholder="******" v-model="form.password">

                        <p v-if="form.errors.password" class="text-danger">{{ form.errors.password }}</p>

                    </div>

                    <div class="d-flex justify-content-between mb-5">
                        <button class="btn btn-primary" :disabled="form.processing">Submit</button>
                        <Link :href="route('users.index')" class="btn btn-light">Go Back</Link>
                    </div>
                </form>


            </div>
        </div>

    </div>


</template>

<style scoped>

</style>

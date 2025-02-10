<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: AppLayout
});

const form = useForm({
    name: '',
})

const submitForm = () => {
    form.post(route('artists.store'), {
        preserveScroll: true,
        onSuccess: () => {
            console.log('Artist created successfully!');
        }
    })
}
</script>

<template>

    <div class="content-container">

        <h1 class="mt-4 text-light d-flex justify-content-center">Create New Artist</h1>

        <div class="container row center mt-5">
            <div class="col-6 m-auto ">
                <form @submit.prevent="submitForm">

                    <div class="form-group mb-3">
                        <label class="text-light">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" v-model="form.name">

                        <p v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</p>

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

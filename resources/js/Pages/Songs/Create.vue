<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import Multiselect from 'vue-multiselect';


defineOptions({
    layout: AppLayout
});

const props = defineProps({
    'artists': Array
})

const form = useForm({
    title: '',
    artist_id: [],
    release_year: ''
})

const submitForm = () => {
    form.artist_id = form.artist_id.map(artist => artist.id);

    form.post(route('songs.store'), {
        preserveScroll: true,
        onSuccess: () => {
            console.log('Song created successfully!');
        }
    })
}
</script>

<template>

    <div class="content-container">

        <h1 class="mt-4 d-flex justify-content-center">Create New Song</h1>

        <div class="container row center mt-5">
            <div class="col-6 m-auto ">
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

                        <p v-for="(error,index) in form.errors" :key="index" class="text-danger">
                            {{ error }}
                        </p>
                    </div>
                    <div class="form-group mb-3">
                        <label>Release Year</label>
                        <input type="text" class="form-control" placeholder="Enter release year"
                               v-model="form.release_year">
                        <p v-if="form.errors.release_year" class="text-danger">{{ form.errors.release_year }}</p>
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

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

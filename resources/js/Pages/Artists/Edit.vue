<script setup>
import AppLayout from '../AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: AppLayout
})

const props = defineProps({
    artist: Object
})

const form = useForm({
    name: props.artist.name,
})


const submitForm = () => {
    form.put(route('artists.update', props.artist.id), {
        preserveScroll: true,
        onSuccess: () => console.log('Artist updated successfully!')
    })
}

</script>

<template>
    <div class="content-container">

        <h1 class="m-4 text-light d-flex justify-content-center">Edit New Artist</h1>
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
                        <Link class="btn btn-light" :href="route('artists.index')">Go Back</Link>
                    </div>
                </form>


            </div>
        </div>

    </div>


</template>

<style scoped>

</style>

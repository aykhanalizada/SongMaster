<script setup>
// import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email_or_username: "",
    password: "",
    remember: ""
});

const submitForm = () => {
    form.post('/login', {
        preserveScroll: true
    })
}
</script>

<template>

    <div class="d-flex align-items-center justify-content-center vh-100">

        <form @submit.prevent="submitForm" class="w-25">

            <h1 class="mb-4">Member Login</h1>


            <div class="form-outline mb-4">
                <label class="form-label">Email address or username</label>
                <input v-model="form.email_or_username" type="text" class="form-control"
                       placeholder=" Enter Email or username"/>

                <p v-if="form.errors.email_or_username" class="text-danger">{{ form.errors.email_or_username }}</p>

            </div>


            <div class="form-outline mb-4">
                <label class="form-label">Password</label>

                <input v-model="form.password" type="password" class="form-control" placeholder="Enter Password"/>

                <p v-if="form.errors.password" class="text-danger">{{ form.errors.password }}</p>

            </div>


            <div class="form-outline mb-4">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" checked/>
                    <label class="form-check-label" for="remember"> Remember me </label>
                </div>

            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4" :disabled="form.processing">
                Sign in
            </button>

        </form>
    </div>

</template>

<style scoped>

</style>

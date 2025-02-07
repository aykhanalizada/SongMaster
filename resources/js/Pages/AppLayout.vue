<script setup>
import { ref } from 'vue';
import Sidebar from './Sidebar.vue';

const collapsed = ref(false);

const toggleSidebar = () => {
    collapsed.value = !collapsed.value;
}

</script>

<template>

    <div class="d-flex">

        <!-- Sidebar Component -->
        <Sidebar :collapsed="collapsed"
                 @toggle="toggleSidebar"
        />

        <!-- Main Content -->
        <main :class="['main-content',{'collapsed':collapsed}]">
            <div class="container-fluid">
                <slot/>
            </div>
        </main>

    </div>

</template>

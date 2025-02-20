<script setup>
import { computed, defineProps } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
    collapsed: Boolean,
});

const currentUrl = computed(() => usePage().url);

const iconClass = computed(() => props.collapsed ? 'fas fa-chevron-right' : 'fas fa-chevron-left')
</script>

<template>
    <aside :class="['sidebar d-flex flex-column flex-shrink-0 position-fixed',{'collapsed':collapsed}]">
        <button class="toggle-btn" @click="$emit('toggle')">
            <i :class="iconClass"></i>
        </button>

        <div class="p-4">
            <h4 class="logo-text fw-bold mb-0">Admin Panel</h4>
            <p class="text-muted small hide-on-collapse">Dashboard</p>
        </div>

        <nav class="flex-grow-1">
            <div class="nav flex-column flex-grow">
                <Link :href="route('songs.index')"
                      class="sidebar-link text-decoration-none p-3"
                      :class="{'active': currentUrl.startsWith('/songs')}">
                    <i class="fa-solid fa-music me-3"></i>
                    <span class="hide-on-collapse">Songs</span>
                </Link>
            </div>

            <div class="nav flex-column">
                <Link :href="route('users.index')"
                      class="sidebar-link text-decoration-none p-3"
                      :class="{'active': currentUrl.startsWith('/users')}">
                    <i class="fa-solid fa-person me-3"></i>
                    <span class="hide-on-collapse">Users</span>
                </Link>
            </div>

            <div class="nav flex-column">
                <Link :href="route('playlists.index')"
                      class="sidebar-link text-decoration-none p-3"
                      :class="{'active': currentUrl.startsWith('/playlists')}">
                    <i class="fa-solid fa-person me-3"></i>
                    <span class="hide-on-collapse">Playlists</span>
                </Link>
            </div>
        </nav>

        <Link :href="route('logout')" class="sidebar-link text-decoration-none p-3">
            <i class="fa-solid fa-right-from-bracket me-3"></i>
            <span class="hide-on-collapse">Logout</span>
        </Link>

    </aside>

</template>

<style scoped>

</style>

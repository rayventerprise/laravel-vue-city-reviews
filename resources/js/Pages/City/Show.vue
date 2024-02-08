<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import {Head} from "@inertiajs/vue3";

defineProps({
    city: Object,
});
</script>


<template>
    <Head v-bind:title="city.name" />

    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        <div class="pt-4 bg-gray-100 dark:bg-gray-900">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div class="flex justify-center">
                    <a href="/">
                        <img src="/logo.png" class="h-16 w-auto"/>
                    </a>
                </div>

                <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
                    Welcome to the city of {{ city.name }}
                </div>
            </div>
        </div>
    </div>
</template>

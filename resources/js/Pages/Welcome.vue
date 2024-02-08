<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    cities: Array,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100 dark:bg-gray-700 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>
                <Link v-if="canRegister" :href="route('register')" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex flex-col items-center justify-center h-[400px]">
                <img src="/logo.png" class="h-16 w-auto"/>
                <div class="py-2">The best place to find your next vacation spot!</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="flex-grow bg-gray-200" v-for="city in cities">
                    <a v-bind:href="`/city/` + city.slug">
                        <div class="relative">
                            <img class="w-full h-[300px] md:h-[200px]" v-bind:src="city.thumbnail"/>
                            <span class="absolute font-bold bottom-0 left-0 bg-opacity-70 bg-black text-white p-2 w-full">{{ city.name }}</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>

<style>

</style>

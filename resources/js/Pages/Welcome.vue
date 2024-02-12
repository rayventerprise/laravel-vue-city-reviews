<script setup>
import { Head, Link } from '@inertiajs/vue3';
import CitySearchBar from "@/Components/CitySearchBar.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    cities: Array,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <AppLayout title="Citify - Transparent City Reviews">
        <div class="relative sm:flex sm:justify-center sm:items-center">
            <div class="max-w-7xl flex justify-start flex-col items-start flex-grow">
                <div class="flex flex-col items-center space-y-4 justify-center h-[400px] jumbotron w-full">
                    <img src="/logo.png" class="h-16 w-auto"/>
                    <div>
                        <CitySearchBar/>
                    </div>
                    <div>The best place to find your next vacation spot!</div>
                </div>
                <div class="flex flex-col justify-center items-center w-full">
                    <span class="font-holian w-full py-2 text-7xl text-center">Featured Cities</span>

                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="flex-grow" v-for="city in cities">
                            <a v-bind:href="`/city/` + city.slug">
                                <div class="relative">
                                    <img class="w-[600px] h-[400px]" v-if="city.thumbnail" v-bind:src="city.thumbnail"/>
                                    <img class="w-[600px] h-[400px]" v-else src="https://placehold.co/600x400"/>
                                    <span class="absolute font-bold bottom-0 left-0 bg-opacity-70 bg-black text-white p-2 w-full">{{ city.name }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>

</style>

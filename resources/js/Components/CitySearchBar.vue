<script setup>
import {ref} from "vue";

const inputValue = ref('');
const searchHits = ref([])

const fetchSearchQuery = () => {
    if (!inputValue.value) {
        return;
    }

    fetch(`/api/cities?name=${inputValue.value}`)
        .then(response => response.json())
        .then(res => {
            searchHits.value = res.data;
        });
};
</script>
<template>
    <div class="relative">
        <input type="text" class="w-full md:w-[500px] p-4 rounded-lg" placeholder="Search for a city here..." v-model="inputValue" v-on:keyup="fetchSearchQuery"/>
        <div class="absolute bg-black w-full text-white">
            <div v-for="searchHit in searchHits" :key="searchHit.id">
                <a v-bind:href="'/city/' + searchHit.slug" class="block">
                    {{searchHit.name}}, {{searchHit.stateName}}
                </a>
            </div>
        </div>
    </div>
</template>

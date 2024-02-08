<script setup>
import {ref, defineModel} from "vue";

const inputValueRef = ref('');
const searchHits = ref([])

const fetchSearchQuery = () => {
    console.log('Searching for cities...', inputValueRef.value);

    if (!inputValueRef.value) {
        return;
    }

    fetch(`/api/cities?name=${inputValueRef.value}`)
        .then(response => response.json())
        .then(res => {
            searchHits.value = res.data;
        });
};
</script>
<template>
    <div class="relative">
        <input type="text" placeholder="Search for a city here..." v-model="inputValueRef" v-on:keyup="fetchSearchQuery"/>
        <div class="absolute bg-black w-full text-white">
            <div v-for="searchHit in searchHits" :key="searchHit.id">
                <a v-bind:href="'/city/' + searchHit.slug" class="block">
                    {{searchHit.name}}
                </a>
            </div>
        </div>
    </div>
</template>

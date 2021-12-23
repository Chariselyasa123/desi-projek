<template>
    <Head title="Welcome"/>

    <!-- Landing page header -->
    <div class="flex flex-wrap m-10 mx-12 justify-between">
        <div class="flex gap-8 items-center">
            <a href="#" class="uppercase text-2xl font-bold">Ripala</a>
            <a class="font-bold">Home</a>
            <a class="font-bold">Artikel</a>
            <a class="font-bold">About us</a>
        </div>
        <div class="flex gap-8 items-center">
            <a href="#" class="font-bold">About us</a>
            <a href="#" class="font-bold">Contact</a>
        </div>
    </div>

    <!-- Landing page content -->
    <!-- Make content center div -->
    <div class="flex flex-col h-screen">
        <div class="m-auto flex flex-col items-center">
            <h1 class="uppercase text-6xl font-bold">E-Mountaineering</h1>
            <h5 class="text-xl uppercase">Petualangan memberikan kita inspirasi</h5>
        </div>
        <div class="m-auto flex flex-col items-center">
            <button class="text-white bg-gray-800 rounded-full px-8 py-3">Aku ingin menjelah</button>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Head,
        Link,
    },
})
</script>

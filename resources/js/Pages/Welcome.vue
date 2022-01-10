<template>
    <page-layout title="Welcome">
        <!-- Landing page content -->
        <div class="m-auto flex flex-col items-center">
            <h1 class="uppercase text-7xl mountaineering"
                style="font-family: 'Arial Black'">E-Mountaineering</h1>
            <h5 class="text-xl uppercase">Petualangan memberikan kita inspirasi</h5>
        </div>
        <div class="m-auto flex flex-col items-center">
            <a href="/sebaran-gunung"
               class="text-white bg-gray-800 rounded-full px-8 py-3 flex items-center">
                Aku ingin menjelah
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 bounce-right" viewBox="0 0 20 20"
                     fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
    </page-layout>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import PageLayout from "@/Pages/Component/PageLayout";

export default defineComponent({
    components: {
        Head,
        Link,
        PageLayout,
    },
})
</script>

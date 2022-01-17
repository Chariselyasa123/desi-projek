<template>
    <page-layout title="Struktur Organisasi">
        
        <div class="flex flex-col mx-auto w-3/4">
            <div class="m-auto flex flex-col items-center">

                <!--Card Form-->
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 h-screen">
                    <div class="mb-4">
                        <h1 class="text-2xl font-bold text-center">Struktur Organisasi RIPALA</h1>
                    </div>
                    <div class="mb-4 flex flex-col items-center relative">
                        <img src="/svg/diagram-organisasi.svg" alt="diagram" class="absolute z-0">
                    </div>
                </div>

            </div>
        </div>
    </page-layout>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from '@inertiajs/inertia-vue3';
import PageLayout from "@/Pages/Component/PageLayout";

export default defineComponent({

    components: {
        PageLayout,
        Link
    },

})
</script>
<template>
    <page-layout title="Tentang Kami">

        <div class="flex flex-col">
            <div class="m-auto flex flex-col items-center">

                <!--Card Form-->
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <h1 class="text-2xl font-bold text-center">Sejarah RIPALA (Raharja Ikatan Pecinta
                            Alam)</h1>
                    </div>
                    <!--Center Div according to parent-->
                    <div class="mb-4 flex flex-col items-center">
                        <img src="/images/logo-ripala.png" alt="Logo" class="h-3/4 w-1/2" ref="logo"/>
                    </div>
                </div>

            </div>
        </div>
    </page-layout>
</template>

<script>
import {defineComponent} from 'vue'
import PageLayout from "@/Pages/Component/PageLayout";

export default defineComponent({

    components: {
        PageLayout,
    },

})
</script>

<template>
    <page-layout :title="ucfirst(post.post_title)">
        <div class="w-full h-full mx-auto transparent">
            <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
                    <div>
                        <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-green-900 uppercase rounded-full bg-green-400"
                           v-if="post.diff_date <= 7"
                        >
                            {{ post.human_date }}
                        </p>
                        <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-gray-900 uppercase rounded-full bg-gray-400"
                           v-else
                        >
                            {{ post.date }}
                        </p>
                    </div>
                    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                        {{ ucfirst(post.post_title) }}
                    </h2>
                </div>
                <div class="mx-auto lg:max-w-2xl">
                    <div class="relative w-full transition-shadow duration-300 hover:shadow-xl">
                        <img class="object-cover w-full h-56 rounded shadow-lg sm:h-64 md:h-80 lg:h-96"
                             :src="post.featured_image || '/images/default-image.png'"
                             alt="featured image"/>
                    </div>
                </div>

                <div class="mx-auto lg:max-w-2xl mt-8">
                    <div v-html="post.post_content"></div>
                </div>
            </div>
        </div>
    </page-layout>
</template>

<script>
import {defineComponent} from 'vue'
import PageLayout from "@/Pages/Component/PageLayout";

export default defineComponent({

    props: ['post'],

    components: {
        PageLayout,
    },

})
</script>

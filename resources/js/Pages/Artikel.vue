<template>
    <page-layout title="Artikel">
        <div :class="artikelConstainer">

            <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
                <search-bar placeholder="Cari Artikel" @search="search" class="col-span-3" :searchArtikel="true"/>
                <div class="overflow-hidden transition-shadow duration-300 bg-white rounded shadow-sm"
                     v-for="post in posts.data">
                    <img
                        :src="post.featured_image || '/images/default-image.png'"
                        class="object-cover w-full h-64" alt=""/>
                    <div class="p-5 border border-t-0">
                        <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                            <Link
                                :href="route('artikel.category', category.slug)"
                                class="transition-colors duration-200 text-blue-gray-900 hover:text-blue-700"
                                aria-label="Category" title="traveling" v-for="(category, index) in post.categories">
                                {{ category.category_name }} {{ index < post.categories.length - 1 ? ', ' : '' }}
                            </Link>
                            <span class="text-gray-600" v-if="post.diff_date <= 7">— {{ post.human_date }}</span>
                            <span class="text-gray-600" v-else>— {{ post.date }}</span>
                        </p>
                        <Link :href="route('artikel.single', post.slug)" aria-label="Category" :title="post.post_title"
                              class="inline-block mb-3 text-2xl font-bold leading-5 transition-colors duration-200 hover:text-blue-700">
                            {{ ucfirst(post.post_title) }}
                        </Link>
                        <p class="mb-2 text-gray-700">
                            {{ post.excerpt }}
                        </p>
                        <Link :href="route('artikel.single', post.slug)" aria-label=""
                              class="inline-flex items-center font-semibold transition-colors duration-200 text-blue-400 hover:text-blue-800">
                            Read more
                        </Link>
                    </div>
                </div>
            </div>

            <!--Pagination-->
            <div class="mt-6">
                <pagination :links="posts.links"/>
            </div>
        </div>
    </page-layout>
</template>

<script>
import {defineComponent} from 'vue'
import PageLayout from "@/Pages/Component/PageLayout";
import {Link} from "@inertiajs/inertia-vue3";
import Pagination from "@/Pages/Component/Pagination";
import SearchBar from "@/Pages/Component/SearchBar";

export default defineComponent({

    props: ['posts'],

    components: {
        PageLayout,
        Link,
        Pagination,
        SearchBar,
    },

    methods: {
        search(search) {
            this.$inertia.get(this.route('artikel', {search: search}))
        },
    },

    mounted() {
        console.log(this.postingan.length)
    },

    computed: {
        artikelConstainer() {
            return this.posts.data.length > 3 ? 'px-4 py-14 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20 h-full' : 'px-4 py-14 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20 h-screen'
        },
    },
})
</script>

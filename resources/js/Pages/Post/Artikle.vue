<template>
    <app-layout title="Artikel">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 border-b-4 border-gray-200 sm:px-6 flex justify-between">
                        <span class="text-2xl font-bold">Artikel</span>
                        <search-bar placeholder="Cari Artikel" @search="search"/>
                        <Link :href="route('post.create')"
                              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            New Atikel
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </Link>
                    </div>
                    <!-- Card Body -->
                    <div class="px-4 py-5 sm:p-0 mt-2">
                        <!-- Make Table With Tailwindcss -->
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="header-table">
                                                    No
                                                </th>
                                                <th scope="col"
                                                    class="header-table">
                                                    Judul Artikel
                                                </th>
                                                <th scope="col"
                                                    class="header-table">
                                                    Author
                                                </th>
                                                <th scope="col"
                                                    class="header-table">
                                                    Tanggal Publikasi
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr v-for="(post, index) in posts.data">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ (posts.current_page - 1) * posts.per_page + index + 1 }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ post.post_title }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ post.author }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ dateFormat(post.post_created) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button class="text-indigo-600 hover:text-indigo-900"
                                                            @click="editArtikel(post.slug)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                             viewBox="0 0 20 20"
                                                             fill="currentColor">
                                                            <path
                                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                                            <path fill-rule="evenodd"
                                                                  d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                    <button type="button" class="text-red-600 hover:text-red-900"
                                                            @click="deleteArtikel(post.slug)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                             fill="none"
                                                             viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2" g
                                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- More people... -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Pagination-->
                <div class="mt-6">
                    <pagination :links="posts.links"/>
                </div>

            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetButton from '@/Jetstream/Button.vue'
import {Link} from '@inertiajs/inertia-vue3';
import Pagination from "@/Pages/Component/Pagination";
import SearchBar from "@/Pages/Component/SearchBar";

export default defineComponent({

    props: ['posts'],

    components: {
        AppLayout,
        JetButton,
        Link,
        Pagination,
        SearchBar,
    },

    methods: {
        dateFormat(theDate) {
            const date = new Date(theDate);
            const monthNames = [
                "Januari", "Februari", "Maret",
                "April", "Mei", "Juni", "Juli",
                "Agustus", "September", "Oktober",
                "November", "Desember"
            ];

            const day = date.getDate();
            const monthIndex = date.getMonth();
            const year = date.getFullYear();
            const hours = date.getHours();
            const minutes = date.getMinutes();

            return day + ' ' + monthNames[monthIndex] + ' ' + year + ' ' + hours + ':' + minutes;
        },

        editArtikel(id) {
            this.$inertia.get(this.route('post.edit', {id}))
        },

        delete(id) {
            this.$inertia.delete(this.route('post.delete', {id}))
        },

        deleteArtikel(slug) {
            const that = this;
            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    that.delete(slug);
                    that.$swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    window.location.reload();
                }
            })
        },

        search(search) {
            this.$inertia.get(this.route('post', {search: search}))
        },
    },
})
</script>

<template>
    <app-layout title="Struktur Organisasi">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 border-b-4 border-gray-200 sm:px-6 flex justify-between">
                        <span class="text-2xl font-bold">Struktur Organisasi</span>
                        <Link :href="route('struktur-organisasi.create')"
                              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Struktur Organisasi Baru
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </Link>
                    </div>

                    <!-- Card Body -->
                    <div class="px-4 py-5 sm:p-0 mt-2 flex flex-warp gap-4 items-center">
                        <span>Periode Menjabat</span>
                        <select name="periode" id="periode" @change="getData($event)"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full max-w-2xl">
                            <option v-for="perionde in periode" :value="perionde">{{
                                    perionde
                                }}
                            </option>
                        </select>
                    </div>
                    <div class="px-4 py-5 sm:p-0 mt-2 relative">
                        <img src="/svg/diagram-organisasi.svg" alt="diagram" class="absolute z-0" v-if="struktur">
                        <div class="m-5 z-20 block">
                            <div class="grid grid-cols-8 gap-4 justify-items-center">
                                <div class="col-span-2 col-start-4 mt-10">
                                    {{ ketua_umum }}
                                </div>
                            </div>
                            <div class="grid grid-cols-8 gap-4 justify-items-center">
                                <div class="col-start-4 mt-28 pt-2 mr-4">
                                    {{ sekertaris }}
                                </div>
                                <div class="col-start-5 mt-28 pt-2 ml-8">
                                    {{ bendahara }}
                                </div>
                            </div>
                            <div class="grid grid-cols-7 gap-4 justify-items-center pb-3">
                                <div class="mt-24 pt-1 mr-8">
                                    {{ kepala_bidang_1 }}
                                </div>
                                <div class="mt-24 pt-1 mr-5">
                                    {{ kepala_bidang_2 }}
                                </div>
                                <div class="mt-24 pt-1 mr-3">
                                    {{ kepala_bidang_3 }}
                                </div>
                                <div class="mt-24 pt-1">
                                    {{ kepala_bidang_4 }}
                                </div>
                                <div class="mt-24 pt-1 ml-5">
                                    {{ kepala_bidang_5 }}
                                </div>
                                <div class="mt-24 pt-1 ml-8">
                                    {{ kepala_divisi_1 }}
                                </div>
                                <div class="mt-24 pt-1 ml-10">
                                    {{ kepala_divisi_2 }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetButton from "@/Jetstream/Button";
import {Link} from "@inertiajs/inertia-vue3";
import Pagination from "@/Pages/Component/Pagination";
import SearchBar from "@/Pages/Component/SearchBar";

export default defineComponent({

    props: ['struktur', 'periode'],

    components: {
        AppLayout,
        JetButton,
        Link,
        Pagination,
        SearchBar,
    },

    data() {
        const struktur = this.struktur || false;
        return {
            ketua_umum: struktur ? struktur.ketua_umum : '',
            bendahara: struktur ? struktur.bendahara : '',
            sekertaris: struktur ? struktur.sekertaris : '',
            kepala_bidang_1: struktur ? struktur.kepala_bidang_1 : '',
            kepala_bidang_2: struktur ? struktur.kepala_bidang_2 : '',
            kepala_bidang_3: struktur ? struktur.kepala_bidang_3 : '',
            kepala_bidang_4: struktur ? struktur.kepala_bidang_4 : '',
            kepala_bidang_5: struktur ? struktur.kepala_bidang_5 : '',
            kepala_divisi_1: struktur ? struktur.kepala_divisi_1 : '',
            kepala_divisi_2: struktur ? struktur.kepala_divisi_2 : '',
        }
    },

    methods: {
        getData(event) {
            axios.get('struktur-organisasi/' + event.target.value).then(res => {
                this.ketua_umum = res.data.ketua_umum;
                this.bendahara = res.data.bendahara;
                this.sekertaris = res.data.sekertaris;
                this.kepala_bidang_1 = res.data.kepala_bidang_1;
                this.kepala_bidang_2 = res.data.kepala_bidang_2;
                this.kepala_bidang_3 = res.data.kepala_bidang_3;
                this.kepala_bidang_4 = res.data.kepala_bidang_4;
                this.kepala_bidang_5 = res.data.kepala_bidang_5;
                this.kepala_divisi_1 = res.data.kepala_divisi_1;
                this.kepala_divisi_2 = res.data.kepala_divisi_2;
            })
        }
    },
})
</script>

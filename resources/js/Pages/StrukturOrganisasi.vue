<template>
    <page-layout title="Struktur Organisasi">

        <div class="flex flex-col mx-auto w-3/4 h-screen">
            <div class="m-auto flex flex-col items-center">

                <!--Card Form-->
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <h1 class="text-2xl font-bold text-center">Struktur Organisasi RIPALA</h1>
                    </div>
                    <span class="mr-2">Periode Menjabat</span>
                    <select name="periode" id="periode" @change="getData($event)"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full max-w-2xl w-16">
                        <option v-for="perionde in periode" :value="perionde">{{
                                perionde
                            }}
                        </option>
                    </select>
                    <div class="mb-4 flex flex-col items-center mt-5">
                        <div class="grid grid-cols-8 gap-4 justify-items-center">
                            <div class="col-span-2 col-start-4">
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_ketua_umum"
                                         alt="Gambar Ketua Umum">
                                    <div class="text-center mt-2 text-xl font-bold">Ketua Umum</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.ketua_umum
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-8 gap-4 justify-items-center mt-4">
                            <div class="col-start-4">
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_sekertaris"
                                         alt="Gambar Ketua Umum">
                                    <div class="text-center mt-2 text-xl font-bold">Ketua Umum</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.sekertaris
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-5">
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_bendahara" alt="Gambar Bendahara">
                                    <div class="text-center mt-2 text-xl font-bold">Bendahara</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.bendahara
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-7 gap-4 justify-items-center pb-3 mt-4">
                            <div>
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_kepala_bidang_1"
                                         alt="Gambar Wakil Ketua Umum">
                                    <div class="text-center mt-2 text-xl font-bold">Kepala Bidang 1</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.kepala_bidang_1
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_kepala_bidang_2"
                                         alt="Gambar Wakil Ketua Umum">
                                    <div class="text-center mt-2 text-xl font-bold">Kepala Bidang 2</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.kepala_bidang_2
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_kepala_bidang_3"
                                         alt="Gambar Wakil Ketua Umum">
                                    <div class="text-center mt-2 text-xl font-bold">Kepala Bidang 3</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.kepala_bidang_3
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_kepala_bidang_4"
                                         alt="Gambar Wakil Ketua Umum">
                                    <div class="text-center mt-2 text-xl font-bold">Kepala Bidang 4</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.kepala_bidang_4
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_kepala_bidang_5"
                                         alt="Gambar Wakil Ketua Umum">
                                    <div class="text-center mt-2 text-xl font-bold">Kepala Bidang 5</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.kepala_bidang_5
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_kepala_divisi_1"
                                         alt="Gambar Wakil Ketua Umum">
                                    <div class="text-center mt-2 text-xl font-bold">Kepala Divisi 1</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.kepala_divisi_1
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card w-auto mx-auto bg-white shadow-xl hover:shadow rounded">
                                    <img class="w-20 h-20 mx-auto rounded-full border-8 border-white"
                                         :src="'images/' + strukturOrganisasi.gambar_kepala_divisi_2"
                                         alt="Gambar Wakil Ketua Umum">
                                    <div class="text-center mt-2 text-xl font-bold">Kepala Divisi 2</div>
                                    <div class="text-center font-normal text-lg">{{
                                            strukturOrganisasi.kepala_divisi_2
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
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

    props: ['strukturOrganisasi', 'periode'],

    components: {
        PageLayout,
        Link
    },

})
</script>

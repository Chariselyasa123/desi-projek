<template>
    <app-layout title="Edit Struktur Organisasi">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <!-- Card Header -->
                    <div class="px-4 py-5 border-b-2 border-gray-200 sm:px-6">
                        <span class="font-bold text-2xl w-auto mr-5">Edit Struktur Organisasi</span>
                    </div>
                    <!-- Card Body -->
                    <div class="px-4 py-5 flex flex-wrap flex-col justify-center">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div>
                                    <jet-label for="ketua_umum" value="Ketua Umum"/>
                                    <jet-input id="ketua_umum" type="text" class="mt-1 block w-full"
                                               v-model="form.ketua_umum" required autofocus/>
                                    <div class="flex">
                                        <jet-input id="gambar_ketua_umum" type="file" class="mt-1 block w-full"
                                                   @change="gambarKetuaUmum" required/>
                                        <img
                                            v-if="gambar_ketua_umum"
                                            :src="gambar_ketua_umum"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.ketua_umum" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="sekertaris" value="Sekertaris"/>
                                    <jet-input id="sekertaris" type="text" class="mt-1 block w-full"
                                               v-model="form.sekertaris" required/>
                                    <div class="flex">
                                        <jet-input id="gambar_sekertaris" type="file" class="mt-1 block w-full"
                                                   @change="gambarSekertaris" required/>
                                        <img
                                            v-if="gambar_sekertaris"
                                            :src="gambar_sekertaris"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.sekertaris" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="bendahara" value="Bendahara"/>
                                    <jet-input id="bendahara" type="text" class="mt-1 block w-full"
                                               v-model="form.bendahara" required
                                    />
                                    <div class="flex">
                                        <jet-input id="gambar_bendahara" type="file" class="mt-1 block w-full"
                                                   @change="gambarBendahara" required/>
                                        <img
                                            v-if="gambar_bendahara"
                                            :src="gambar_bendahara"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.bendahara" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_bidang_1" value="Kepala Bidang 1"/>
                                    <jet-input id="kepala_bidang_1" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_1" required
                                    />
                                    <div class="flex">
                                        <jet-input id="gambar_kepala_bidang_1" type="file" class="mt-1 block w-full"
                                                   @change="gambarKepalaBidang1" required/>
                                        <img
                                            v-if="gambar_kepala_bidang_1"
                                            :src="gambar_kepala_bidang_1"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.kepala_bidang_1" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_bidang_2" value="Kepala Bidang 2"/>
                                    <jet-input id="kepala_bidang_2" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_2" required
                                    />
                                    <div class="flex">
                                        <jet-input id="gambar_kepala_bidang_2" type="file" class="mt-1 block w-full"
                                                   @change="gambarKepalaBidang2" required/>
                                        <img
                                            v-if="gambar_kepala_bidang_2"
                                            :src="gambar_kepala_bidang_2"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.kepala_bidang_2" class="mt-2"/>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <jet-label for="kepala_bidang_3" value="Kepala Bidang 3"/>
                                    <jet-input id="kepala_bidang_3" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_3" required
                                    />
                                    <div class="flex">
                                        <jet-input id="gambar_kepala_bidang_3" type="file" class="mt-1 block w-full"
                                                   @change="gambarKepalaBidang3" required/>
                                        <img
                                            v-if="gambar_kepala_bidang_3"
                                            :src="gambar_kepala_bidang_3"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.kepala_bidang_3" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_bidang_4" value="Kepala Bidang 4"/>
                                    <jet-input id="kepala_bidang_4" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_4" required
                                    />
                                    <div class="flex">
                                        <jet-input id="gambar_kepala_bidang_4" type="file" class="mt-1 block w-full"
                                                   @change="gambarKepalaBidang4" required/>
                                        <img
                                            v-if="gambar_kepala_bidang_4"
                                            :src="gambar_kepala_bidang_4"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.kepala_bidang_4" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_bidang_5" value="Kepala Bidang 5"/>
                                    <jet-input id="kepala_bidang_5" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_5" required
                                    />
                                    <div class="flex">
                                        <jet-input id="gambar_kepala_bidang_5" type="file" class="mt-1 block w-full"
                                                   @change="gambarKepalaBidang5" required/>
                                        <img
                                            v-if="gambar_kepala_bidang_5"
                                            :src="gambar_kepala_bidang_5"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.kepala_bidang_5" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_divisi_1" value="Kepala Divisi 1"/>
                                    <jet-input id="kepala_divisi_1" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_divisi_1" required
                                    />
                                    <div class="flex">
                                        <jet-input id="gambar_kepala_divisi_1" type="file" class="mt-1 block w-full"
                                                   @change="gambarKepalaDivisi1" required/>
                                        <img
                                            v-if="gambar_kepala_divisi_1"
                                            :src="gambar_kepala_divisi_1"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.kepala_divisi_1" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_divisi_2" value="Kepala Divisi 2"/>
                                    <jet-input id="kepala_divisi_2" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_divisi_2" required
                                    />
                                    <div class="flex">
                                        <jet-input id="gambar_kepala_divisi_2" type="file" class="mt-1 block w-full"
                                                   @change="gambarKepalaDivisi2" required/>
                                        <img
                                            v-if="gambar_kepala_divisi_2"
                                            :src="gambar_kepala_divisi_2"
                                            class="h-40 w-40"
                                            alt="foto ketua umum">
                                    </div>
                                    <jet-input-error :message="form.errors.kepala_divisi_2" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="periode_menjabat" value="Periode Menjabat"/>
                                    <jet-input id="periode_menjabat" type="text" class="mt-1 block w-full"
                                               v-model="form.periode_menjabat" required placeholder="Contoh: 2021-2022"
                                    />
                                    <jet-input-error :message="form.errors.periode_menjabat" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                        <jet-button type="submit" class="mt-4 mx-auto" @click="submit"
                                    :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Simpan
                        </jet-button>
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
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import struktur from "@/Pages/Struktur/Struktur";

export default defineComponent({

    props: {
        struktur: {
            type: Object,
            required: true
        }
    },

    components: {
        AppLayout,
        JetButton,
        JetInput,
        JetInputError,
        JetLabel,
    },

    data() {
        return {
            form: this.$inertia.form({
                ketua_umum: this.struktur.ketua_umum,
                sekertaris: this.struktur.sekertaris,
                bendahara: this.struktur.bendahara,
                kepala_bidang_1: this.struktur.kepala_bidang_1,
                kepala_bidang_2: this.struktur.kepala_bidang_2,
                kepala_bidang_3: this.struktur.kepala_bidang_3,
                kepala_bidang_4: this.struktur.kepala_bidang_4,
                kepala_bidang_5: this.struktur.kepala_bidang_5,
                kepala_divisi_1: this.struktur.kepala_divisi_1,
                kepala_divisi_2: this.struktur.kepala_divisi_2,
                periode_menjabat: this.struktur.periode_menjabat,
                gambar_ketua_umum: this.struktur.gambar_ketua_umum,
                gambar_sekertaris: this.struktur.gambar_sekertaris,
                gambar_bendahara: this.struktur.gambar_bendahara,
                gambar_kepala_bidang_1: this.struktur.gambar_kepala_bidang_1,
                gambar_kepala_bidang_2: this.struktur.gambar_kepala_bidang_2,
                gambar_kepala_bidang_3: this.struktur.gambar_kepala_bidang_3,
                gambar_kepala_bidang_4: this.struktur.gambar_kepala_bidang_4,
                gambar_kepala_bidang_5: this.struktur.gambar_kepala_bidang_5,
                gambar_kepala_divisi_1: this.struktur.gambar_kepala_divisi_1,
                gambar_kepala_divisi_2: this.struktur.gambar_kepala_divisi_2,
            }),
            gambar_ketua_umum: '/images/' + this.struktur.gambar_ketua_umum,
            gambar_sekertaris: '/images/' + this.struktur.gambar_sekertaris,
            gambar_bendahara: '/images/' + this.struktur.gambar_bendahara,
            gambar_kepala_bidang_1: '/images/' + this.struktur.gambar_kepala_bidang_1,
            gambar_kepala_bidang_2: '/images/' + this.struktur.gambar_kepala_bidang_2,
            gambar_kepala_bidang_3: '/images/' + this.struktur.gambar_kepala_bidang_3,
            gambar_kepala_bidang_4: '/images/' + this.struktur.gambar_kepala_bidang_4,
            gambar_kepala_bidang_5: '/images/' + this.struktur.gambar_kepala_bidang_5,
            gambar_kepala_divisi_1: '/images/' + this.struktur.gambar_kepala_divisi_1,
            gambar_kepala_divisi_2: '/images/' + this.struktur.gambar_kepala_divisi_2,
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('struktur-organisasi.update', {id: this.struktur.id}), {
                onSuccess: () => {
                    this.successAlert()
                    this.form.reset()
                },
            })
        },

        successAlert() {
            this.$swal.mixin({
                toast: true,
                icon: 'success',
                title: 'General Title',
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            }).fire({
                animation: true,
                title: this.$page.props.flash.message
            });
        },

        gambarKetuaUmum(e) {
            const file = e.target.files[0];
            this.gambar_ketua_umum = URL.createObjectURL(file);
            this.form.gambar_ketua_umum = file;
        },

        gambarSekertaris(e) {
            const file = e.target.files[0];
            this.gambar_sekertaris = URL.createObjectURL(file);
            this.form.gambar_sekertaris = file;
        },

        gambarBendahara(e) {
            const file = e.target.files[0];
            this.gambar_bendahara = URL.createObjectURL(file);
            this.form.gambar_bendahara = file;
        },

        gambarKepalaBidang1(e) {
            const file = e.target.files[0];
            this.gambar_kepala_bidang_1 = URL.createObjectURL(file);
            this.form.gambar_kepala_bidang_1 = file;
        },

        gambarKepalaBidang2(e) {
            const file = e.target.files[0];
            this.gambar_kepala_bidang_2 = URL.createObjectURL(file);
            this.form.gambar_kepala_bidang_2 = file;
        },

        gambarKepalaBidang3(e) {
            const file = e.target.files[0];
            this.gambar_kepala_bidang_3 = URL.createObjectURL(file);
            this.form.gambar_kepala_bidang_3 = file;
        },


        gambarKepalaBidang4(e) {
            const file = e.target.files[0];
            this.gambar_kepala_bidang_4 = URL.createObjectURL(file);
            this.form.gambar_kepala_bidang_4 = file;
        },

        gambarKepalaBidang5(e) {
            const file = e.target.files[0];
            this.gambar_kepala_bidang_5 = URL.createObjectURL(file);
            this.form.gambar_kepala_bidang_5 = file;
        },

        gambarKepalaDivisi1(e) {
            const file = e.target.files[0];
            this.gambar_kepala_divisi_1 = URL.createObjectURL(file);
            this.form.gambar_kepala_divisi_1 = file;
        },

        gambarKepalaDivisi2(e) {
            const file = e.target.files[0];
            this.gambar_kepala_divisi_2 = URL.createObjectURL(file);
            this.form.gambar_kepala_divisi_2 = file;
        },
    }

})

</script>

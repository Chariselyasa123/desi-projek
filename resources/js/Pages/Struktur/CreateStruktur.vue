<template>
    <app-layout title="Membuat Struktur Organisasi Baru">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <!-- Card Header -->
                    <div class="px-4 py-5 border-b-2 border-gray-200 sm:px-6">
                        <span class="font-bold text-2xl w-auto mr-5">Buat Struktur Organisasi Baru</span>
                    </div>
                    <!-- Card Body -->
                    <div class="px-4 py-5 flex flex-wrap flex-col justify-center">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div>
                                    <jet-label for="ketua_umum" value="Ketua Umum"/>
                                    <jet-input id="ketua_umum" type="text" class="mt-1 block w-full"
                                               v-model="form.ketua_umum" required autofocus/>
                                    <jet-input-error :message="form.errors.ketua_umum" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="sekertaris" value="Sekertaris"/>
                                    <jet-input id="sekertaris" type="text" class="mt-1 block w-full"
                                               v-model="form.sekertaris" required/>
                                    <jet-input-error :message="form.errors.sekertaris" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="bendahara" value="Bendahara"/>
                                    <jet-input id="bendahara" type="text" class="mt-1 block w-full"
                                               v-model="form.bendahara" required
                                    />
                                    <jet-input-error :message="form.errors.bendahara" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_bidang_1" value="Kepala Bidang 1"/>
                                    <jet-input id="kepala_bidang_1" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_1" required
                                    />
                                    <jet-input-error :message="form.errors.kepala_bidang_1" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_bidang_2" value="Kepala Bidang 2"/>
                                    <jet-input id="kepala_bidang_2" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_2" required
                                    />
                                    <jet-input-error :message="form.errors.kepala_bidang_2" class="mt-2"/>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <jet-label for="kepala_bidang_3" value="Kepala Bidang 3"/>
                                    <jet-input id="kepala_bidang_3" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_3" required
                                    />
                                    <jet-input-error :message="form.errors.kepala_bidang_3" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_bidang_4" value="Kepala Bidang 4"/>
                                    <jet-input id="kepala_bidang_4" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_4" required
                                    />
                                    <jet-input-error :message="form.errors.kepala_bidang_4" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_bidang_5" value="Kepala Bidang 5"/>
                                    <jet-input id="kepala_bidang_5" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_bidang_5" required
                                    />
                                    <jet-input-error :message="form.errors.kepala_bidang_5" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_divisi_1" value="Kepala Divisi 1"/>
                                    <jet-input id="kepala_divisi_1" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_divisi_1" required
                                    />
                                    <jet-input-error :message="form.errors.kepala_divisi_1" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kepala_divisi_2" value="Kepala Divisi 2"/>
                                    <jet-input id="kepala_divisi_2" type="text" class="mt-1 block w-full"
                                               v-model="form.kepala_divisi_2" required
                                    />
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

export default defineComponent({

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
                ketua_umum: '',
                sekertaris: '',
                bendahara: '',
                kepala_bidang_1: '',
                kepala_bidang_2: '',
                kepala_bidang_3: '',
                kepala_bidang_4: '',
                kepala_bidang_5: '',
                kepala_divisi_1: '',
                kepala_divisi_2: '',
                periode_menjabat: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('struktur-organisasi.store'), {
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
    }

})

</script>

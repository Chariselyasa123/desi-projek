<template>
    <app-layout title="Create Data Maps">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <!-- Card Header -->
                    <div class="px-4 py-5 border-b-2 border-gray-200 sm:px-6">
                        <span class="font-bold text-2xl w-auto mr-5">Add New Maps Data </span>
                    </div>
                    <!-- Card Body -->
                    <div class="px-4 py-5 flex flex-wrap flex-col justify-center">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div>
                                    <jet-label for="nama_gunung" value="Nama Gunung"/>
                                    <jet-input id="nama_gunung" type="text" class="mt-1 block w-full"
                                               v-model="form.nama_gunung"
                                               required autofocus/>
                                    <jet-input-error :message="form.errors.nama_gunung" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="tinngi" value="Tinggi Gunung/mdpl"/>
                                    <jet-input id="tinngi" type="text" class="mt-1 block w-full" v-model="form.tinggi"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.tinngi" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="luas" value="Luas Gunung"/>
                                    <jet-input id="luas" type="text" class="mt-1 block w-full" v-model="form.luas"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.luas" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="jenis_gunung" value="Jenis Gunung"/>
                                    <jet-input id="jenis_gunung" type="text" class="mt-1 block w-full"
                                               v-model="form.jenis_gunung"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.jenis_gunung" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="status_gunung" value="Status Gunung"/>
                                    <jet-input id="status_gunung" type="text" class="mt-1 block w-full"
                                               v-model="form.status_gunung"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.status_gunung" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="status_pendakian" value="Status Pendakian"/>
                                    <jet-input id="status_pendakian" type="text" class="mt-1 block w-full"
                                               v-model="form.status_pendakian"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.status_pendakian" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="cuaca" value="Cuaca Gunung"/>
                                    <jet-input id="cuaca" type="text" class="mt-1 block w-full" v-model="form.cuaca"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.cuaca" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kuota_pendakian_hari_ini" value="Kuota Pendakian Hari Ini"/>
                                    <jet-input id="kuota_pendakian_hari_ini" type="text" class="mt-1 block w-full"
                                               v-model="form.kuota_pendakian_hari_ini"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.kuota_pendakian_hari_ini" class="mt-2"/>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <jet-label for="jalur_pendakian" value="Jalur Pendakian"/>
                                    <jet-input id="jalur_pendakian" type="text" class="mt-1 block w-full"
                                               v-model="form.jalur_pendakian"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.jalur_pendakian" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="persyaratan_pendakian" value="Persyaratan Pendakian"/>
                                    <textarea id="persyaratan_pendakian" type="text"
                                              class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                              v-model="form.persyaratan_pendakian"
                                              required
                                    ></textarea>
                                    <jet-input-error :message="form.errors.persyaratan_pendakian" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="peraturan_wilayah_gunung" value="Peraturan Wilayah Gunung"/>
                                    <textarea id="peraturan_wilayah_gunung" type="text"
                                              class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                              v-model="form.peraturan_wilayah_gunung"
                                              required
                                    ></textarea>
                                    <jet-input-error :message="form.errors.peraturan_wilayah_gunung" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="biaya_simaksi" value="Biaya Simaksi"/>
                                    <jet-input id="biaya_simaksi" type="text" class="mt-1 block w-full"
                                               v-model="form.biaya_simaksi"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.biaya_simaksi" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="data_kecelakaan_gunung" value="Data Kecelakaan Gunung"/>
                                    <textarea id="data_kecelakaan_gunung" type="text"
                                              class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                              v-model="form.data_kecelakaan_gunung"
                                              required
                                    ></textarea>
                                    <jet-input-error :message="form.errors.data_kecelakaan_gunung" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="contact_us"
                                               value="Contact US/Kontak yang bisa dihubungi pihak gunung"/>
                                    <jet-input id="contact_us" type="text" class="mt-1 block w-full"
                                               v-model="form.contact_us"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.contact_us" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="coordinates" value="Koordinat"/>
                                    <jet-input id="coordinates" type="text" class="mt-1 block w-full"
                                               v-model="form.coordinates"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.coordinates" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                        <jet-button type="submit" class="mt-4 mx-auto" @click="submit(map.id)"
                                    :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update
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
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'

export default defineComponent({

    props: {
        map: Object,
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
                nama_gunung: this.map.nama_gunung,
                tinggi: this.map.tinggi,
                luas: this.map.luas,
                jenis_gunung: this.map.jenis_gunung,
                status_gunung: this.map.status_gunung,
                status_pendakian: this.map.status_pendakian,
                cuaca: this.map.cuaca,
                kuota_pendakian_hari_ini: this.map.kuota_pendakian_hari_ini,
                jalur_pendakian: this.map.jalur_pendakian,
                persyaratan_pendakian: this.map.persyaratan_pendakian,
                peraturan_wilayah_gunung: this.map.peraturan_wilayah_gunung,
                biaya_simaksi: this.map.biaya_simaksi,
                data_kecelakaan_gunung: this.map.data_kecelakaan_gunung,
                contact_us: this.map.contact_us,
                coordinates: this.map.coordinates,
            })
        }
    },

    methods: {
        submit(id) {
            this.form.patch(this.route('data-maps.update', {id}), {
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
    },

})
</script>

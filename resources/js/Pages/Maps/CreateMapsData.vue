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
                                               v-model="form.nama_gunung" placeholder="Gunung Salak"
                                               required autofocus/>
                                    <jet-input-error :message="form.errors.nama_gunung" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="tinngi" value="Tinggi Gunung/mdpl"/>
                                    <jet-input id="tinngi" type="number" class="mt-1 block w-full" v-model="form.tinggi"
                                               required placeholder="2800"
                                    />
                                    <jet-input-error :message="form.errors.tinngi" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="luas" value="Luas Gunung"/>
                                    <jet-input id="luas" type="number" class="mt-1 block w-full" v-model="form.luas"
                                               required placeholder="113.357"
                                    />
                                    <jet-input-error :message="form.errors.luas" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="jenis_gunung" value="Jenis Gunung"/>
                                    <jet-input id="jenis_gunung" type="text" class="mt-1 block w-full"
                                               v-model="form.jenis_gunung" placeholder="Gunung api strato tipe A"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.jenis_gunung" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="status_gunung" value="Status Gunung"/>
                                    <jet-input id="status_gunung" type="text" class="mt-1 block w-full"
                                               v-model="form.status_gunung" placeholder="Aktif"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.status_gunung" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="status_pendakian" value="Status Pendakian"/>
                                    <jet-input id="status_pendakian" type="text" class="mt-1 block w-full"
                                               v-model="form.status_pendakian" placeholder="Buka"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.status_pendakian" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="cuaca" value="Cuaca Gunung"/>
                                    <jet-input id="cuaca" type="text" class="mt-1 block w-full" v-model="form.cuaca"
                                               required placeholder="Cerah"
                                    />
                                    <jet-input-error :message="form.errors.cuaca" class="mt-2"/>
                                </div>

                                <div class="mt-4">
                                    <jet-label for="kuota_pendakian_hari_ini" value="Kuota Pendakian Hari Ini"/>
                                    <jet-input id="kuota_pendakian_hari_ini" type="text" class="mt-1 block w-full"
                                               v-model="form.kuota_pendakian_hari_ini"
                                               placeholder="± 300 pendaki via pasir reungit"
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
                                               placeholder="Cidahu, Giri Jaya, Cimelati, Pasir Reungit"
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
                                    <jet-input id="biaya_simaksi" type="number" class="mt-1 block w-full"
                                               v-model="form.biaya_simaksi" placeholder="25000"
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
                                               v-model="form.contact_us" placeholder="Hubungi admin kami"
                                               required
                                    />
                                    <jet-input-error :message="form.errors.contact_us" class="mt-2"/>
                                </div>

                                <div class="mt-4 grid grid-cols-2 gap-4">
                                    <div>
                                        <jet-label for="latitude" value="Latitude"/>
                                        <jet-input id="latitude" type="number" class="mt-1 block w-full"
                                                   v-model="form.lat" placeholder="-6.202394"
                                                   required
                                        />
                                        <jet-input-error :message="form.errors.long" class="mt-2"/>
                                    </div>
                                    <div>
                                        <jet-label for="longitude" value="Longitude"/>
                                        <jet-input id="longitude" type="number" class="mt-1 block w-full"
                                                   v-model="form.long" placeholder="106.652710"
                                                   required
                                        />
                                        <jet-input-error :message="form.errors.long" class="mt-2"/>
                                    </div>
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
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'

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
                nama_gunung: '',
                tinggi: '',
                luas: '',
                jenis_gunung: '',
                status_gunung: '',
                status_pendakian: '',
                cuaca: '',
                kuota_pendakian_hari_ini: '',
                jalur_pendakian: '',
                persyaratan_pendakian: '',
                peraturan_wilayah_gunung: '',
                biaya_simaksi: '',
                data_kecelakaan_gunung: '',
                contact_us: '',
                lat: '',
                long: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('data-maps.store'), {
                onSuccess: () => this.form.reset(),
            })
        }
    },

})
</script>

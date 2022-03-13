<template>
    <app-layout title="Edit Anggota">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <!-- Card Header -->
                    <div class="px-4 py-5 border-b-2 border-gray-200 sm:px-6">
                        <span class="font-bold text-2xl w-auto mr-5">Edit Anggota</span>
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
        member: Object,
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


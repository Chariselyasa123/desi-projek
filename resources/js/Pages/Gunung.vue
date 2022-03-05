<template>
    <page-layout title="Info Gunung">

        <!-- Make content center div -->
        <div class="flex flex-col h-full">
            <div class="m-auto flex flex-col items-center w-full md:w-9/12">

                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full">
                    <h1 class="text-3xl font-bold px-6">Info gunung</h1>

                    <table class="mt-6">
                        <tr>
                            <td class="px-6 py-4 font-bold">Nama Gunung</td>
                            <td class="px-6 py-4">{{ ucfirst(map.nama_gunung) }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Tinggi Gunung</td>
                            <td class="px-6 py-4">{{ map.tinggi }} mdpl</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Luas Gunung</td>
                            <td class="px-6 py-4">± {{ map.luas }} Ha</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Jenis Gunung</td>
                            <td class="px-6 py-4">{{ map.jenis_gunung }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Status Gunung</td>
                            <td class="px-6 py-4">{{ map.status_gunung }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Status Pendakian</td>
                            <td class="px-6 py-4">{{ map.status_pendakian }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Cuaca</td>
                            <td class="px-6 py-4">{{ map.cuaca }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Kuota Pendakian Hari Ini</td>
                            <td class="px-6 py-4">{{ map.kuota_pendakian_hari_ini }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Jalur Pendakian</td>
                            <td class="px-6 py-4">{{ map.jalur_pendakian }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Persyaratan Pendakian</td>
                            <td class="px-6 py-4">{{ map.persyaratan_pendakian }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Peraturan Wilayah Gunung</td>
                            <td class="px-6 py-4">{{ map.peraturan_wilayah_gunung }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Biaya Simaksi</td>
                            <td class="px-6 py-4">Rp. {{ numberFormat(parseInt(map.biaya_simaksi), 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Data Kecelakaan</td>
                            <td class="px-6 py-4">{{ map.data_kecelakaan_gunung }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-bold">Kontak Yang Bisa Dihubungi</td>
                            <td class="px-6 py-4">{{ map.contact_us }}</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </page-layout>
</template>

<script>
import {defineComponent} from 'vue'
import PageLayout from "@/Pages/Component/PageLayout";

export default defineComponent({

    props: ['map'],

    components: {
        PageLayout,
    },

    methods: {
        numberFormat(number, decimals, decPoint, thousandsSep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            const n = !isFinite(+number) ? 0 : +number
            const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            const dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            let s = ''

            const toFixedFix = function (n, prec) {
                const k = Math.pow(10, prec)
                return '' + (Math.round(n * k) / k)
                    .toFixed(prec)
            }

            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || ''
                s[1] += new Array(prec - s[1].length + 1).join('0')
            }

            return s.join(dec)
        },
    },

})
</script>

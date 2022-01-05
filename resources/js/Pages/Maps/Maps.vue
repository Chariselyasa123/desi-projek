<template>
    <app-layout title="Data Maps">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">

                    <div class="px-4 py-5 border-b-4 border-gray-200 sm:px-6 flex justify-between">
                        <span class="text-2xl font-bold">Data Maps</span>
                        <!--                        <search-bar placeholder="Cari Artikel" @search="search"/>-->
                        <Link :href="route('data-maps.create')"
                              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            New Maps Data
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
                                                    Nama Gunung
                                                </th>
                                                <th scope="col"
                                                    class="header-table">
                                                    Informasi Gunung
                                                </th>
                                                <th scope="col"
                                                    class="header-table">
                                                    Status Pendakian
                                                </th>
                                                <th scope="col"
                                                    class="header-table">
                                                    Cuaca
                                                </th>
                                                <th scope="col"
                                                    class="header-table">
                                                    Biaya Simaksi
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr v-for="(map, index) in maps">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ index + 1 }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ map.nama_gunung }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 flex gap-4">
                                                        Status
                                                        <span
                                                            :class=" map.status_gunung.toLowerCase() === 'aktif'? 'text-red-700' : 'text-green-600' ">
                                                            {{ map.status_gunung }}
                                                        </span>
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ map.jenis_gunung }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ map.tinggi }} mdpl
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        ± {{ map.luas }} Ha
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ map.status_pendakian }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ map.cuaca }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    Rp. {{ numberFormat(parseInt(map.biaya_simaksi), 0, ',', '.') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button class="text-indigo-600 hover:text-indigo-900"
                                                            @click="editMap(map.id)">
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
                                                            @click="deleteMap(map.id)">
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Card -->

            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from "@/Layouts/AppLayout";
import {Link} from '@inertiajs/inertia-vue3';

export default defineComponent({

    props: {
        maps: {
            type: Object,
            default: () => ({})
        }
    },

    components: {
        AppLayout,
        Link,
    },

    methods: {
        editMap(id) {
            this.$inertia.get(this.route('data-maps.edit', {id}))
        },

        deleteMap(id) {
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
                    that.$inertia.delete(this.route('data-maps.delete', {id}))
                    that.$swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    window.location.reload();
                }
            })
        },

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

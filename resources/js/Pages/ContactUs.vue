<template>
    <page-layout title="Contact Us">

        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Hubungi Kami</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Kami sangat menghargai komentar, pertanyaan,
                        dan umpan balik anda untuk perbaikan</p>
                </div>
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="nama" class="leading-7 text-sm text-gray-600">Nama</label>
                                <input type="text" id="name" name="name" v-model="form.name"
                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <jet-input-error :message="form.errors.name" class="mt-2"/>
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                <input type="email" id="email" name="email" v-model="form.email"
                                       class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <jet-input-error :message="form.errors.email" class="mt-2"/>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="Pesan" class="leading-7 text-sm text-gray-600">Pesan</label>
                                <textarea id="message" name="message" v-model="form.message"
                                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                <jet-input-error :message="form.errors.message" class="mt-2"/>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button
                                @click="submit"
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                Submit
                            </button>
                        </div>
                        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </page-layout>
</template>

<script>
import {defineComponent} from 'vue'
import PageLayout from "@/Pages/Component/PageLayout";
import JetInputError from '@/Jetstream/InputError.vue'

export default defineComponent({

    components: {
        PageLayout,
        JetInputError,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                message: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('send-email'), {
                onFailure: (response) => {
                    console.log(response.data.message);
                },
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
                title: 'Berhasil mengirim pesan',
            });
        },
    }

})
</script>

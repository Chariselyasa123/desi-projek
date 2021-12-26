<template>
    <div>
        <Head :title="title"/>

        <div class="bg-[url('/images/mountain.jpg')]">
            <div class="px-4 py-5 sm:max-w-xl md:max-w-full md:px-24 lg:px-8">
                <div class="relative flex items-center justify-between">
                    <div class="flex items-center">
                        <Link :href="route('welcome')" :active="route().current('welcome')"
                              aria-label="Logo"
                              title="Logo"
                              class="inline-flex items-center mr-8"
                        >
                            <img src="/images/logo-ripala.png" alt="Logo" class="h-24 w-32" ref="logo"/>
                        </Link>
                        <ul class="flex items-center hidden space-x-8 lg:flex">
                            <li>
                                <nav-link :href="route('welcome')" :active="route().current('welcome')">Beranda
                                </nav-link
                                >
                            </li>
                            <li>
                                <nav-link :href="route('artikel')" :active="route().current('artikel')">Artikel
                                </nav-link>
                            </li>
                            <li>
                                <nav-link :href="route('pendaftaran-anggota')"
                                          :active="route().current('pendaftaran-anggota')">Pendaftaran Anggota
                                </nav-link
                                >
                            </li>
                        </ul>
                    </div>
                    <ul class="flex items-center hidden space-x-8 lg:flex">
                        <li>
                            <nav-link>Tentang Kami</nav-link>
                        </li>
                        <li>
                            <nav-link>Hubungi Kami</nav-link>
                        </li>
                    </ul>
                    <div class="lg:hidden">
                        <button
                            aria-label="Open Menu"
                            title="Open Menu"
                            class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline hover:bg-deep-purple-50 focus:bg-deep-purple-50"
                            @click="isMenuOpen = true"
                        >
                            <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                <path
                                    fill="currentColor"
                                    d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"
                                ></path>
                                <path
                                    fill="currentColor"
                                    d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"
                                ></path>
                                <path
                                    fill="currentColor"
                                    d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"
                                ></path>
                            </svg>
                        </button>
                        <div v-if="isMenuOpen" class="absolute top-0 left-0 w-full">
                            <div class="p-5 bg-white border rounded shadow-sm">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <Link :href="route('welcome')" :active="route().current('welcome')"
                                              aria-label="Logo"
                                              title="Logo"
                                              class="inline-flex items-center mr-8"
                                        >
                                            <img src="/images/logo-ripala.png" alt="Logo" class="h-24 w-32" ref="logo"/>
                                        </Link>
                                    </div>
                                    <div>
                                        <button
                                            aria-label="Close Menu"
                                            title="Close Menu"
                                            class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            @click="isMenuOpen = false"
                                        >
                                            <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                                <path
                                                    fill="currentColor"
                                                    d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <nav>
                                    <ul class="space-y-4">
                                        <li>
                                            <nav-link :href="route('welcome')" :active="route().current('welcome')">
                                                Beranda
                                            </nav-link
                                            >
                                        </li>
                                        <li>
                                            <nav-link :href="route('artikel')" :active="route().current('artikel')">
                                                Artikel
                                            </nav-link>
                                        </li>
                                        <li>
                                            <nav-link :href="route('pendaftaran-anggota')"
                                                      :active="route().current('pendaftaran-anggota')">Pendaftaran
                                                Anggota
                                            </nav-link
                                            >
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- page content -->
            <div class="flex flex-col h-screen">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import NavLink from "@/Pages/Component/NavLink";

export default defineComponent({

    props: {
        title: String,
    },

    components: {
        Head,
        Link,
        NavLink,
    },

    data() {
        return {
            isMenuOpen: false,
        };
    },

    methods: {
        handleScroll(event) {
            "use strict";
            if (window.scrollY > 4) {
                this.$refs.navbar.classList.add('scrolled');
                this.$refs.logo.classList.add('hidden');
            } else {
                this.$refs.navbar.classList.remove('scrolled');
                this.$refs.logo.classList.remove('hidden');
            }
        },
    },

    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },

    unmounted() {
        window.removeEventListener('scroll', this.handleScroll);
    },
})
</script>

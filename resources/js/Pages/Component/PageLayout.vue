<template>
    <div>
        <Head :title="title"/>

        <div class="bg-[url('/images/mountain.jpg')]">
            <!-- Landing page header -->
            <nav class="navbar-fixed-top" ref="navbar">
                <div class="flex gap-8 items-center">
                    <Link :href="route('welcome')" class="uppercase text-2xl font-bold">
                        <img src="/images/logo-ripala.png" alt="Logo" class="h-24 w-32" ref="logo"/>
                    </Link>
                    <nav-link :href="route('welcome')" :active="route().current('welcome')">Beranda</nav-link>
                    <nav-link>Artikel</nav-link>
                    <nav-link :href="route('pendaftaran-anggota')" :active="route().current('pendaftaran-anggota')">
                        Pendaftaran Anggota
                    </nav-link>
                </div>
                <div class="flex gap-8 items-center">
                    <nav-link>Tentang Kami</nav-link>
                    <nav-link>Hubungi Kami</nav-link>
                </div>
            </nav>

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

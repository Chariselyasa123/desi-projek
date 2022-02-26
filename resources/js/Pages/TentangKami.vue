<template>
    <page-layout title="Tentang Kami">

        <div class="flex flex-col mx-auto w-3/4">
            <div class="m-auto flex flex-col items-center">

                <!--Card Form-->
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <h1 class="text-2xl font-bold text-center">Sejarah RIPALA (Raharja Ikatan Pecinta
                            Alam)</h1>
                    </div>
                    <div class="mb-4 flex flex-col items-center">
                        <img src="/images/logo-ripala.png" alt="Logo" class="h-2/5 w-1/4 2xl:h-3/4 2xl:w-1/2" ref="logo"/>
                    </div>
                    <article class="prose w-full text-justify" style="max-width: 100% !important;">
                        <p class="indent-8">
                            Ripala adalah sebuah nama organisasi pecinta alam yang disingkat RIPALA (Raharja Ikatan Pecinta Alam) di mana merupakan tempat perkumpulan atau perhimpunan rimba dan pendaki gunung yang menggunakan alam terbuka sebagai media pendidikan. Ripala adalah sebuah organisasi pecinta alam yang lahir pada tanggal 23 Februari 1999. Organisasi ini tumbuh menjadi pioner kegiatan pecinta alam di STMIK Raharja yang sekarang tergabung menjadi Universitas Raharja. RIPALA terletak di Modern, Jl. Jenderal Sudirman No.40, RT.002/RW.006, Cikokol, Kec. Tangerang, Kota Tangerang, Banten 15117. Dengan saudari Noviyanti sebagai ketua umum. Keanggotaan Ripala terdiri dari sekelompok orang yang memiliki kegemaran melakukan penjelajahan atau petualangan alam terbuka.
                        </p>
                        <p class="indent-8">
                            Alam dengan segala kaidahnya serta tingkah lakunya, merupakan media pendidikan untuk mencapai tujuan Ripala, yaitu: mendidik para anggotanya untuk menambahkan sifat berani, tabah, ulet, tangguh dan mempunyai kemampuan untuk hidup di alam terbuka, mempunyai rasa cinta yang mendalam kepada Alam dan Tanah Air Indonesia, mempererat rasa persaudaraan diantara sesama anggotanya tanpa membedakan golongan, aliran, suku serta agama.
                        </p>
                        <p class="indent-8">
                            Dengan berpijak pada tujuan tadi, Ripala dapat hidup sampai saat ini, selama hidupnya Ripala telah berjalan dan memberi warna pada masyarakat dan akademik. Demikian pula sebaliknya, kemajuan yang terjadi di luar Ripala telah memberi manfaat bagi kemajuan dalam lingkup arena pecinta alam yang sejenis, dan pecinta alam lain saling memberi dan menerima berbagai pengalaman.
                        </p>
                        <p class="indent-8">
                            Terdorong oleh rasa kepedulian dan saling tolong menolong yang ditanamkan sejak masa pendidikan, Ripala selalu melaksanakan kegiatan rutin mengadakan kegiatan Donor Darah disetiap tahunnya.
                        </p>
                    </article>
                
                    <Link :href="route('struktur')" class="text-white bg-gray-800 rounded-full px-8 py-3 mt-4 float-right">Struktur Organisasi</Link>

                </div>
            </div>
        </div>
    </page-layout>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from '@inertiajs/inertia-vue3';
import PageLayout from "@/Pages/Component/PageLayout";

export default defineComponent({

    components: {
        PageLayout,
        Link
    },

})
</script>

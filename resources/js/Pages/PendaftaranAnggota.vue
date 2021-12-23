<template>
    <Head title="Welcome"/>
    <div class="bg-[url('/images/mountain.jpg')]">
        <!-- Landing page header -->
        <div class="flex flex-wrap py-6 px-12 justify-between sticky top-0">
            <div class="flex gap-8 items-center">
                <Link href="#" class="uppercase text-2xl font-bold">
                    <img src="/images/logo-ripala.png" alt="Logo" class="h-32 w-48"/>
                </Link>
                <Link href="#"
                      class="font-bold text-2xl hover:border-b-4 hover:border-gray-900 focus:border-white">Home
                </Link>
                <Link href="#" class="font-bold text-2xl hover:border-b-4 hover:border-gray-900 focus:border-white">
                    Artikel
                </Link>
                <Link :href="route('pendaftaran-anggota')"
                      class="font-bold text-2xl hover:border-b-4 hover:border-gray-900 focus:border-white">
                    Member registration
                </Link>
            </div>
            <div class="flex gap-8 items-center">
                <Link href="#" class="font-bold text-xl hover:border-b-4 hover:border-gray-900 focus:border-white">About
                    us
                </Link>
                <Link href="#" class="font-bold text-xl hover:border-b-4 hover:border-gray-900 focus:border-white">
                    Contact
                </Link>
            </div>
        </div>

        <!-- Landing page content -->
        <!-- Make content center div -->
        <div class="flex flex-col h-screen">
            <div class="m-auto flex flex-col items-center">

                <!--Card Form-->
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <h1 class="text-2xl font-bold text-center uppercase">Form registrasi calon anggota ripala</h1>
                    </div>
                    <div class="mb-4">
                        <p class="text-center">
                            Silahkan isi formulir pendaftaran anggota di bawah ini.
                        </p>
                    </div>
                    <div class="mb-4">
                        <div class="grid grid-cols-2 gap-8 place-content-center">
                            <div>
                                asdasasdhagwugayowi awgd uagf oisgfoih sgdfhi bsughb sihbg shoidbg oihsbdgoih sbgfoi
                                sgoi bsoig shg shgb shhb
                            </div>
                            <form action="">
                                <div>
                                    <jet-label for="name" value="Nama"/>
                                    <jet-input id="name" type="text" class="mt-1 block w-full"
                                               required/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="fakultas" value="Fakultas"/>
                                    <jet-input id="fakultas" type="text" class="mt-1 block w-full"
                                               required/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="ttl" value="Tempat, Tnggal Lahir"/>
                                    <jet-input id="ttl" type="text" class="mt-1 block w-full"
                                               required/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="alamat" value="Alamat"/>
                                    <jet-input id="alamat" type="text" class="mt-1 block w-full"
                                               required/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="no" value="Nomor Hp"/>
                                    <jet-input id="no" type="number" class="mt-1 block w-full"
                                               required/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="email" value="E-mail"/>
                                    <jet-input id="email" type="email" class="mt-1 block w-full"
                                               required/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="alamat" value="Alamat"/>
                                    <jet-input id="alamat" type="text" class="mt-1 block w-full"
                                               required/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";

export default defineComponent({
    components: {
        Head,
        Link,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
    },
})
</script>

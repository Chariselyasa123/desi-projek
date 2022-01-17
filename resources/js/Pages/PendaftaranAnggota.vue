<template>
    <page-layout title="Pendaftaran Anggota">

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
                    <hr class="solid">
                    <div class="mb-4">
                        <div class="grid grid-cols-2 gap-8 place-content-center">
                            <div class="max-w-md">
                                <p>Persyaratan :</p>
                                <ol class="list-decimal list-inside tracking-wide leading-10">
                                    <li class="my-4">Mahasiswa yang terdaftar dan aktif kuliah pada Universitas
                                        Raharja.
                                    </li>
                                    <li class="my-4">Sehat jasmani dan rohani.</li>
                                    <li class="my-4">Maksimal smester 3 (tiga) dalam perkuliahan.</li>
                                    <li class="my-4">Memiliki kemampuan belajar dalam kegiatan alam bebas.</li>
                                </ol>
                                <hr class="solid">
                                <p class="mb-4">Catatan :</p>
                                <p>Bagi yang sudah mendaftarkan diri. Mohon menunggu untuk mendapatkan informasi
                                    selanjutnya terkait informasi pendaftaran calon anggota UKM <span class="font-bold">RIPALA</span>
                                </p>
                            </div>
                            <form @submit.prevent="submit" class="max-w-md">
                                <div>
                                    <jet-label for="name" value="Nama"/>
                                    <jet-input id="name" type="text" class="mt-1 block w-full"
                                               placeholder="Nama Calon Anggota" v-model="form.name"
                                               required/>
                                    <jet-input-error :message="form.errors.name" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="fakultas" value="Fakultas"/>
                                    <select id="fakultas" v-model="form.fakultas" ref="fakultas"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                                        <option value="" disabled selected>- Pilih Fakultas -</option>
                                        <option v-for="item in fakultas" :value="item.id">
                                            {{ item.nama_fakultas }}
                                        </option>
                                    </select>
                                    <jet-input-error :message="form.errors.fakultas" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="jurusan" value="Jurusan"/>
                                    <select id="jurusan" v-model="form.jurusan" ref="jurusan"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                                        <option value="" disabled selected>- Pilih Jurusan -</option>
                                    </select>
                                    <jet-input-error :message="form.errors.jurusan" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="semester" value="Semester"/>
                                    <select id="semester" v-model="form.semester"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                                        <option value="" disabled selected>- Pilih Semester -</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <jet-input-error :message="form.errors.semester" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="tempat" value="Tempat Lahir"/>
                                    <jet-input id="tempat" type="text" class="mt-1 block w-full" v-model="form.tempat"
                                               placeholder="Tempat Lahir" required/>
                                    <jet-input-error :message="form.errors.tempat" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="birthday" value="Tanggal Lahir"/>
                                    <jet-input id="birthday" type="date" class="mt-1 block w-full"
                                               v-model="form.birthday"
                                               required/>
                                    <jet-input-error :message="form.errors.birthday" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="address" value="Alamat"/>
                                    <jet-input id="address" type="text" class="mt-1 block w-full" v-model="form.address"
                                               placeholder="Alamat anggota" required/>
                                    <jet-input-error :message="form.errors.address" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="no" value="Nomor Hp"/>
                                    <jet-input id="no" type="number" class="mt-1 block w-full" v-model="form.phone"
                                               placeholder="08216354648" required/>
                                    <jet-input-error :message="form.errors.phone" class="mt-2"/>
                                </div>
                                <div class="mt-4">
                                    <jet-label for="email" value="E-mail"/>
                                    <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                                               placeholder="member@gmail.com"
                                               required/>
                                    <jet-input-error :message="form.errors.email" class="mt-2"/>
                                </div>
                                <jet-button class="mt-4" :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                    Daftar Calon Anggota
                                </jet-button>
                                <jet-input-error :message="form.errors.processing" class="mt-2"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </page-layout>
</template>

<script>
import {defineComponent} from 'vue'
import PageLayout from "@/Pages/Component/PageLayout";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetInputError from '@/Jetstream/InputError.vue'
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";

export default defineComponent({

    props: ['fakultas'],

    components: {
        PageLayout,
        JetButton,
        JetInput,
        JetInputError,
        JetCheckbox,
        JetLabel,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                fakultas: '',
                jurusan: '',
                semester: '',
                tempat: '',
                birthday: '',
                address: '',
                phone: '',
                email: '',
            })
        }
    },

    methods: {
        submit() {
            this.form
                .post(this.route('pendaftaran-anggota.store'), {
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
                title: 'Berhasil Mendaftarkan Anggota'
            });
        },

        jurusan() {
            const that = this;
            this.$refs.fakultas.addEventListener('change', (e) => {
                that.fakultas[e.target.value - 1].programs.map(program => {
                    const option = document.createElement('option');
                    option.value = program.id;
                    option.innerText = `${program.nama_prodi} - ${program.jenjang.toUpperCase()}`;

                    // Append element to jurusan refs
                    that.$refs.jurusan.appendChild(option);
                })
            })
        }
    },

    mounted() {
        this.jurusan();
    }
})
</script>

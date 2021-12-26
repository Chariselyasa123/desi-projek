<template>
    <app-layout title="Membuat Artikel">

        <!-- Make Artikel -->
        <div class="py-12 grid grid-cols-5 gap-4">

            <div class="max-w-7xl sm:px-6 lg:px-8 col-span-3 col-start-2">
                <!-- Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <!-- Card Header -->
                    <div class="px-4 py-5 border-b-4 border-gray-200 sm:px-6 flex items-center">
                        <span class="font-bold text-2xl w-auto mr-5">Title </span>
                        <jet-input type="text" class="w-full" id="title" v-model="form.postTitle" placeholder="Title"/>
                        <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                                    @click.prevent="edit(post.slug)">Edit
                        </jet-button>
                    </div>
                    <!-- Card Body -->
                    <div class="px-4 py-5 sm:p-0 mt-2">
                        <ckeditor :editor="editor" v-model="form.postContent" :config="editorConfig"></ckeditor>
                    </div>
                </div>
            </div>

            <options @alert="runAlert" @updateImage="onImageUpload" @updateCategories="categoriesSelected"
                     :categories="categories" :post="post" :postSlug="form.slug"/>
        </div>

    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetLabel from '@/Jetstream/Label.vue'
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Options from "@/Pages/Post/Partials/Options";
import axios from "axios";

export default defineComponent({

    props: ['post', 'categories'],

    components: {
        AppLayout,
        JetButton,
        JetInput,
        JetLabel,
        ckeditor: CKEditor.component,
        Options,
    },

    data() {
        return {
            editor: ClassicEditor,
            form: this.$inertia.form({
                postTitle: this.post.post_title,
                postContent: this.post.post_content,
                slug: this.post.slug,
                postImage: this.post.featured_image,
                postCategories: this.post.categories.map(v => v.id),
            }),
            editorConfig: {
                ckfinder: {
                    uploadUrl: `${this.route('upload.image')}?_token=${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}`,
                }
            }
        };
    },

    methods: {
        edit(slug) {
            this.form.patch(this.route('post.update', {slug}), {
                onSuccess: () => {
                    this.successAlert()
                    this.form.reset()
                },
                onError: () => {
                    this.errorAlert()
                }
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

        errorAlert() {
            const that = this;
            this.$swal.mixin({
                toast: true,
                icon: 'error',
                title: 'General Title',
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            }).fire({
                animation: true,
                title: Object.values(that.form.errors).map(value => `<ul class="list-disc"><li class="text-red-600">${value}</li></ul>`).join('\n'),
            });
        },

        runAlert() {
            this.successAlert();
        },

        createSlug(title) {
            axios.get(this.route('post.createSlug'), {
                params: {
                    title: title
                }
            }).then(response => {
                this.form.slug = response.data.slug
            })
        },

        onImageUpload(file) {
            this.form.postImage = file;
        },

        categoriesSelected(selectedCategories) {
            this.form.postCategories = selectedCategories;
        },
    }
})
</script>

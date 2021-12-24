<template>
    <app-layout title="Artikel">

        <!-- Make Artikel -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <!-- Card Header -->
                    <div class="px-4 py-5 border-b-4 border-gray-200 sm:px-6 flex items-center">
                        <span class="font-bold text-2xl w-auto mr-5">Title </span>
                        <jet-input type="text" class="w-full" id="title" v-model="form.title" placeholder="Title"/>
                        <jet-button class="ml-4" @click.prevent="posting">Posting</jet-button>
                    </div>
                    <!-- Card Body -->
                    <div class="px-4 py-5 sm:p-0 mt-2">
                        <ckeditor :editor="editor" v-model="form.content" :config="editorConfig"></ckeditor>
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
import JetLabel from '@/Jetstream/Label.vue'
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default defineComponent({
    components: {
        AppLayout,
        JetButton,
        JetInput,
        JetLabel,
        ckeditor: CKEditor.component,
    },

    data() {
        return {
            editor: ClassicEditor,
            form: this.$inertia.form({
                title: '',
                content: '',
            }),
            editorConfig: {
                toolbar: [
                    'heading', '|', 'fontFamily', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'indent', 'outdent', '|', 'image', 'blockQuote', 'insertTable', 'undo', 'redo'
                ],
                fontFamily: {
                    options: [
                        'default',
                        'Ubuntu, Arial, sans-serif',
                        'Ubuntu Mono, Courier New, Courier, monospace'
                    ]
                },
            }
        };
    },

    methods: {
        posting() {
            this.form.post(this.route('artikel.store'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    }
})
</script>

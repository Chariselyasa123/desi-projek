<template>
    <div class="w-full mx-auto sm:px-6 lg:px-8 col-start-5">
        <div class="bg-white overflow-hidden shadow rounded-lg">

            <!-- Card Header -->
            <div class="px-4 py-6 border-b-4 border-gray-200 sm:px-6 flex items-center">
                <span class="font-bold text-2xl">Options</span>
            </div>

            <!-- Card Kategori -->
            <div class="px-4 py-5 sm:p-0 mt-2 border-b-4 border-gray-200">
                <div class="m-5">
                    <span class="text-lg">Kaetegori :</span>
                    <div class="border-2 border-gray-200 flex flex-col">
                        <div class="p-2">
                            <div v-for="category in categories">
                                <jet-label :for="category.name">
                                    <input type="checkbox" :id="category.id" :value="category.id"
                                           v-model="categorySelected"
                                           class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    />
                                    {{ category.name }}
                                </jet-label>
                            </div>
                        </div>
                    </div>
                    <span class="text-sm text-blue-700 font-bold hover:cursor-pointer hover:underline"
                          @click="inputCategory = !inputCategory">+ Add New Category</span>
                    <div class="mt-2" v-show="inputCategory">
                        <jet-input type="text" class="w-full" v-model="category"/>
                        <jet-button class="mt-2" @click.prevent="addNewCategory">Add New Category</jet-button>
                    </div>
                </div>
            </div>

            <!-- Card Slug -->
            <div class="px-4 py-5 sm:p-0 mt-2 border-b-4 border-gray-200">
                <div class="m-5">
                    <span class="text-lg">Slug :</span>
                    <jet-input type="text" class="w-full" v-model="slug" ref="slug"/>
                </div>
            </div>

            <!-- Card featured image -->
            <div class="px-4 py-5 sm:p-0 mt-2 border-b-4 border-gray-200">
                <div class="m-5">
                    <span class="text-lg ">Featured Image :</span>
                    <div v-if="!image">
                        <upload-images
                            @change="handleImages"
                            :max="5"
                            maxError="Max files exceed"
                            uploadMsg="upload featured images"
                            fileError="images files only accepted"
                        />
                    </div>
                    <div v-else>
                        <img :src="image" alt="featured image">
                        <span class="text-sm text-blue-700 font-bold hover:cursor-pointer hover:underline flex mt-4"
                              @click="image = false"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                  <path
                                      d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>
                            Change Featured Image
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--modal-->
    <jet-modal :show.sync="showModal" @close="closeModal">
        <div class="px-6 py-4">
            <upload-images
                @change="handleImages"
                :max="5"
                maxError="Max files exceed"
                uploadMsg="upload featured images"
                fileError="images files only accepted"
            />
        </div>
    </jet-modal>
</template>

<script>
import {defineComponent} from 'vue'
import JetInput from '@/Jetstream/Input.vue'
import JetButton from "@/Jetstream/Button";
import JetLabel from "@/Jetstream/Label";
import JetModal from "@/Jetstream/Modal";
import UploadImages from "vue-upload-drop-images"

export default defineComponent({

    props: ['categories', 'postSlug', 'post'],

    emits: ['alert', 'updateImage', 'updateCategories'],

    data() {
        const post = this.post;
        return {
            category: '',
            slug: post !== undefined ? post.slug ?? '' : '',
            inputCategory: false,
            showModal: false,
            image: post !== undefined ? post.featured_image ?? false : false,
            categorySelected: post !== undefined ? post.categories.map(v => v.id) ?? [] : [],
        }
    },

    components: {
        JetButton,
        JetInput,
        JetLabel,
        JetModal,
        UploadImages,
    },

    methods: {
        addNewCategory() {
            this.$inertia.post(this.route('category.store'), {
                name: this.category,
            }, {
                onSuccess: () => {
                    this.$emit('alert');
                    this.category = '';
                    this.inputCategory = false;
                }
            });

        },

        closeModal() {
            this.showModal = false;
        },

        handleImages(e) {
            const inputValue = e.target.files || e.dataTransfer.files;
            const data = new FormData();
            data.append('upload', inputValue[0]);

            axios.post(this.route('upload.image'), data).then(response => {
                this.image = response.data.url;
                this.$emit('updateImage', this.image);
            });
        },
    },

    watch: {
        postSlug(value) {
            this.slug = value
        },

        categorySelected(value) {
            this.$emit('updateCategories', value);
        },
    }
})
</script>

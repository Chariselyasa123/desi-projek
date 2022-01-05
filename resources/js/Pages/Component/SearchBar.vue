<template>
    <div class="text-gray-600 relative">
        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
               type="search" name="search" :placeholder="placeholder" v-model="search">
        <button type="submit" class="absolute -top-3 mt-5 mr-4" :class="artikelShow" @click.prevent="onSubmit">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </button>
    </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({

    props: {
        placeholder: {
            type: String,
            default: 'Search'
        },
        searchArtikel: {
            type: Boolean
        }
    },

    events: ['search'],

    data() {
        return {
            search: ''
        }
    },

    methods: {
        onSubmit() {
            this.$emit('search', this.search)
        }
    },

    computed: {
        artikelShow() {
            return this.searchArtikel ? 'left-42' : 'right-0';
        }
    }
})
</script>

<template>
    <Link :href="href" :class="classes">
        <slot/>
    </Link>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Link,
    },
    props: ['href', 'active', 'changeTextColor'],

    computed: {
        classes() {
            return this.active
                ? this.changeTextColor ? 'font-bold tracking-wide text-white' : 'font-bold tracking-wide text-blue-700'
                : this.changeTextColor ? 'font-bold tracking-wide transition-colors duration-200 hover:text-blue-700 focus:text-white' : 'font-bold tracking-wide transition-colors duration-200 text-white hover:text-blue-700 focus:text-indigo-400'
        }
    }
})
</script>

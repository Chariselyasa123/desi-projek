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
    props: ['href', 'active'],

    computed: {
        classes() {
            return this.active
                ? 'font-bold text-xl border-gray-900 border-b-4 focus:border-white'
                : 'font-bold text-xl hover:border-b-4 hover:border-gray-900 focus:border-white'
        }
    }
})
</script>

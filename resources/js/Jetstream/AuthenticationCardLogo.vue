<template>
    <Link :href="'/'">
        <img src="/images/logo-ripala.png" alt="Logo" class="h-24 w-32" ref="logo"/>
    </Link>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Link,
    },
})
</script>

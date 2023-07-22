<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Link
        :href="href"
        class="inline-flex items-center px-4 py-2 bg-[#223c68] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-300"
    >
        <slot />
    </Link>
</template>

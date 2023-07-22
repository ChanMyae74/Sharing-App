<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Link
        :href="href"
        class="block flex items-center w-full px-4 py-2 text-left text-sm leading-5 text-white/70 focus:outline-none focus:bg-gray-800 transition duration-150 ease-in-out"
    >
        <slot />
    </Link>
</template>

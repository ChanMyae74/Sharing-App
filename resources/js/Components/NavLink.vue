<script setup>
import {computed} from 'vue';
import {Link} from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'flex h-5 items-center justify-center gap-x-2 rounded-lg px-3 text-xs hover:text-white text-sky-400 duration-300 uppercase'
        : 'flex h-5 items-center justify-center gap-x-2 rounded-lg px-3 text-xs hover:text-white text-gray-400 duration-300 uppercase'
);
</script>

<template>
    <Link :class="classes" :href="href">
        <slot/>
    </Link>
</template>

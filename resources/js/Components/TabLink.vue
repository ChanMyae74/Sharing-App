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
        ? 'inline-block p-3 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500'
        : 'inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300 hover:bg-panel-700'
);
</script>

<template>
    <Link :class="classes" :href="href">
        <slot/>
    </Link>
</template>

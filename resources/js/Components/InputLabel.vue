<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="block font-thin text-xs text-gray-200">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

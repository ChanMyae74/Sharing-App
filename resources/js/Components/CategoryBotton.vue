<template>
    <a v-for="c in category"
       :class="classes"
       :href="'/?category='+c.slug"
       class="text-white/70 duration-300 border border-sky-500 text-xs font-medium px-2.5 py-0.5 rounded">
        {{ c.name }}
    </a>
</template>

<script setup>
defineProps({
    category: {},
    classes: ""
});
</script>

<style scoped>

</style>

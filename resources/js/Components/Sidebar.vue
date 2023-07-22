<template>
    <!-- Sidebar starts -->
    <nav class="w-1/6 space-y-2 p-2 mr-2 rounded">
        <slot />
    </nav>
    <!-- Sidebar ends -->
</template>

<script>
export default {
    name: 'Sidebar.vue',
};
</script>

<style scoped></style>

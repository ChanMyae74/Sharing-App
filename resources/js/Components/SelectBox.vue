<template>
    <select class="py-1 px-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm mt-1 block w-full" name="" id="">
        <option v-for="lp in loop_array" :value="lp.uuid">{{ lp.name }}</option>
    </select>
</template>

<script setup>
const props = defineProps({
    loop_array: {},
    name: "SelectBox"
})
</script>

<style scoped>

</style>

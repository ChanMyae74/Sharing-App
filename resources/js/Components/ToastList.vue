<template>
    <div v-if="$page.props.flash.message" class="fixed text-center bottom-5 py-3 px-5 rounded-md right-3 bg-sky-700 text-sm text-white"
         x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000 )"
         x-show="show">
        <p class="inline-flex items-center">
            <svg aria-hidden="true"
                 class="w-4 h-4 rounded-full text-sky-400 border border-sky-400 mr-2"
                 fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    clip-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    fill-rule="evenodd"></path>
            </svg>
            {{ $page.props.flash.message }}
        </p>
    </div>
    <div v-else-if="$page.props.flash.error" class="fixed text-center bottom-5 py-3 px-5 rounded-md right-3 bg-red-700 text-sm text-white"
         x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000 )"
         x-show="show">
        <p class="inline-flex items-center">
            <svg class="bi bi-x mr-2 rounded-full border border-white" fill="currentColor" height="16" viewBox="0 0 16 16" width="16"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
            {{ $page.props.flash.error }}
        </p>
    </div>
</template>

<script>
export default {}
</script>

<style lang="scss" scoped>

</style>

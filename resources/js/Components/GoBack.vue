<template>
    <button @click.prevent="back"
       class="font-semibold normal-case rounded-lg">
        <svg height="22" viewBox="0 0 22 22" width="22">
            <g fill="none" fill-rule="evenodd">
                <path d="M21 1v20.16H.84V1z" stroke="#000" stroke-opacity=".012"
                      stroke-width=".5">
                </path>
                <path class="fill-current"
                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                </path>
            </g>
        </svg>
    </button>
</template>

<script setup>
function back() {
    window.history.back();
}
</script>

<style lang="scss" scoped>

</style>

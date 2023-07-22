<template>
    <div class="flex flex-wrap justify-center gap-x-2">
        <a
            v-for="link in links"
            :class="{
                'leading-4 flex h-8 items-center justify-center rounded-xl border px-3 py-2 text-2xs font-semibold text-blue-400 bg-blue/7 border-blue/75':
                    link.active,
                'leading-4 flex h-8 items-center justify-center rounded-xl px-3 py-2 text-xs font-semibold text-white bg-blue/7 hover:border-blue-400 focus:text-blue':
                    link,
            }"
            :href="link.url"
        >
            <span v-html="link.label"></span>
        </a>
    </div>
</template>

<script>
export default {
    name: 'MasterPagination',
    props: {
        links: Array,
    },
};
</script>

<style>
a {
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s, border 0.3s;
}
</style>

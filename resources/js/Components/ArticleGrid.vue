<template>
    <ArticleFeaturedCard v-if="articles.length" :article="articles[0]" />
    <div class="grid gap-6 grid-cols-2">
        <article-card
            v-for="article in arts"
            v-if="arts"
            :article="article"
            class="group relative col-span-1"
        />
    </div>
    <div class="lg:grid lg:grid-cols-2">
        <article-card
            v-for="article in arts"
            v-if="arts"
            :article="article"
            class="group relative col-span-1"
        />
    </div>
</template>

<script setup>
import ArticleCard from '@/Components/ArticleCard.vue';
import ArticleFeaturedCard from '@/Components/ArticleFeaturedCard.vue';

const props = defineProps({
    articles: [],
});

const arts = [...props.articles];
arts.shift();
// const art = [...arts]
// art.shift()
</script>

<style scoped></style>

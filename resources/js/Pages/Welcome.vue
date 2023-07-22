<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { onMounted, ref } from 'vue';
import ArticleCard from '@/Components/ArticleCard.vue';
import ArticleFeaturedCard from '@/Components/ArticleFeaturedCard.vue';
import { useInfiniteScroll } from '@/Composables/useInfiniteScroll';

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    articles: {
        type: Object,
        required: true,
    },
    navStatus: {
        type: Boolean,
    },
});

const { article, loadMoreItems } = useInfiniteScroll('articles');

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                loadMoreItems();
            }
        });
    },
    {
        rootMargin: '0px 0px 200px 0px',
    }
);

console.log(article);

const article_mark = ref(null);

onMounted(() => {
    observer.observe(article_mark.value);
});
</script>

<template>
    <Head title="Home" />
    <GuestLayout :can-login="canLogin" :can-register="canRegister">
        <template #header></template>
        <div class="rounded-xl px-3 py-2 text-sm border border-[#223c68]">
            <main class="mx-auto space-y-6">
                <ArticleFeaturedCard
                    v-if="article.length"
                    :article="article[0]"
                />
                <div class="grid gap-6 grid-cols-3">
                    <article-card
                        v-for="article in [article].shift()"
                        :article="article"
                        class="group relative col-span-1"
                    />
                </div>
            </main>
        </div>
        <div ref="article_mark" class="h-2"></div>
    </GuestLayout>
</template>

<style></style>

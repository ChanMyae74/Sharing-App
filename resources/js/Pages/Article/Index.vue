<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SidebarLink from '@/Components/SidebarLink.vue';
import MasterATab from '@/Components/MasterATab.vue';
import { Breadcrumb, BreadcrumbItem } from 'view-ui-plus';
import ArticleCard from '@/Components/ArticleCard.vue';
import ArticleFeaturedCard from '@/Components/ArticleFeaturedCard.vue';
import { onMounted, ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useInfiniteScroll } from '@/Composables/useInfiniteScroll';

const props = defineProps({
    articles: [],
    comment_count: [],
    filters: Object,
});
const search = ref(props.filters.search);

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

watch(search, (value) => {
    Inertia.get(
        '/session/articles/my_articles/',
        {
            search: value,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
});

const article_mark = ref(null);

onMounted(() => {
    observer.observe(article_mark.value);
});
</script>

<template>
    <Head title="My Articles" />
    <AuthenticatedLayout :classes="'max-w-screen-xl'" :nav-status="true">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-200 leading-tight mb-8">
                Articles Settings
            </h1>
            <Breadcrumb>
                <BreadcrumbItem :to="route('session.dashboard')">
                    <span
                        class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300"
                    >
                        Dashboard
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem :to="route('article.lists')">
                    <span
                        class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300"
                    >
                        Articles
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem>
                    <span class="text-gray-50 dark:text-white/75 duration-300">
                        My Article
                    </span>
                </BreadcrumbItem>
            </Breadcrumb>
        </template>
        <div
            class="flex mb-2 bg-blue/7 p-2 rounded items-center justify-between"
        >
            <div class="">
                <MasterATab :href="route('article.create')">
                    Add Article
                </MasterATab>
            </div>
            <div class="">
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input
                        v-model="search"
                        class="border border-gray-800 bg-transparent h-8 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        name="search_keyword"
                        placeholder="Search Articles"
                        type="search"
                    />
                    <button
                        class="absolute right-0 top-0 mt-4 mr-4"
                        type="submit"
                    >
                        <svg
                            id="Capa_1"
                            class="text-gray-600 h-4 w-4 fill-current"
                            height="512px"
                            style="enable-background: new 0 0 56.966 56.966"
                            version="1.1"
                            viewBox="0 0 56.966 56.966"
                            width="512px"
                            x="0px"
                            xml:space="preserve"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            y="0px"
                        >
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <template #sidebar>
            <SidebarLink
                :active="route().current('article.index')"
                :href="route('article.index')"
                class="font-bold"
            >
                <svg
                    class="bi bi-postcard mr-4 text-gray-400"
                    fill="currentColor"
                    height="16"
                    viewBox="0 0 16 16"
                    width="16"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"
                        fill-rule="evenodd"
                    />
                </svg>
                My Articles
            </SidebarLink>
            <SidebarLink
                :active="route().current('article.create')"
                :href="route('article.lists')"
                class="font-bold"
            >
                <svg
                    class="bi bi-postcard mr-4 text-gray-400"
                    fill="currentColor"
                    height="16"
                    viewBox="0 0 16 16"
                    width="16"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"
                        fill-rule="evenodd"
                    />
                </svg>
                My Articles List
            </SidebarLink>
            <SidebarLink
                :active="route().current('article.create')"
                :href="route('article.create')"
                class="font-bold"
            >
                <svg
                    class="bi bi-postcard mr-4 text-gray-400"
                    fill="currentColor"
                    height="16"
                    viewBox="0 0 16 16"
                    width="16"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"
                        fill-rule="evenodd"
                    />
                </svg>
                Articles Create
            </SidebarLink>
        </template>
        <div class="rounded bg-blue/7 px-3 py-2 text-sm">
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
    </AuthenticatedLayout>
</template>

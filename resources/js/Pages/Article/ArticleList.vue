<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import SidebarLink from '@/Components/SidebarLink.vue';
import MasterTable from '@/Components/MasterTable.vue';
import { Breadcrumb, BreadcrumbItem } from 'view-ui-plus';
import CategoryBotton from '@/Components/CategoryBotton.vue';
import MasterPagination from '@/Components/MasterPagination.vue';

defineProps({
    articles: Object,
});
const ths = [
    '',
    'ID',
    'Title',
    'Slug',
    'Description',
    'Status',
    'When',
    'Upload By',
    'Control',
];
</script>

<template>
    <Head title="Articles List" />
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
                <BreadcrumbItem :to="route('article.index')">
                    <span
                        class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300"
                    >
                        Articles
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem>
                    <span class="text-gray-50 dark:text-white/75 duration-300">
                        Article Lists
                    </span>
                </BreadcrumbItem>
            </Breadcrumb>
        </template>
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
                :active="route().current('article.lists')"
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
        <div class="rounded text-sm border border-gray-800">
            <main class="mx-auto space-y-6">
                <MasterTable :table_head="ths">
                    <tr
                        v-for="article in articles.data"
                        :key="article.id"
                        class="items-center divide-y divide-gray-700 h-36"
                    >
                        <td class="items-center"></td>
                        <td class="p-5 h-5">
                            <span class="items-center">
                                {{ article.id }}
                            </span>
                        </td>
                        <td class="items-center">
                            <span class="text-xs">{{ article.title }}</span>
                            <br />
                            <div class="space-x-2">
                                <CategoryBotton
                                    :category="article.category"
                                ></CategoryBotton>
                            </div>
                        </td>
                        <td class="items-center">{{ article.slug }}</td>
                        <td class="w-52" v-html="article.excerpt"></td>
                        <td
                            class="text-center"
                            v-html="article.is_public ? 'Publish' : 'Private'"
                        ></td>
                        <td class="w-32">
                            <Time :interval="1" :time="article.created_at" />
                        </td>
                        <td class="items-center">
                            {{ article.author.username }}
                        </td>
                        <td class="text-center">
                            <Link
                                :href="route('article.edit', article)"
                                class="inline-block"
                            >
                                <svg
                                    class="bi bi-pencil-square text-gray-400 hover:text-sky-500 duration-300"
                                    fill="currentColor"
                                    height="16"
                                    viewBox="0 0 16 16"
                                    width="16"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                    />
                                    <path
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                        fill-rule="evenodd"
                                    />
                                </svg>
                            </Link>
                                                        <Link
                                                            :href="route('article.destroy', article)"
                                                            class="inline-block"
                                                            method="delete"
                                                            type="button"
                                                        >
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                width="16"
                                                                height="16"
                                                                fill="currentColor"
                                                                class="bi bi-trash"
                                                                viewBox="0 0 16 16"
                                                            >
                                                                <path
                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"
                                                                />
                                                                <path
                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"
                                                                />
                                                            </svg>
                                                        </Link>
                        </td>
                    </tr>
                </MasterTable>
            </main>
        </div>
        <div
            v-if="articles.next_page_url || articles.prev_page_url"
            class="mt-3 bg-panel-800 px-4 rounded-xl py-3"
        >
            <MasterPagination :links="articles.links"></MasterPagination>
        </div>
    </AuthenticatedLayout>
</template>

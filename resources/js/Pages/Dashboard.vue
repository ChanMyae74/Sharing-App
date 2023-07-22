<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import Sidebar from '@/Components/Sidebar.vue'
import SidebarLink from "@/Components/SidebarLink.vue";
import CardStats from "@/Components/CardStats.vue";
import {Breadcrumb, BreadcrumbItem} from "view-ui-plus";

const props = defineProps({
    article_count: [],
    category_count: [],
    user_count: []
})
</script>

<template>
    <Head title="Dashboard"/>
    <AuthenticatedLayout :nav-status="true" :classes="'max-w-screen-xl'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight mb-8">Dashboard</h2>
            <Breadcrumb>
                <BreadcrumbItem :to="route('session.dashboard')">
                    <span class="text-gray-200 hover:text-sky-500 duration-300">
                    Dashboard
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem>
                    <span class="text-gray-200 hover:text-sky-500 duration-300">
                    Settings
                    </span>
                </BreadcrumbItem>
            </Breadcrumb>
        </template>
        <template #sidebar>
                <SidebarLink class="font-bold" :href="route('session.dashboard')" :active="route().current('session.dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="mr-4 h-4 w-4 text-gray-400 bi bi-sliders2-vertical" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M0 10.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1H3V1.5a.5.5 0 0 0-1 0V10H.5a.5.5 0 0 0-.5.5ZM2.5 12a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 1 0v-2a.5.5 0 0 0-.5-.5Zm3-6.5A.5.5 0 0 0 6 6h1.5v8.5a.5.5 0 0 0 1 0V6H10a.5.5 0 0 0 0-1H6a.5.5 0 0 0-.5.5ZM8 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 1 0v-2A.5.5 0 0 0 8 1Zm3 9.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1H14V1.5a.5.5 0 0 0-1 0V10h-1.5a.5.5 0 0 0-.5.5Zm2.5 1.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 1 0v-2a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                    Settings
                </SidebarLink>
        </template>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm border border-gray-800">
            <div class="flex flex-wrap">
                <div class="w-3/12 px-2">
                    <CardStats statSubtitle="Category" :statTitle="category_count" :stat-percent="category_count">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             class="h-10 w-10 text-sky-700">
                            <path fill-rule="evenodd"
                                  d="M20.59 3.29l.12.12a1.05 1.05 0 0 1 .29.71v7.95a2 2 0 0 1-.59 1.42l-7.22 7.22a1 1 0 0 1-1.41 0l-8.49-8.49a1 1 0 0 1 0-1.41l7.22-7.22A2 2 0 0 1 11.93 3h7.95a1.05 1.05 0 0 1 .71.29zM14 8a2 2 0 0 0 3.414 1.414A2 2 0 0 0 16 6a2 2 0 0 0-2 2z"
                                  fill="currentColor"></path>
                        </svg>
                    </CardStats>
                </div>
                <div class="w-3/12 px-2">
                    <CardStats statSubtitle="Article" :stat-title="article_count" :stat-percent="article_count">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             class="w-10 h-10 bi bi-postcard text-sky-700" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                        </svg>
                    </CardStats>
                </div>
                <div class="w-3/12 px-2">
                    <CardStats statSubtitle="Friend" :stat-title="user_count" :stat-percent="user_count">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                             class="w-10 h-10 bi bi-people-fill text-sky-700" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>
                    </CardStats>
                </div>
                <div class="w-3/12 px-2">
                    <CardStats statSubtitle="Tags"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

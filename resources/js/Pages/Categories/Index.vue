<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from '@inertiajs/vue3';
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import MasterTable from "@/Components/MasterTable.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import moment from "moment-timezone";
import {initFlowbite} from "flowbite";
import {onMounted} from "vue";
import DangerButton from "@/Components/DangerButton.vue";
import MasterPagination from "@/Components/MasterPagination.vue";
import {Breadcrumb, BreadcrumbItem} from "view-ui-plus";
import {Inertia} from "@inertiajs/inertia";

export default {
    components: {
        BreadcrumbItem, Breadcrumb,
        MasterPagination,
        AuthenticatedLayout,
        Head,
        SidebarLink,
        Sidebar,
        MasterTable,
        PrimaryButton,
        InputError,
        InputLabel,
        TextInput,
        DangerButton, moment
    },
    props: {
        categories: {
            type: Object,
            default: () => ({}),
        },
        filters: Object
    },
    data: function () {
        return {
            keyword: '',
            number: 0,
            editMode: false,
            isOpen: false,
            ths: [
                '',
                'ID',
                'Name',
                'Slug',
                'Upload By',
                'Control'
            ],
            form: useForm({
                category: '',
            })
        }
    },
    methods: {
        edit(category) {
            this.form.get(route('category.edit', category))
        },
        submit() {
            this.form.post(route('category.store'), {
                onSuccess: () => this.form.reset(),
                preserveScroll: true
            });
        },
        search(value) {
            Inertia.get('/session/categories', {category: value}, {
                queryStringArrayFormat: {},
                preserveState: true,
                replace: true
            });

        }
    },
    watch: {
        search(newQuestion, value) {
            if (newQuestion.includes('?')) {
                this.getAnswer()
            }
        }
    }
}
onMounted(() => {
    initFlowbite();
})

</script>

<template>
    <Head title="Categories"/>
    <AuthenticatedLayout :classes="'max-w-screen-xl'" :nav-status="true">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-200 leading-tight mb-8">Categories Settings</h1>
            <Breadcrumb>
                <BreadcrumbItem :to="route('session.dashboard')">
                    <span class="text-gray-200 hover:text-sky-500 duration-300">
                    Dashboard
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem :to="route('session.dashboard')">
                    <span class="text-gray-200 hover:text-sky-500 duration-300">
                    Categories
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem>
                    <span class="text-gray-200 hover:text-sky-500 duration-300">
                        My Categories
                    </span>
                </BreadcrumbItem>
            </Breadcrumb>
        </template>
        <template #sidebar>
            <SidebarLink :active="route().current('category.index')" :href="route('category.index')" class="font-bold">
                <svg class="bi bi-bezier2 mr-4 text-gray-400" fill="currentColor" height="16" viewBox="0 0 16 16"
                     width="16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"
                        fill-rule="evenodd"/>
                </svg>
                My Categories
            </SidebarLink>
            <SidebarLink :active="route().current('tag.index')" :href="route('tag.index')" class="font-bold">
                <svg class="h-4 w-4 mr-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.59 3.29l.12.12a1.05 1.05 0 0 1 .29.71v7.95a2 2 0 0 1-.59 1.42l-7.22 7.22a1 1 0 0 1-1.41 0l-8.49-8.49a1 1 0 0 1 0-1.41l7.22-7.22A2 2 0 0 1 11.93 3h7.95a1.05 1.05 0 0 1 .71.29zM14 8a2 2 0 0 0 3.414 1.414A2 2 0 0 0 16 6a2 2 0 0 0-2 2z"
                        fill="currentColor"
                        fill-rule="evenodd">
                    </path>
                </svg>
                My Tags
            </SidebarLink>
        </template>
        <div class="rounded-lg px-3 py-2 text-sm border border-gray-800">
            <form class="mb-3" @submit.prevent="submit">
                <div class="mt-4 pl-2">
                    <InputLabel for="category" value="Category Name"/>
                    <div class="mt-1">
                        <div class="my-2">
                            <TextInput id="category" v-model="form.category" autocomplete="category"
                                       class="mt-1 block w-full"
                                       type="text"/>
                            <InputError class="mt-2"/>
                        </div>
                        <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Add Category
                        </primary-button>
                    </div>
                </div>
            </form>
            <div class="text-end mb-3">
                <label class="sr-only" for="category-search">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <form @submit.prevent="search(keyword)">
                        <input id="category-search"
                               v-model="keyword"
                               class="block p-1 pl-10 text-sm border rounded-lg w-80 bg-transparent focus:border-sky-500 border-sky-600 placeholder-gray-400 focus:ring-sky-500"
                               placeholder="Search for category"
                               type="text">
                    </form>
                    <div class="absolute inset-y-0 left-72 flex items-center pr-3">
                        <a href="#" v-on:click.prevent="route('category.index')">
                            <svg class="bi bi-x" fill="currentColor" height="16" viewBox="0 0 16 16"
                                 width="16" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <MasterTable :filter="filters" :table_head="ths">
                <tr v-for="category in categories.data" :key="category.id"
                    class="items-center divide-y divide-gray-700">
                    <td class="items-center"></td>
                    <td class="p-5 h-5">
                        <span class="items-center">
                            {{ number }}
                        </span>
                    </td>
                    <td class="items-center">{{ category.name }}</td>
                    <td class="items-center">{{ category.slug }}</td>
                    <td class="w-32">
                        <Time :interval="1" :time="category.created_at"/>
                    </td>
                    <td class="items-center">{{ category.user.username }}</td>
                    <td class="items-center space-x-2">
                        <a :href="route('category.edit', category)"
                           class="inline-block text-white rounded-lg text-sm text-center">
                            <svg class="bi bi-pencil-square text-gray-400 hover:text-sky-500 duration-300"
                                 fill="currentColor" height="16" viewBox="0 0 16 16"
                                 width="16"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                    fill-rule="evenodd"/>
                            </svg>
                        </a>

                        <button :data-modal-target="category.uuid" :data-modal-toggle="category.uuid"
                                class="inline-block text-white rounded-lg text-sm text-center" type="button">
                            <svg class="bi bi-trash hover:text-red-600 duration-300" fill="currentColor" height="16"
                                 viewBox="0 0 16 16"
                                 width="16" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        </button>
                        <div :id="category.uuid" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
                             tabindex="-1">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold">
                                            Category Destroy
                                        </h3>
                                        <button :data-modal-hide="category.uuid"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                type="button">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                 viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path clip-rule="evenodd"
                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                      fill-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            Do you really want to destroy this category?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <form class="inline-block"
                                              @submit.prevent="form.delete(route('category.destroy', category))">
                                            <danger-button :data-modal-hide="category.uuid" class="bg-red-800">
                                                Destroy
                                            </danger-button>
                                        </form>
                                        <primary-button :data-modal-hide="category.uuid">
                                            Close
                                        </primary-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </MasterTable>
        </div>
        <div v-if="categories.next_page_url || categories.prev_page_url" class="mt-3 bg-panel-800 px-4 rounded-xl py-3">
            <MasterPagination :links="categories.links"></MasterPagination>
        </div>
    </AuthenticatedLayout>
</template>

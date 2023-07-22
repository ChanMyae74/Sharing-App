<script setup>
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


const props = defineProps({
    tags: [],
})

const form = useForm({
    tag: '',
})
onMounted(() => {
    initFlowbite();
})
const submit = () => {
    form.post(route('tag.store'), {
        onSuccess: () => form.reset(),
        preserveScroll: true
    });
};

const ths = [
    '',
    'ID',
    'Name',
    'Slug',
    'When',
    'Upload By',
    'Control'
]

</script>

<template>
    <Head title="Tags"/>
    <AuthenticatedLayout :nav-status="true" :classes="'max-w-screen-xl'">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-200 leading-tight mb-8">Tags Settings</h1>
            <Breadcrumb>
                <BreadcrumbItem :to="route('session.dashboard')">
                    <span class="text-gray-200 hover:text-sky-500 duration-300">
                    Dashboard
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem :to="route('tag.index')">
                    <span class="text-gray-200 hover:text-sky-500 duration-300">
                    Tags
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem>
                    <span class="text-gray-200 hover:text-sky-500 duration-300">
                        My Tags
                    </span>
                </BreadcrumbItem>
            </Breadcrumb>
        </template>
        <template #sidebar>
            <SidebarLink :active="route().current('category.index')" :href="route('category.index')" class="font-bold">
                <svg class="bi bi-bezier2 mr-4 text-gray-400" fill="currentColor" height="16" viewBox="0 0 16 16"
                     width="16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"
                          fill-rule="evenodd"/>
                </svg>
                My Categories
            </SidebarLink>
            <SidebarLink :active="route().current('tag.index')" :href="route('tag.index')" class="font-bold">
                <svg class="h-4 w-4 mr-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.59 3.29l.12.12a1.05 1.05 0 0 1 .29.71v7.95a2 2 0 0 1-.59 1.42l-7.22 7.22a1 1 0 0 1-1.41 0l-8.49-8.49a1 1 0 0 1 0-1.41l7.22-7.22A2 2 0 0 1 11.93 3h7.95a1.05 1.05 0 0 1 .71.29zM14 8a2 2 0 0 0 3.414 1.414A2 2 0 0 0 16 6a2 2 0 0 0-2 2z"
                          fill="currentColor"
                          fill-rule="evenodd">
                    </path>
                </svg>
                My Tags
            </SidebarLink>
        </template>
        <div class="rounded-lg px-3 py-2 text-sm border border-gray-800">
            <form class="mb-3" method="post" @submit.prevent="submit">
                <div class="mt-4 pl-2">
                    <InputLabel for="tag" value="Tag Name"/>
                    <div class="mt-1">
                        <div class="my-2">
                            <TextInput id="tag" v-model="form.tag" autocomplete="tag" class="mt-1 block w-full"
                                       type="text"/>
                            <InputError class="mt-2"/>
                        </div>
                        <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Add Tag
                        </primary-button>
                    </div>
                </div>
            </form>
            <MasterTable :table_head="ths">
                <tr v-for="tag in tags.data" :key="tag.id" class="h-12 divide-y divide-gray-700">
                    <td class="items-center"></td>
                    <td class="p-5 h-5">{{ tag.id }}</td>
                    <td class="items-center">{{ tag.name }}</td>
                    <td class="items-center">{{ tag.slug }}</td>
                    <td class="w-32">{{ moment(tag.created_at).format("DD-MM-YYYY") }}</td>
                    <td class="items-center">{{ tag.user.username }}</td>
                    <td class="items-center space-x-2">
                        <a :href="route('tag.edit', tag)" class="inline-block text-white rounded-lg text-sm text-center"
                           type="button">
                            <svg class="bi bi-pencil-square text-gray-400 hover:text-sky-500 duration-300" fill="currentColor" height="16" viewBox="0 0 16 16"
                                 width="16"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                      fill-rule="evenodd"/>
                            </svg>
                        </a>
                        <button :data-modal-target="tag.uuid" :data-modal-toggle="tag.uuid"
                                class="inline-block text-white rounded-lg text-sm text-center" type="button">
                            <svg class="bi bi-trash hover:text-red-600 duration-300" fill="currentColor" height="16" viewBox="0 0 16 16"
                                 width="16" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        </button>


                        <div :id="tag.uuid" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
                             tabindex="-1">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold">
                                            Tag Destroy
                                        </h3>
                                        <button :data-modal-hide="tag.uuid"
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
                                            Do you really want to destroy this tag?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <form class="inline-block" @submit="form.delete(route('tag.destroy', tag))">
                                            <danger-button class="bg-red-800">
                                                Destroy
                                            </danger-button>
                                        </form>
                                        <primary-button :data-modal-hide="tag.uuid">
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
        <div v-if="tags.next_page_url || tags.prev_page_url" class="mt-3 bg-panel-800 px-4 rounded-xl py-3">
            <MasterPagination :links="tags.links"></MasterPagination>
        </div>
    </AuthenticatedLayout>
</template>

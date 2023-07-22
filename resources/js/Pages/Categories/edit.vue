<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, router, useForm} from '@inertiajs/vue3';
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
    categories: [],
    category: {}
})
const ths = [
    '',
    'ID',
    'Name',
    'Slug',
    'Upload By',
]
onMounted(() => {
    initFlowbite();
})

const form =useForm({
    category: props.category.name
})

const submit = (category) => {
    form.put(route('category.update',category), {
        onSuccess: () => form.reset(),
        preserveScroll: true
    });
};

</script>

<template>
    <Head title="Categories"/>
    <AuthenticatedLayout :nav-status="true" :classes="'max-w-screen-xl'">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-8">Categories Settings</h1>
        </template>
        <template #sidebar>
                <SidebarLink class="font-bold" :href="route('category.index')"
                             :active="route().current('category.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                    </svg>
                    My Categories
                </SidebarLink>
        </template>
        <div class="rounded-lg px-3 py-2 text-sm dark:bg-gray-800 bg-white">
            <form @submit.prevent="submit(category)" method="post" class="mb-3">
                <div class="mt-4 pl-2">
                    <InputLabel for="category" value="Category Name"/>
                    <div class="mt-1">
                        <div class="my-2">
                            <TextInput
                                id="category"
                                v-model="form.category"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="category"
                            />
                            <InputError class="mt-2"/>
                        </div>
                        <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update Category
                        </primary-button>
                    </div>
                </div>
            </form>
            <MasterTable
                :table_head="ths">
                <tr v-for="category in categories.data" :key="category.id"
                    class="items-center divide-y divide-gray-100 dark:divide-gray-700">
                    <td class="items-center"></td>
                    <td class="p-5 h-5">
                        <span class="items-center">
                            {{ category.id }}
                        </span>
                    </td>
                    <td class="items-center">{{ category.name }}</td>
                    <td class="items-center">{{ category.slug }}</td>
                    <!--                    <td class="w-32">{{ moment(category.created_at).format("DD-MM-YYYY") }}</td>-->
                    <td class="items-center">{{ category.user.username }}</td>
                </tr>
            </MasterTable>
        </div>
        <div class="mt-3 bg-panel-800 px-4 rounded-xl py-3">
            <MasterPagination :links="categories.links"></MasterPagination>
        </div>
    </AuthenticatedLayout>
</template>

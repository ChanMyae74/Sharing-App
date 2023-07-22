<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router, useForm } from '@inertiajs/vue3';
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import MasterTable from "@/Components/MasterTable.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import moment from "moment-timezone";
import { initFlowbite } from "flowbite";
import { onMounted } from "vue";
import DangerButton from "@/Components/DangerButton.vue";
import MasterPagination from "@/Components/MasterPagination.vue";

const props = defineProps({
    tags: [],
    tag: {}
})
const ths = [
    'ID',
    'Name',
    'Slug',
    'Upload By',
]
onMounted(() => {
    initFlowbite();
})

const form = useForm({
    tag: props.tag.name
})

const submit = (tag) => {
    form.put(route('tag.update', tag), {
        onSuccess: () => form.reset(),
        preserveScroll: true
    });
};

</script>

<template>
    <Head title="Tags" />
    <AuthenticatedLayout :nav-status="true" :classes="'max-w-screen-xl'">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-8">Tags Settings</h1>
        </template>
        <template #sidebar>
                <SidebarLink class="font-bold" :href="route('category.index')" :active="route().current('category.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bezier2 mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                    </svg>
                    My Categories
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('tag.index')" :active="route().current('tag.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        class="h-4 w-4 mr-4 text-gray-400">
                        <path fill-rule="evenodd"
                            d="M20.59 3.29l.12.12a1.05 1.05 0 0 1 .29.71v7.95a2 2 0 0 1-.59 1.42l-7.22 7.22a1 1 0 0 1-1.41 0l-8.49-8.49a1 1 0 0 1 0-1.41l7.22-7.22A2 2 0 0 1 11.93 3h7.95a1.05 1.05 0 0 1 .71.29zM14 8a2 2 0 0 0 3.414 1.414A2 2 0 0 0 16 6a2 2 0 0 0-2 2z"
                            fill="currentColor">
                        </path>
                    </svg>
                    My Tags
                </SidebarLink>
        </template>
        <div class="rounded-lg px-3 py-2 text-sm dark:bg-gray-800 bg-white">
            <form @submit.prevent="submit(tag)" method="post">
                <div class="mt-4 pl-2">
                    <InputLabel for="tag" value="Tag Name" />
                    <div class="mt-1">
                        <div class="my-2">
                            <TextInput id="tag" v-model="form.tag" type="text" class="mt-1 block w-full"
                                autocomplete="tag" />
                            <InputError class="mt-2" />
                        </div>
                        <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update Tag
                        </primary-button>
                    </div>
                </div>
            </form>
            <MasterTable :table_head="ths">
                <tr v-for="tag in tags.data" :key="tag.id" class="h-12 divide-y divide-gray-100 dark:divide-gray-700">
                    <td>{{ tag.id }}</td>
                    <td>{{ tag.name }}</td>
                    <td>{{ tag.slug }}</td>
                    <!--                    <td class="w-32">{{ moment(tag.created_at).format("DD-MM-YYYY") }}</td>-->
                    <td>{{ tag.user.username }}</td>
                </tr>
            </MasterTable>
        </div>
        <div class="mt-3 bg-panel-800 px-4 rounded-xl py-3">
            <MasterPagination :links="tags.links"></MasterPagination>
        </div>
    </AuthenticatedLayout>
</template>

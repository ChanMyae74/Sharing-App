<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import SidebarLink from '@/Components/SidebarLink.vue';
import Sidebar from '@/Components/Sidebar.vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Authentication" />
    <AuthenticatedLayout :nav-status="true" :classes="'max-w-screen-xl'">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-200 leading-tight mb-8">
                Account Settings
            </h1>
        </template>
        <template #sidebar>
            <SidebarLink
                :active="
                    route().current(
                        'profile.information',
                        $page.props.auth.user
                    )
                "
                :href="route('profile.information', $page.props.auth.user)"
                class="font-bold"
            >
                <svg
                    class="bi bi-person text-gray-400 mr-3"
                    fill="currentColor"
                    height="16"
                    viewBox="0 0 16 16"
                    width="16"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"
                    />
                </svg>
                Profile
            </SidebarLink>
            <SidebarLink
                :active="route().current('profile.edit', $page.props.auth.user)"
                :href="route('profile.edit', $page.props.auth.user)"
                class="font-bold"
            >
                <svg
                    class="mr-3 h-4 w-4 text-gray-400"
                    fill="none"
                    height="16"
                    stroke="currentColor"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    width="16"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    ></path>
                </svg>
                Authentication
            </SidebarLink>
            <SidebarLink
                :active="route().current('user.trash', $page.props.auth.user)"
                :href="route('user.trash', $page.props.auth.user)"
                class="font-bold"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-recycle text-gray-400 mr-3"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"
                    />
                </svg>
                Trash
            </SidebarLink>
        </template>
        <div class="rounded-xl px-3 py-2 text-sm border border-gray-800">
            <div class="rounded-lg px-6 py-4 text-sm">
                <UpdateProfileInformationForm
                    :must-verify-email="mustVerifyEmail"
                    :status="status"
                />
            </div>
            <div class="rounded-lg px-6 py-4 text-sm">
                <UpdatePasswordForm />
            </div>

            <div class="rounded-lg px-6 py-4 text-sm">
                <DeleteUserForm />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

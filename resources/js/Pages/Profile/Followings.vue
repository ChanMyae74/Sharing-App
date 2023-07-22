<template>
    <Head :title="$page.props.auth.user.username" />
    <AuthenticatedLayout :classes="'max-w-screen-xl'" :nav-status="true">
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
        <div class="">
            <div
                class="w-full profile-dark border border-[#223c68] rounded"
                style="height: 815"
            >
                <div class="h-96 overflow-hidden relative p-3">
                    <div class="">
                        <a
                            :href="
                                '/storage/ProfileAttachment/' +
                                $page.props.auth.user.profile_cover
                            "
                            target="_blank"
                        >
                            <img
                                v-if="$page.props.auth.user.profile_cover"
                                :src="
                                    '/storage/ProfileAttachment/' +
                                    $page.props.auth.user.profile_cover
                                "
                                alt=""
                                class="lazy h-full w-full cursor-pointer object-cover lazyloaded rounded duration-300 ease-in-out hover:opacity-100 opacity-90 transition"
                                loading="lazy"
                                style="height: 384px"
                            />
                            <img
                                v-else
                                alt=""
                                class="lazy h-full w-full cursor-pointer object-cover lazyloaded rounded duration-300 ease-in-out hover:opacity-100 opacity-90 transition"
                                loading="lazy"
                                src="/Images/Icon/SHARING.svg"
                                style="height: 384px"
                            />
                        </a>
                    </div>
                    <button
                        class="rounded-lg border-2 bg-white/50 hover:bg-white duration-300 transition-colors text-black p-1 absolute right-6 bottom-3"
                        type="button"
                        @click.prevent="goCover()"
                    >
                        <div
                            class="flex space-x-1 font-extrabold items-center mb-1"
                        >
                            <svg
                                class="bi bi-camera-fill"
                                fill="currentColor"
                                height="16"
                                viewBox="0 0 16 16"
                                width="16"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"
                                />
                                <path
                                    d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"
                                />
                            </svg>
                            <span class="font-extrabold">
                                Edit Cover Photo
                            </span>
                        </div>
                    </button>
                </div>
                <div class="flex space-x-2">
                    <div class="flex p-3 items-center gap-5 relative pl-7">
                        <div
                            class="ring-4 ring-[#3e4042] w-38 h-38 -mt-12 rounded-full"
                            style="padding: 1px"
                        >
                            <img
                                v-if="$page.props.auth.user.photo"
                                id="show"
                                :src="
                                    '/storage/ProfileAttachment/' +
                                    $page.props.auth.user.photo
                                "
                                alt=""
                                class="w-32 h-32 cursor-pointer rounded-full object-cover duration-300 ease-in-out hover:opacity-100 opacity-90 transition ring-4 ring-[#0f8dea]"
                                loading="lazy"
                                @click="goFile()"
                            />
                            <img
                                v-else
                                id="show"
                                alt=""
                                class="w-32 h-32 cursor-pointer rounded-full object-cover duration-300 ease-in-out hover:opacity-100 opacity-90 transition"
                                loading="lazy"
                                src="/Images/Icon/S.svg"
                                @click="goFile()"
                            />
                        </div>
                    </div>
                    <div class="mb-6 mt-3">
                        <div class="">
                            <div class="flex items-center space-x-1">
                                <div class="font-bold text-[30px]">
                                    {{ $page.props.auth.user.username }}
                                </div>
                                <div
                                    v-if="$page.props.auth.user.nickname"
                                    class=""
                                >
                                    ( {{ $page.props.auth.user.nickname }} )
                                </div>
                                <div class="flex">
                                    <div class="flex items-center">
                                        <BlueBadgeIcon />
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="-space-x-3">
                                    <img
                                        :title="$page.props.auth.user.username"
                                        alt="Profile image"
                                        class="relative z-[60] inline object-cover w-8 h-8 border-2 border-[#3e4042] hover:border-gray-500 duration-500 transition rounded-full"
                                        src="/Images/Icon/S.svg"
                                    />
                                    <img
                                        :title="$page.props.auth.user.username"
                                        alt="Profile image"
                                        class="relative z-50 inline object-cover w-8 h-8 border-2 border-[#3e4042] hover:border-gray-500 duration-500 transition rounded-full"
                                        src="/Images/Icon/S.svg"
                                    />
                                    <img
                                        :title="$page.props.auth.user.username"
                                        alt="Profile image"
                                        class="relative z-40 inline object-cover w-8 h-8 border-2 border-[#3e4042] hover:border-gray-500 duration-500 transition rounded-full"
                                        src="/Images/Icon/S.svg"
                                    />
                                    <img
                                        :title="$page.props.auth.user.username"
                                        alt="Profile image"
                                        class="relative z-30 inline object-cover w-8 h-8 border-2 border-[#3e4042] hover:border-gray-500 duration-500 transition rounded-full"
                                        src="/Images/Icon/S.svg"
                                    />
                                    <img
                                        :title="$page.props.auth.user.username"
                                        alt="Profile image"
                                        class="relative z-20 inline object-cover w-8 h-8 border-2 border-[#3e4042] hover:border-gray-500 duration-500 transition rounded-full"
                                        src="/Images/Icon/S.svg"
                                    />
                                    <img
                                        :title="$page.props.auth.user.username"
                                        alt="Profile image"
                                        class="relative z-10 inline object-cover w-8 h-8 border-2 border-[#3e4042] hover:border-gray-500 duration-500 transition rounded-full"
                                        src="/Images/Icon/S.svg"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div
                        class="text-sm font-medium text-center text-gray-500 border-b border-[#223c68] dark:text-gray-400 dark:border-gray-700"
                    >
                        <ul class="flex flex-wrap -mb-px">
                            <li class="mr-2">
                                <TabLink
                                    :active="
                                        route().current(
                                            'profile.information',
                                            $page.props.auth.user
                                        )
                                    "
                                    :href="
                                        route(
                                            'profile.information',
                                            $page.props.auth.user
                                        )
                                    "
                                >
                                    Article
                                </TabLink>
                            </li>
                            <li class="mr-2">
                                <TabLink
                                    :active="
                                        route().current(
                                            'user.index',
                                            $page.props.auth.user
                                        )
                                    "
                                    :href="
                                        route(
                                            'user.index',
                                            $page.props.auth.user
                                        )
                                    "
                                >
                                    Followers
                                </TabLink>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-panel-800 h-72 w-full mt-6"></div>
        </div>
        <!-- Photo Upload Modal -->
        <div
            v-if="showFileUpload"
            class="flex justify-center absolute duration-300 w-full z-[1000]"
        >
            <div class="rounded-lg shadow-xl dark:bg-gray-800 lg:w-1/2">
                <div class="m-4 py-6 px-4 rounded-xl">
                    <label class="inline-block mb-2 text-white"
                        >Upload Image(jpg,png,svg,jpeg)</label
                    >
                    <div class="flex items-center justify-center w-full">
                        <label
                            class="flex flex-col w-full h-32 duration-300 border border-sky-500 hover:border-sky-800 rounded-xl hover:bg-panel-800"
                        >
                            <div
                                class="flex flex-col items-center justify-center pt-7"
                            >
                                {{
                                    this.isProfile
                                        ? 'PROFILE PHOTO'
                                        : 'COVER PHOTO'
                                }}
                                <p
                                    class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600"
                                >
                                    Select a photo
                                </p>
                            </div>
                            <input
                                class="opacity-0"
                                type="file"
                                @change="onChange"
                                @input="
                                    this.isProfile
                                        ? (form.profile_photo =
                                              $event.target.files[0])
                                        : (form.profile_cover =
                                              $event.target.files[0])
                                "
                            />
                        </label>
                    </div>
                </div>
                <div
                    class="flex w-full justify-start px-5 pb-5 space-x-4"
                    data-v-2836fdb5-s=""
                >
                    <div class="" data-v-2836fdb5-s="">
                        <button
                            class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-4 py-2 duration-300"
                            data-v-2836fdb5-s=""
                            @click="closeFile()"
                        >
                            <svg
                                class="bi bi-x-circle mr-1"
                                fill="currentColor"
                                height="13"
                                viewBox="0 0 16 16"
                                width="12"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                                />
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                                />
                            </svg>
                            Cancel
                        </button>
                    </div>
                    <div class="" data-v-2836fdb5-s="">
                        <button
                            class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-4 py-2 duration-300"
                            data-label="$page.props.auth.user.uuid"
                            @click.prevent="
                                this.isProfile
                                    ? upload_profile($page.props.auth.user)
                                    : upload_cover($page.props.auth.user)
                            "
                        >
                            <svg
                                class="bi bi-check2-circle mr-1"
                                fill="currentColor"
                                height="13"
                                viewBox="0 0 16 16"
                                width="12"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"
                                />
                                <path
                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"
                                />
                            </svg>
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Sidebar from '@/Components/Sidebar.vue';
import SidebarLink from '@/Components/SidebarLink.vue';
import { Head, useForm } from '@inertiajs/vue3';
import auth from 'view-ui-plus/src/components/auth';
import BlueBadgeIcon from '@/Components/BlueBadgeIcon.vue';
import NavLink from '@/Components/NavLink.vue';
import TabLink from '@/Components/TabLink.vue';

export default {
    computed: {
        auth() {
            return auth;
        },
    },
    components: {
        TabLink,
        NavLink,
        BlueBadgeIcon,
        AuthenticatedLayout,
        Sidebar,
        SidebarLink,
        Head,
    },
    data() {
        return {
            isProfile: {
                type: Boolean,
            },
            theme: 'dark',
            showFileUpload: false,
            image: null,
            form: new useForm({
                profile_photo: null,
                profile_cover: null,
            }),
        };
    },

    methods: {
        goCover() {
            this.showFileUpload = true;
            this.isProfile = false;
        },
        goFile() {
            this.showFileUpload = true;
            this.isProfile = true;
        },

        closeFile() {
            this.showFileUpload = false;
        },
        onChange(e) {
            console.log('selectFiles', e.target.file[0]);
        },
        upload_profile(param) {
            this.form.post(route('profile.upload_profile', param), {
                onSuccess: () => this.form.reset(),
                preserveScroll: true,
            });
            this.closeFile();
        },
        upload_cover(param) {
            this.form.post(route('profile.upload_cover', param), {
                onSuccess: () => this.form.reset(),
                preserveScroll: true,
            });
            this.closeFile();
        },
    },
};
</script>

<style scoped></style>

<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import ToastList from '@/Components/ToastList.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import Dropdown from '@/Components/Dropdown.vue';
import NavLink from '@/Components/NavLink.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    navStatus: {
        type: Boolean,
    },
    classes: '',
});
</script>

<template>
    <div id="root" class="home-dark">
        <div class="flex-1">
            <div class="fixed inset-0 home-dark"></div>
            <div class="relative rounded-b-[28px]">
                <div class="">
                    <nav
                        v-if="canLogin"
                        class="fixed z-50 w-full min-w-screen-xl py-4 lg:py-3 border-b border-gray-800 bg-[#151f32]"
                        style="height: 60px"
                    >
                        <div
                            class="relative grid w-full max-w-nav grid-cols-8 items-center gap-x-4 px-5"
                        >
                            <div class="flex space-x-2 mr-3 items-center">
                                <Link
                                    :href="route('home')"
                                    class="flex items-center"
                                >
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                                    />
                                </Link>
                            </div>
                            <div
                                class="col-span-4 col-start-3 col-end-7 flex w-full items-center justify-center gap-x-5"
                            >
                                <div
                                    v-if="$page.props.auth"
                                    class="inline-flex"
                                >
                                    <NavLink
                                        :active="route().current('home')"
                                        :href="route('home')"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-6 h-6"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                            />
                                        </svg>
                                        Home
                                    </NavLink>
                                    <NavLink
                                        :active="
                                            route().current('article.index')
                                        "
                                        :href="route('article.index')"
                                    >
                                        <svg
                                            class="bi bi-postcard"
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
                                        Article List
                                    </NavLink>
                                    <NavLink
                                        :active="
                                            route().current('forum.index')
                                        "
                                        :href="route('forum.index')"
                                    >
                                        <svg
                                            class="bi bi-postcard"
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
                                        Forum
                                    </NavLink>
                                    <NavLink
                                        :active="
                                            route().current('category.index')
                                        "
                                        :href="route('category.index')"
                                    >
                                        <svg
                                            class="bi bi-bezier2"
                                            fill="currentColor"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            width="16"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"
                                                fill-rule="evenodd"
                                            />
                                        </svg>
                                        Categories
                                    </NavLink>
                                </div>
                            </div>
                            <div
                                class="relative z-30 col-span-2 flex h-10 w-full flex-grow items-center justify-end justify-self-end"
                            >
                                <Dropdown
                                    v-if="$page.props.auth.user"
                                    align="right"
                                    width="48"
                                >
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                                type="button"
                                            >
                                                <div
                                                    v-if="
                                                        $page.props.auth.user
                                                            .photo
                                                    "
                                                    class="relative inline-block mr-2"
                                                >
                                                    <img
                                                        alt="Profile image"
                                                        class="inline-block object-cover w-10 h-10 rounded-full"
                                                        :src="
                                                            '/storage/ProfileAttachment/' +
                                                            $page.props.auth
                                                                .user.photo
                                                        "
                                                    />
                                                    <span
                                                        class="absolute top-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white/70 rounded-full opacity-90 hover:opacity-100"
                                                    ></span>
                                                </div>
                                                <div
                                                    v-else
                                                    aria-hidden="true"
                                                    class="flex items-center justify-center rounded-full border-2 border-gray-200 bg-blue-50 text-blue-700 dark:border-gray-400 h-[40px] w-[40px] border-none"
                                                    height="30"
                                                    width="30"
                                                >
                                                    <span class="uppercase">
                                                        {{
                                                            $page.props.auth.user.username.split(
                                                                ''
                                                            )[0]
                                                        }}</span
                                                    >
                                                    <span
                                                        :class="
                                                            $page.props.auth
                                                                .user.online
                                                                ? 'absolute top-0 right-0 inline-block w-3 h-3 bg-gray-400 border-2 border-white/70 rounded-full opacity-90 hover:opacity-100'
                                                                : 'absolute top-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white/70 rounded-full opacity-90 hover:opacity-100'
                                                        "
                                                    ></span>
                                                </div>
                                            </button>
                                        </span>
                                    </template>
                                    <template #content>
                                        <DropdownLink
                                            :href="route('session.dashboard')"
                                        >
                                            <svg
                                                class="bi bi-house-gear text-sky-700 mr-3"
                                                fill="currentColor"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                width="16"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"
                                                />
                                                <path
                                                    d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"
                                                />
                                            </svg>
                                            Dashboard
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('article.index')"
                                        >
                                            <svg
                                                class="bi bi-postcard text-sky-700 mr-3"
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
                                            Articles
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('category.index')"
                                        >
                                            <svg
                                                class="h-4 w-4 text-sky-700 mr-3"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M20.59 3.29l.12.12a1.05 1.05 0 0 1 .29.71v7.95a2 2 0 0 1-.59 1.42l-7.22 7.22a1 1 0 0 1-1.41 0l-8.49-8.49a1 1 0 0 1 0-1.41l7.22-7.22A2 2 0 0 1 11.93 3h7.95a1.05 1.05 0 0 1 .71.29zM14 8a2 2 0 0 0 3.414 1.414A2 2 0 0 0 16 6a2 2 0 0 0-2 2z"
                                                    fill="currentColor"
                                                    fill-rule="evenodd"
                                                ></path>
                                            </svg>
                                            Categories
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="
                                                route(
                                                    'profile.information',
                                                    $page.props.auth.user
                                                )
                                            "
                                        >
                                            <svg
                                                class="bi bi-person text-sky-700 mr-3"
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
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('logout')"
                                            as="button"
                                            method="post"
                                        >
                                            <svg
                                                class="bi bi-box-arrow-in-left text-red-600 mr-3"
                                                fill="currentColor"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                width="16"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"
                                                    fill-rule="evenodd"
                                                />
                                                <path
                                                    d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"
                                                    fill-rule="evenodd"
                                                />
                                            </svg>
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                                <template v-else>
                                    <Link
                                        v-if="canLogin"
                                        :href="route('login')"
                                        class="bg-slate-700 bg-panel-800 hover:bg-panel-700 mr-1 duration-300 rounded-xl text-xs font-semibold text-white/50 hover:text-white py-2 px-3"
                                    >
                                        <div
                                            class="flex items-center space-x-2"
                                        >
                                            <svg
                                                class="bi bi-box-arrow-in-right"
                                                fill="currentColor"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                width="16"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"
                                                    fill-rule="evenodd"
                                                />
                                                <path
                                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"
                                                    fill-rule="evenodd"
                                                />
                                            </svg>
                                            <span> Log in </span>
                                            <span
                                                class="block text-[.6rem] font-normal text-white/50"
                                            >
                                                //:login</span
                                            >
                                        </div>
                                    </Link>
                                    <Link
                                        v-if="canRegister"
                                        :href="route('register')"
                                        class="block text-xs bg-panel-800 hover:bg-panel-700 mr-1 sm:md:mr-2 m-0 duration-300 rounded-xl font-semibold text-white/50 hover:text-white py-2 px-3"
                                    >
                                        <div
                                            class="flex items-center space-x-2"
                                        >
                                            <svg
                                                class="bi bi-box-arrow-in-right"
                                                fill="currentColor"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                width="16"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"
                                                    fill-rule="evenodd"
                                                />
                                                <path
                                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"
                                                    fill-rule="evenodd"
                                                />
                                            </svg>
                                            <span> Register </span>
                                            <span
                                                class="block text-[.6rem] font-normal text-white/50"
                                            >
                                                //:register</span
                                            >
                                        </div>
                                    </Link>
                                </template>
                            </div>
                        </div>
                    </nav>
                    <section class="flex min-w-screen-xl justify-center">
                        <ToastList></ToastList>
                        <div
                            class="mb-32 mt-20 w-full max-w-screen-xl px-12 text-gray-400"
                        >
                            <div class="flex">
                                <div class="w-full">
                                    <slot />
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>

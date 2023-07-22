<template>
    <Head />
    <AuthenticatedLayout :classes="'min-w-screen-xl '" :nav-status="ture">
        <main class="min-w-4xl ">
            <div
                class="container mx-auto flex flex-col flex-col-reverse justify-between md:flex-row lg:gap-x-10"
            >
                <div class="">
                    <div class="text-center mb-3">
                        <primary-button
                            aria-controls="drawer-bottom-example"
                            class="p-3"
                            data-drawer-placement="bottom"
                            data-drawer-show="drawer-bottom-example"
                            data-drawer-target="drawer-bottom-example"
                            type="button"
                        >
                            Show bottom drawer
                        </primary-button>
                    </div>

                    <!-- drawer component -->
                    <div
                        id="drawer-bottom-example"
                        aria-labelledby="drawer-bottom-label"
                        class="fixed forum-comment bottom-0 left-0 right-0 z-[100] w-[40%] h-[50%] mx-auto p-4 rounded-lg
                        overflow-y-auto transition-transform bg-panel-700 translate-y-full"
                        tabindex="-1"
                    >

                        <button
                            aria-controls="drawer-bottom-example"
                            class="ml-auto text-2xs px-3 py-1 absolute top-2.5 right-2.5 inline-flex items-center rounded-xl
                             bg-panel-800 hover:bg-gray-800 duration-300"
                            data-drawer-hide="drawer-bottom-example"
                            type="button"
                        >
                            <span class="">close</span>
                        </button>
                        <!--                        <button-->
                        <!--                            aria-controls="drawer-bottom-example"-->
                        <!--                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"-->
                        <!--                            data-drawer-hide="drawer-bottom-example"-->
                        <!--                            type="button"-->
                        <!--                        >-->
                        <!--                            <svg-->
                        <!--                                aria-hidden="true"-->
                        <!--                                class="w-5 h-5"-->
                        <!--                                fill="currentColor"-->
                        <!--                                viewBox="0 0 20 20"-->
                        <!--                                xmlns="http://www.w3.org/2000/svg"-->
                        <!--                            >-->
                        <!--                                <path-->
                        <!--                                    clip-rule="evenodd"-->
                        <!--                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"-->
                        <!--                                    fill-rule="evenodd"-->
                        <!--                                ></path>-->
                        <!--                            </svg>-->
                        <!--                            <span class="sr-only">Close menu</span>-->
                        <!--                        </button>-->
                        <form action="#" class="my-5">
                            <div class="flex mb-3">
                                <div class=" flex w-3/4 flex-col ">

                                    <div class="flex flex-col">
                                        <TextInput
                                            autocomplete="forum_title"
                                            class="block w-full
                                            placeholder:text-2xl placeholder:font-bold border-0
                                            focus:font-bold focus:text-2xl focus:ring-0 focus:border-0"
                                            placeholder="Title"
                                            type="text"
                                        />
                                        <InputError

                                            class="mt-2"
                                        />
                                    </div>
                                </div>


                                <div class="relative mt-4 flex w-1/4 flex-col z-30 col-span-2  flex-grow items-center ">
                                    <Dropdown class="bottom-0">
                                        <template #trigger>

                                            <primary-button class="p-3" type="button"> Something in come
                                                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>

                                            </primary-button>

                                        </template>
                                        <template #content>
                                            <DropdownLink class="w-full">
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




                                        </template>
                                    </Dropdown>
                                </div>

                            </div>

                            <div class="mb-3">
                                <v-md-editor
                                    id="comment"
                                    height="300px"
                                    name="comment"
                                ></v-md-editor>
                            </div>
                            <div>
                                <div> <InputLabel for="" value="Create a PHP variable and make it equal to the string, " /></div>

                                    <div class="mt-1 flex justify-between">
                                        <TextInput
                                            autocomplete=""
                                            class="mt-1 block w-[32rem]"
                                            placeholder="Aa"
                                            type="text"
                                        />
                                        <InputError

                                            class="mt-2"
                                        />
                                        <primary-button class="px-8">POST</primary-button>
                                    </div>

                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </main>
    </AuthenticatedLayout>
</template>

<script>
import { Head } from '@inertiajs/vue3';
import BlueBadgeIcon from '@/Components/BlueBadgeIcon.vue';
import { Button } from 'view-ui-plus';
import moment from 'moment-timezone';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";

export default {
    methods: { moment },
    components: {
        InputError, InputLabel, TextInput,
        PrimaryButton,
        DropdownLink,
        Dropdown,
        AuthenticatedLayout,
        Button,

        BlueBadgeIcon,

        Head,
    },
};
</script>

<style lang="scss" scoped></style>

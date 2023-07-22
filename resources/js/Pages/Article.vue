<!--<template>-->
<!--    <Head :title="article.title"/>-->
<!--    <AuthenticatedLayout :classes="'min-w-screen-xl'" :nav-status="false">-->
<!--        <main class="min-w-4xl mt-6" style="min-width: 1200px;">-->
<!--            <article class="flex gap-x-10 text-white">-->
<!--                <div-->
<!--                    class="mx-auto max-w-[500px] flex-shrink-0 sticky top-[80px] self-start w-[315px]">-->
<!--                    <figure>-->
<!--                        <div v-if="article.article_photo" class="relative overflow-hidden rounded"-->
<!--                             style="width: 100%; height: 445px;">-->
<!--                            <img :src="'/storage/ProfileAttachment/' + article.author.photo" alt="Lary avatar "-->
<!--                                 class="lazy h-full w-full object-cover lazyloaded"-->
<!--                                 loading="lazy"-->
<!--                                 style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">-->
<!--                        </div>-->
<!--                    </figure>-->
<!--                    <figcaption class="mt-4">-->
<!--                        <h5 class="flex items-center gap-x-3 font-poppins font-semibold text-sky-600">-->
<!--                            <span class="h-px w-full bg-sky-600"></span>-->
<!--                            <span class="flex-shrink-0 text-xs">-->
<!--                                 Published-->
<!--                        <time>{{ moment.utc(article.created_at).local().startOf('seconds').fromNow() }}</time>-->
<!--                            </span>-->
<!--                            <span class="h-px w-full bg-sky-600"></span>-->
<!--                        </h5>-->
<!--                        <div-->
<!--                            class="text-white/70 bg-panel-800 hover:bg-panel-700 transition-colors duration-300 p-3 my-4 rounded-xl">-->
<!--                            <h4 class="mt-2 font-poppins text-2xl font-bold leading-none">-->
<!--                                {{ article.author.username }}-->
<!--                                <span v-if="article.author.nickname"-->
<!--                                      class="text-lg ">-->
<!--                                    ( {{ article.author.nickname }} )-->
<!--                                </span>-->
<!--                                <div class="inline-block">-->
<!--                                    <BlueBadgeIcon/>-->
<!--                                </div>-->
<!--                            </h4>-->
<!--                            <div class="my-2 flex items-center gap-x-3">-->
<!--                                <a href="">-->
<!--                                    <svg class="bi bi-github" fill="currentColor" height="16" viewBox="0 0 16 16"-->
<!--                                         width="16" xmlns="http://www.w3.org/2000/svg">-->
<!--                                        <path-->
<!--                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>-->
<!--                                    </svg>-->
<!--                                </a>-->
<!--                                <a href="">-->
<!--                                    <svg class="bi bi-facebook" fill="currentColor" height="16" viewBox="0 0 16 16"-->
<!--                                         width="16" xmlns="http://www.w3.org/2000/svg">-->
<!--                                        <path-->
<!--                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>-->
<!--                                    </svg>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <p class="content mt-3 text-[13px] lg:pr-8">-->
<!--                                {{ article.author.bio }}-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </figcaption>-->
<!--                    <div class="col-span-4">-->
<!--                        <div-->
<!--                            class="panel relative text-white/70 bg-panel-800 hover:bg-panel-700 transition-colors duration-300 px-4 rounded-xl py-3">-->
<!--                            <div class="flex justify-between">-->
<!--                                <h4 class="my-2 font-poppins text-2xl font-bold leading-none">-->
<!--                                    Article Description-->
<!--                                </h4>-->
<!--                            </div>-->
<!--                            <div class="content user-content !mb-0 text-sm">-->
<!--                                <p>-->
<!--                                    {{ article.description }}-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <main class="">-->
<!--                    <div class="col-span-8">-->
<!--                        <section class="max-w-none p-0 flex-1 mb-3 ">-->
<!--                            <div-->
<!--                                class="flex-shrink-0 sticky flex justify-between mb-3 text-white/70 bg-panel-800 hover:bg-panel-700 transition-colors duration-300 py-3 px-2 rounded">-->
<!--                                <GoBack/>-->
<!--                                <div class="space-x-2">-->
<!--                                    <CategoryBotton :category="article.category"/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div v-if="article.article_photo" class="relative mx-auto flex justify-center"-->
<!--                                 style="width: 100%; height: 50vh;">-->
<!--                                <img :src="`/storage/ArticleAttachment/${article.article_photo.unique_name}`"-->
<!--                                     alt="Article illustration"-->
<!--                                     class="lazy h-full w-full object-cover lazyloaded rounded"-->
<!--                                     loading="lazy"-->
<!--                                     style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">-->
<!--                            </div>-->
<!--                        </section>-->
<!--                        <div class="text-white/70 bg-panel-800 py-6 px-4 rounded">-->
<!--                            <section class="container" style="max-width: 1166px;">-->
<!--                                <div class="mx-auto mb-8 flex w-full flex-wrap lg:flex-nowrap">-->
<!--                                    <div-->
<!--                                        class="relative mx-auto items-center justify-between rounded-xl p-6 font-bold flex flex-1 basis-0 bg-gradient-to-ls from-frameworks-lights to-framework text-white/70 to-testing">-->
<!--                                        <div-->
<!--                                            :style="{ 'background': 'url(/Images/Icon/S.svg)  50% -1%/ 250px  no-repeat' }"-->
<!--                                            class="pointer-events-none absolute top-0 bottom-0 right-0 left-0 left-1/2 -translate-x-1/2 transform opacity-10 md:block"></div>-->
<!--                                        <div class="flex-1 md:mx-[2.5rem] md:flex md:space-x-6">-->
<!--                                            <div class="px-4 md:flex-1 md:px-0">-->
<!--                                                <header class="mb-4">-->
<!--                                                    <div class="flex items-center">-->
<!--                                                        &lt;!&ndash;REACTION&ndash;&gt;-->
<!--                                                        <button-->
<!--                                                            :class="reacted ? 'rounded-full px-1 flex items-center justify-center bg-[#f6b7cb] mr-4 ring-1 ring-rose-300 border border-rose-300':'rounded-full px-1 flex items-center justify-center bg-white/10 mr-4'"-->
<!--                                                            :title="reacted ? 'Want to like this article for future reference?':'Want to like this article for future reference?'"-->
<!--                                                            style="width: 39px; height: 39px;"-->
<!--                                                            @click.prevent="reacted ? unlike(article) :like(article)">-->
<!--                                                            <svg-->
<!--                                                                :class="reacted ? 'flex-shrink-0 text-[#f3477e]':'flex-shrink-0 text-white'"-->
<!--                                                                height="45"-->
<!--                                                                viewBox="0 0 32 32"-->
<!--                                                                width="45">-->
<!--                                                                <g class="fill-current" fill-rule="evenodd"-->
<!--                                                                   stroke="none"-->
<!--                                                                   stroke-width="1.2">-->
<!--                                                                    <path class="fill-current"-->
<!--                                                                          d="M13.6196,11.2 C11.6246857,11.2 10.4,12.85425 10.4,14.2106375 C10.4,17.143925 13.9170286,19.8671 16.4,21.6 C18.8829714,19.86645 22.4,17.143925 22.4,14.2106375 C22.4,12.8541363 21.1758971,11.2 19.1804,11.2 C18.0661143,11.2 17.1138286,12.042335 16.4,12.8420625 C15.6854857,12.0422538 14.73392,11.2 13.6196,11.2 Z"></path>-->
<!--                                                                </g>-->
<!--                                                            </svg>-->
<!--                                                        </button>-->
<!--                                                        <h4 class="text-2xl font-bold leading-tight widescreen:text-3xl">-->
<!--                                                            {{ article.title }}-->
<!--                                                        </h4>-->
<!--                                                    </div>-->
<!--                                                </header>-->
<!--                                                <div>-->
<!--                                                    <div class="p-3">-->
<!--                                                        <div-->
<!--                                                            class="grid grid-cols-3 divide-x divide-solid divide-white/50">-->
<!--                                                            <div class="text-center">-->
<!--                                                                <div-->
<!--                                                                    class="mb-2 font-cabin text-2xs font-medium text-gray-100">-->
<!--                                                                    Visit Member-->
<!--                                                                </div>-->
<!--                                                                <div-->
<!--                                                                    class="inline-flex items-center text-sm font-semibold text-gray-100">-->
<!--                                                                    <svg class="bi bi-eye mr-3" fill="currentColor"-->
<!--                                                                         height="16" viewBox="0 0 16 16"-->
<!--                                                                         width="16"-->
<!--                                                                         xmlns="http://www.w3.org/2000/svg">-->
<!--                                                                        <path-->
<!--                                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>-->
<!--                                                                        <path-->
<!--                                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>-->
<!--                                                                    </svg>-->
<!--                                                                    {{ article.visit_count }}-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="text-center">-->
<!--                                                                <div-->
<!--                                                                    class="mb-2 font-cabin text-2xs font-medium text-gray-100">-->
<!--                                                                    Article Favorites-->
<!--                                                                </div>-->
<!--                                                                <div-->
<!--                                                                    class="inline-flex items-center mx-auto text-sm font-semibold text-gray-100">-->
<!--                                                                    <svg class="bi bi-heart-fill mr-2"-->
<!--                                                                         fill="currentColor"-->
<!--                                                                         height="16" viewBox="0 0 16 16"-->
<!--                                                                         width="16" xmlns="http://www.w3.org/2000/svg">-->
<!--                                                                        <path-->
<!--                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"-->
<!--                                                                            fill-rule="evenodd"/>-->
<!--                                                                    </svg>-->
<!--                                                                    <span>{{ article.reactions.length }}</span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="text-center">-->
<!--                                                                <div-->
<!--                                                                    class="mb-2 font-cabin text-2xs font-medium text-gray-100">-->
<!--                                                                    Published-->
<!--                                                                </div>-->
<!--                                                                <div-->
<!--                                                                    class="inline-flex items-center mx-auto text-sm font-semibold text-gray-100">-->
<!--                                                                    <svg class="bi bi-clock-history mr-2"-->
<!--                                                                         fill="currentColor"-->
<!--                                                                         height="16" viewBox="0 0 16 16"-->
<!--                                                                         width="16"-->
<!--                                                                         xmlns="http://www.w3.org/2000/svg">-->
<!--                                                                        <path-->
<!--                                                                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>-->
<!--                                                                        <path-->
<!--                                                                            d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>-->
<!--                                                                        <path-->
<!--                                                                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>-->
<!--                                                                    </svg>-->
<!--                                                                    <span>-->
<!--                                                                        {{-->
<!--                                                                            moment(article.created_at).format('MMMM Do, YYYY')-->
<!--                                                                        }}-->
<!--                                                                    </span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="content user-content text-[13px] text-grey-100">-->
<!--                                    <div class="content user-content" v-html="article.body"></div>-->
<!--                                </div>-->
<!--                            </section>-->
<!--                        </div>-->
<!--                        <section class="mt-3 py-6 px-4 text-white/70 bg-[#151f32] rounded">-->
<!--                            <div id="replies">-->
<!--                                <div v-for="comment in article.comments" class="reply-with-responses">-->
<!--                                    <ArticleComment :key="comment.uuid"-->
<!--                                                    :author="article.author"-->
<!--                                                    :comment="comment"-->
<!--                                                    :reacted="reactedBy"-->
<!--                                    >-->
<!--                                    </ArticleComment>-->
<!--                                </div>-->
<!--                                <ArticleCommentForm :article="article" :can-login="canLogin"></ArticleCommentForm>-->
<!--                            </div>-->
<!--                        </section>-->
<!--                    </div>-->
<!--                </main>-->
<!--                <div class="mx-auto max-w-[500px] flex-shrink-0 sticky top-[80px] self-start w-[315px]">-->
<!--                    <div-->
<!--                        class="space-y-3 transition-all duration-500">-->
<!--                        <div class="text-center">-->
<!--                            <h1 class="mb-1 text-center text-3lg font-bold text-white">More Recently Updated</h1>-->
<!--                            <h6 class="text-[10px] font-medium text-sm text-white">In case you may have missed it.</h6>-->
<!--                        </div>-->
<!--                        <div-->
<!--                            class="flex items-center justify-between gap-3 bg-panel-800 hover:bg-panel-700 transition-colors duration-500 p-2 rounded">-->
<!--                            <img alt=""-->
<!--                                 class="w-16"-->
<!--                                 src="/Images/Icon/S.svg"/>-->
<!--                            <div class="">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <h4 class="text-sm font-bold text-slate-100">This Title</h4>-->
<!--                                    <div class="flex flex-wrap items-center gap-x-2 text-2xs font-medium">-->
<!--                                    <span-->
<!--                                        class="text-3xs text-grey-800 dark:text-grey-600/40">-->
<!--                                        Mar 18, 2023-->
<!--                                    </span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="content user-content text-[11px] text-grey-100">-->
<!--                                    <div class="content user-content">-->
<!--                                        Lorem ipsum dolor sit amet, illo ipsa laborum recusandae rerum voluptate.-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div-->
<!--                            class="flex items-center justify-between gap-3 bg-panel-800 hover:bg-panel-700 transition-colors duration-500 p-2 rounded">-->
<!--                            <img alt=""-->
<!--                                 class="w-16"-->
<!--                                 src="/Images/Icon/S.svg"/>-->
<!--                            <div class="">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <h4 class="text-sm font-bold text-slate-100">This Title</h4>-->
<!--                                    <div class="flex flex-wrap items-center gap-x-2 text-2xs font-medium">-->
<!--                                    <span-->
<!--                                        class="text-3xs text-grey-800 dark:text-grey-600/40">-->
<!--                                        Mar 18, 2023-->
<!--                                    </span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="content user-content text-[10px] text-grey-100">-->
<!--                                    <div class="content user-content">-->
<!--                                        Lorem ipsum dolor sit amet, illo ipsa laborum recusandae rerum voluptate.-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div-->
<!--                            class="flex items-center justify-between gap-3 bg-panel-800 hover:bg-panel-700 transition-colors duration-500 p-2 rounded">-->
<!--                            <img alt=""-->
<!--                                 class="w-16"-->
<!--                                 src="/Images/Icon/S.svg"/>-->
<!--                            <div class="">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <h4 class="text-sm font-bold text-slate-100">This Title</h4>-->
<!--                                    <div class="flex flex-wrap items-center gap-x-2 text-2xs font-medium">-->
<!--                                    <span-->
<!--                                        class="text-3xs text-grey-800 dark:text-grey-600/40">-->
<!--                                        Mar 18, 2023-->
<!--                                    </span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="content user-content text-[10px] text-grey-100">-->
<!--                                    <div class="content user-content">-->
<!--                                        Lorem ipsum dolor sit amet, illo ipsa laborum recusandae rerum voluptate.-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div-->
<!--                            class="flex items-center justify-between gap-3 bg-panel-800 hover:bg-panel-700 transition-colors duration-500 p-2 rounded">-->
<!--                            <img alt=""-->
<!--                                 class="w-16"-->
<!--                                 src="/Images/Icon/S.svg"/>-->
<!--                            <div class="">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <h4 class="text-sm font-bold text-slate-100">This Title</h4>-->
<!--                                    <div class="flex flex-wrap items-center gap-x-2 text-2xs font-medium">-->
<!--                                    <span-->
<!--                                        class="text-3xs text-grey-800 dark:text-grey-600/40">-->
<!--                                        Mar 18, 2023-->
<!--                                    </span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="content user-content text-[10px] text-grey-100">-->
<!--                                    <div class="content user-content">-->
<!--                                        Lorem ipsum dolor sit amet, illo ipsa laborum recusandae rerum voluptate.-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div-->
<!--                            class="flex items-center justify-between gap-3 bg-panel-800 hover:bg-panel-700 transition-colors duration-500 p-2 rounded">-->
<!--                            <img alt=""-->
<!--                                 class="w-16"-->
<!--                                 src="/Images/Icon/S.svg"/>-->
<!--                            <div class="">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <h4 class="text-sm font-bold text-slate-100">This Title</h4>-->
<!--                                    <div class="flex flex-wrap items-center gap-x-2 text-2xs font-medium">-->
<!--                                    <span-->
<!--                                        class="text-3xs text-grey-800 dark:text-grey-600/40">-->
<!--                                        Mar 18, 2023-->
<!--                                    </span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="content user-content text-[10px] text-grey-100">-->
<!--                                    <div class="content user-content">-->
<!--                                        Lorem ipsum dolor sit amet, illo ipsa laborum recusandae rerum voluptate.-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div-->
<!--                            class="flex items-center justify-between gap-3 bg-panel-800 hover:bg-panel-700 transition-colors duration-500 p-2 rounded">-->
<!--                            <img alt=""-->
<!--                                 class="w-16"-->
<!--                                 src="/Images/Icon/S.svg"/>-->
<!--                            <div class="">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <h4 class="text-sm font-bold text-slate-100">This Title</h4>-->
<!--                                    <div class="flex flex-wrap items-center gap-x-2 text-2xs font-medium">-->
<!--                                    <span-->
<!--                                        class="text-3xs text-grey-800 dark:text-grey-600/40">-->
<!--                                        Mar 18, 2023-->
<!--                                    </span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="content user-content text-[10px] text-grey-100">-->
<!--                                    <div class="content user-content">-->
<!--                                        Lorem ipsum dolor sit amet, illo ipsa laborum recusandae rerum voluptate.-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </article>-->
<!--        </main>-->
<!--    </AuthenticatedLayout>-->
<!--</template>-->

<script setup>

import CategoryBotton from "@/Components/CategoryBotton.vue";
import ArticleComment from "@/Components/ArticleComment.vue";
import ArticleCommentForm from "@/Pages/ArticleCommentForm.vue";
import moment from "moment-timezone";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import ArticleReply from "@/Components/ArticleReply.vue";
import {Button} from "view-ui-plus";
import BlueBadgeIcon from "@/Components/BlueBadgeIcon.vue";
import GoBack from "@/Components/GoBack.vue";

const props = defineProps({
    article: {},
    reacted: {
        type: Boolean
    }, reactedBy: {
        type: Boolean
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
})

const form = useForm({});


const like = (param) => {
    form.post(route('article.store_reaction', param));
};
const unlike = (param) => {
    form.delete(route('article.destroy_reaction', param), {
        onSuccess: form.wasSuccessful,
    });
};
</script>

<style lang="scss" scoped></style>

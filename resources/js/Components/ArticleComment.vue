<template xmlns="http://www.w3.org/1999/html">
    <article
        class="forum-comment is-reply mb-3 rounded-xl px-0 py-0 transition-colors duration-300 dark bg-blue/7 hover:bg-panel-700 text-white"
    >
        <div class="px-6 py-4 lg:p-5">
            <div class="space-x-2">
                <div class="flex items-center">
                    <a
                        :href="route('profile.information', comment.author)"
                        class="flex items-center text-white mb-3"
                    >
                        <div v-if="comment.author.photo" class="">
                            <img
                                :src="
                                    '/storage/ProfileAttachment/' +
                                    comment.author.photo
                                "
                                alt=""
                                class="mr-2 lazy object-cover lazyloaded rounded-full"
                                loading="lazy"
                                style="height: 28px"
                                width="30"
                            />
                        </div>
                        <div
                            v-if="!comment.author.photo"
                            aria-hidden="true"
                            class="mr-2 flex h-8 w-8 items-center uppercase justify-center rounded-full border-2 border-gray-200 bg-blue-50 text-blue-700 dark:border-gray-400 h-[30px] w-[30px] border-none"
                            height="30"
                            width="30"
                        >
                            {{ comment.author.username.split('')[0] }}
                        </div>
                    </a>
                    <div class="relative flex flex-1 flex-col">
                        <header class="mb-3">
                            <div class="flex-1 text-left leading-none">
                                <div class="flex items-center">
                                    <a
                                        :href="
                                            route(
                                                'profile.information',
                                                comment.author
                                            )
                                        "
                                        class="mr-2 block font-bold text-white"
                                    >
                                        {{ comment.author.username }}
                                    </a>
                                    <svg
                                        class="bi bi-patch-check-fill fill-blue-600 stroke-white dark:stroke-sky-300 stroke-1 ml-1"
                                        height="13"
                                        viewBox="0 0 16 16"
                                        width="12"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <title>Verified account</title>
                                        <path
                                            d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"
                                        />
                                    </svg>
                                </div>
                                <div
                                    class="mt-2 flex flex-wrap items-center gap-x-2 text-2xs font-medium"
                                >
                                    <span
                                        class="text-3xs text-grey-800 dark:text-grey-600/40"
                                    >
                                        <Time
                                            :interval="1"
                                            :time="comment.created_at"
                                        />
                                    </span>
                                </div>
                            </div>
                            <div class="relative ml-3 flex" style="top: -5px">
                                <div class="ml-4 hidden">
                                    <ul
                                        class="achievement-list flex flex-1 justify-between gap-x-1"
                                    ></ul>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
                <div class="w-full">
                    <v-md-editor
                        :model-value="comment.body"
                        class="w-full"
                        mode="preview"
                    ></v-md-editor>
                    <div class="mt-auto">
                        <div
                            class="forum-comment-edit-links relative -mb-1 mt-4 flex gap-x-2 justify-start"
                        >
                            <!--                            <json-viewer :value="comment.reactions"></json-viewer>-->
                            <button
                                :class="
                                    comment.author.id ==
                                    comment.reactions.user_id
                                        ? 'rounded-full px-1 flex items-center justify-center bg-[#f6b7cb] ring-1 ring-rose-300 border border-rose-300'
                                        : 'rounded-full px-1 flex items-center justify-center bg-white/10'
                                "
                                :title="
                                    comment.author.id ==
                                    comment.reactions.user_id
                                        ? 'Want to like this article for future reference?'
                                        : 'Want to like this article for future reference?'
                                "
                                style="width: 20px; height: 20px"
                                @click.prevent="
                                    comment.author.id ==
                                    comment.reactions.user_id
                                        ? unlike(comment)
                                        : like(comment)
                                "
                            >
                                <svg
                                    :class="
                                        comment.author.id ==
                                        comment.reactions.user_id
                                            ? 'flex-shrink-0 text-[#f3477e]'
                                            : 'flex-shrink-0 text-white'
                                    "
                                    height="25"
                                    viewBox="0 0 32 32"
                                    width="25"
                                >
                                    <g
                                        class="fill-current"
                                        fill-rule="evenodd"
                                        stroke="none"
                                        stroke-width="1.2"
                                    >
                                        <path
                                            class="fill-current"
                                            d="M13.6196,11.2 C11.6246857,11.2 10.4,12.85425 10.4,14.2106375 C10.4,17.143925 13.9170286,19.8671 16.4,21.6 C18.8829714,19.86645 22.4,17.143925 22.4,14.2106375 C22.4,12.8541363 21.1758971,11.2 19.1804,11.2 C18.0661143,11.2 17.1138286,12.042335 16.4,12.8420625 C15.6854857,12.0422538 14.73392,11.2 13.6196,11.2 Z"
                                        ></path>
                                    </g>
                                </svg>
                            </button>
                            <button
                                class="inline-flex text-xs mr-2 rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-1 btn btn-dark-blue hover:bg-blue-10 dark:bg-blue/13 dark:text-white"
                                @click="replies()"
                            >
                                <svg
                                    class="bi bi-reply mr-1"
                                    fill="currentColor"
                                    height="13"
                                    viewBox="0 0 16 16"
                                    width="12"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"
                                    />
                                </svg>
                                Reply
                            </button>
                            <div class="flex">
                                <button
                                    v-if="
                                        comment.author.id ==
                                        $page.props.auth.user.id
                                    "
                                    class="inline-flex text-xs rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-1 btn btn-dark-blue hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20"
                                    type="button"
                                    @click="openComment()"
                                >
                                    <svg
                                        class="bi bi-pencil-square mr-1"
                                        fill="currentColor"
                                        height="13"
                                        viewBox="0 0 16 16"
                                        width="12"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                            fill="#78909C"
                                            fill-rule="evenodd"
                                            stroke="#78909C"
                                            stroke-width=".5"
                                        />
                                        <path
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                            fill="#78909C"
                                            fill-rule="evenodd"
                                            stroke="#78909C"
                                            stroke-width=".5"
                                        />
                                    </svg>
                                    Edit
                                </button>
                            </div>
                            <div class="relative ml-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <slot />
    <div v-if="isOpen">
        <CommentReply
            :comment="comment"
            :is-edit="isEdit"
            @isOpen="this.isOpen = false"
        >
        </CommentReply>
    </div>
</template>

<script>
import moment from 'moment-timezone';
import { useForm } from '@inertiajs/vue3';
import CommentReply from '@/Components/CommentReply.vue';
import ArticleReply from '@/Components/ArticleReply.vue';
import { Button } from 'view-ui-plus';

export default {
    components: { Button, ArticleReply, CommentReply },
    props: {
        comment: {},
        reacted: {
            type: Boolean,
        },
    },
    data() {
        return {
            isEdit: false,
            isOpen: false,
            form: new useForm({
                comment: this.comment.body,
            }),
        };
    },
    methods: {
        openComment() {
            this.isOpen = true;
            this.isEdit = true;
        },
        replies() {
            this.isOpen = true;
            this.isEdit = false;
        },
        moment: function () {
            return moment();
        },
        like(param) {
            this.form.get(route('comment.store_reaction', param), {
                preserveScroll: true,
            });
        },
        unlike(param) {
            this.form.get(route('comment.destroy_reaction', param), {
                preserveScroll: true,
            });
        },
    },
};
</script>

<style></style>

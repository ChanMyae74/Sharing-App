<template>
    <x-pane v-if="canLogin">
        <!--        <div class="text-center">-->
        <!--            <button-->
        <!--                :aria-controls="article.uuid"-->
        <!--                :data-drawer-show="article.uuid"-->
        <!--                :data-drawer-target="article.uuid"-->
        <!--                class="text-white bg-blue-700 text-sm px-5 py-2.5 mr-2 mb-2"-->
        <!--                data-drawer-placement="bottom"-->
        <!--                type="button"-->
        <!--            >-->
        <!--                Show bottom drawer-->
        <!--            </button>-->
        <!--        </div>-->
        <div
            class="panel relative transition-colors duration-300 dark text-white bg-panel-800 hover:bg-panel-700 px-8 rounded-xl mt-6 border border-dashed border-blue-400 py-0 text-sm hover:border-blue"
        >
            <button
                :aria-controls="article.uuid"
                :data-drawer-show="article.uuid"
                :data-drawer-target="article.uuid"
                class="inherits-color block flex w-full items-center p-6"
                data-drawer-placement="bottom"
                type="button"
            >
                <img
                    :src="'/storage/ProfileAttachment/' + article.author.photo"
                    alt=""
                    class="mr-4 h-14 w-14 lazy object-cover lazyloaded rounded-xl"
                    loading="lazy"
                />
                Reply Article.
            </button>
        </div>

        <!-- drawer component -->
        <div
            :id="article.uuid"
            :aria-labelledby="article.uuid"
            aria-hidden="true"
            class="fixed forum-comment bottom-0 left-0 right-0 z-[100] w-8/12 mx-auto p-4 rounded-lg overflow-y-auto transition-transform bg-panel-700 translate-y-full"
            tabindex="-1"
        >
            <h5
                :id="article.uuid"
                class="inline-flex items-center mb-4 text-base font-semibold"
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
                <p class="font-semibold text-xs">
                    Reply
                    <span class="uppercase font-bold text-sky-500">
                        Article
                    </span>
                </p>
            </h5>
            <button
                :aria-controls="article.uuid"
                :data-drawer-hide="article.uuid"
                class="ml-auto text-2xs px-3 py-1 absolute top-2.5 right-2.5 inline-flex items-center rounded-xl bg-panel-800 hover:bg-gray-800 duration-300"
                type="button"
            >
                <span class="">close</span>
            </button>
            <div class="">
                <v-md-editor
                    id="comment"
                    v-model="form.comment"
                    height="500px"
                    name="comment"
                ></v-md-editor>
            </div>
            <InputError :message="form.errors.comment" class="mt-2" />
            <div class="flex justify-between items-center">
                <div class="">
                    <p class="text-2xs text-grey-800">
                        * You may use Markdown with
                        <a
                            class="text-sky-500 uppercase"
                            href="https://code-farmer-i.github.io/vue-markdown-editor/"
                            rel="noreferrer noopener"
                            target="_blank"
                        >
                            v-md-editor
                        </a>
                        code blocks.
                    </p>
                </div>
                <button
                    :aria-controls="article.uuid"
                    :data-drawer-hide="article.uuid"
                    class="inline-flex mt-3 text-xs rounded-lg items-center font-semibold normal-case transition-all text-grey-600 px-3 py-2 btn btn-dark-blue hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20"
                    @click="submit"
                >
                    <svg
                        class="bi bi-send mr-1"
                        height="13"
                        viewBox="0 0 16 16"
                        width="13"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"
                            fill="#ffffff"
                            fill-rule="evenodd"
                            stroke="#fffff"
                            stroke-width=".5"
                        />
                    </svg>
                    Comment
                </button>
            </div>
        </div>
    </x-pane>
    <template v-else>
        <p
            class="text-xs rounded-xl inline-block bg-slate-900 px-3 py-3 uppercase"
        >
            <a :href="route('register')" class="text-blue-500 hover:underline"
                >REGISTER</a
            >
            or
            <a :href="route('login')" class="text-blue-500 hover:underline"
                >LOGIN
            </a>
            to a leave comments.
        </p>
    </template>
</template>

<script setup>
const form = useForm({
    comment: '',
});
const submit = () => {
    form.post(route('comment.store', props.article), {
        onSuccess: () => form.reset(),
        preserveScroll: true,
    });
};
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    article: [],
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<style></style>

<template>
    <div :data-label="comment.uuid"
         class="inset-0 fixed pointer-events-none"
         height="auto"
         style="z-index: 1000;">
        <div :data-label="comment.uuid"
             aria-expanded="true"
             aria-modal="true"
             class="container absolute inset-0 outline-none flex mx-auto dark"
             role="dialog"
             style=""
             tabindex="-1">
            <div
                :data-label="comment.uuid"
                class="mx-auto transition-transform flex-1 rounded-none bg-white dark:bg-[#1c3150] dark:text-white md:rounded-t-2xl max-h-screen mt-auto overflow-auto flex flex-col w-full md:w-3/4 md:max-h-80 pointer-events-auto" style="box-shadow: rgba(27, 33, 58, 0.4) 0px 20px 60px -2px;">
                <div :data-label="comment.uuid" class="flex py-4 px-6 md:px-8">
                    <div :data-label="comment.uuid" class="flex-1">
                        <form :data-label="comment.uuid" class="text-sm"
                              @submit.prevent="this.isEdit ? update(comment) : replies(comment)">
                            <div :data-label="comment.uuid" class="mb-2 flex items-center">
                                <svg :data-label="comment.uuid" class="mr-2 fill-current text-grey-800" height="16px"
                                     viewBox="0 0 16 16" width="16px">
                                    <g :data-label="comment.uuid" fill="none" fill-rule="evenodd" stroke="none"
                                       stroke-width="1">
                                        <g id="Group" :data-label="comment.uuid"
                                           class="fill-current"
                                           transform="translate(0.000000, -336.000000)">
                                            <path
                                                :data-label="comment.uuid"
                                                d="M0,344 L6,339 L6,342 C10.5,342 14,343 16,348 C13,345.5 10,345 6,346 L6,349 L0,344 L0,344 Z M0,344"></path>
                                        </g>
                                    </g>
                                </svg>
                                <p :data-label="comment.uuid" class="font-semibold">
                                    {{ this.isEdit ? 'Edit' : 'Reply to ' }}
                                    <strong v-if="!isEdit"
                                        :data-label="comment.uuid" class="uppercase text-blue font-extrabold">
                                        {{ comment.author.username }}
                                    </strong>
                                </p>
                            </div>
                            <div :data-label="comment.uuid" class="control">
                                    <textarea v-if="isEdit"
                                        id="body"
                                        v-model="this.form.comment"
                                        :data-label="comment.uuid"
                                        class="textarea mb-1 overflow-auto border-l-0 border-r-0 px-0 py-4 text-sm dark:border-sky-500 dark:bg-transparent dark:font-medium dark:text-white" data-autosize="" data-tribute="true"
                                        name="body"
                                        required=""
                                        style="min-height: 150px; max-height: 45vh; overflow: hidden; overflow-wrap: break-word; resize: none; height: 150px;"></textarea>
                                    <textarea v-else
                                        id="body"
                                        v-model="this.form.replies"
                                        :data-label="comment.uuid"
                                        class="textarea mb-1 overflow-auto border-l-0 border-r-0 px-0 py-4 text-sm dark:border-sky-500 dark:bg-transparent dark:font-medium dark:text-white" data-autosize="" data-tribute="true"
                                        name="body"
                                        required=""
                                        style="min-height: 150px; max-height: 45vh; overflow: hidden; overflow-wrap: break-word; resize: none; height: 150px;"></textarea>
                            </div>
                            <div :data-label="comment.uuid" class="flex w-full justify-end space-x-4">
                                <div :data-label="comment.uuid" class="">
                                    <button :data-label="comment.uuid"
                                            class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-4 py-2 duration-300"
                                            @click.prevent="close">
                                        <svg class="bi bi-x-circle mr-1" fill="currentColor" height="13"
                                             viewBox="0 0 16 16" width="12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                        Cancel
                                    </button>
                                </div>
                                <div :data-label="comment.uuid" class="">
                                    <button
                                        :data-label="comment.uuid"
                                        class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-4 py-2 duration-300">
                                        <svg v-if="this.isEdit" class="bi bi-check2-circle mr-1" fill="currentColor"
                                             height="13"
                                             viewBox="0 0 16 16" width="12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                            <path
                                                d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                        </svg>
                                        <svg v-else class="bi bi-send mr-1" height="13" viewBox="0 0 16 16"
                                             width="13" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" fill="#78909C" fill-rule="evenodd" stroke="#78909C"
                                                  stroke-width=".5"/>
                                        </svg>
                                        {{ this.isEdit ? 'Done' : 'Post' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "CommentReply",
    props: {
        comment: {},
        isEdit: false
    },
    data() {
        return {
            form: new useForm({
                comment: this.comment.body,
                replies: "@" + this.comment.author.username
            })
        }
    },
    methods: {
        close() {
            this.$emit("isOpen")
        },
        update(comment) {
            this.form.put(route('comment.update', comment), {
                onSuccess: () => this.form.reset(),
                preserveScroll: true
            });
            this.close();
        },
        replies(comment) {
            this.form.post(route('comment.replies', comment), {
                onSuccess: () => this.form.reset(),
                preserveScroll: true
            });
            this.close();
        }
    },
}
</script>

<style scoped>

</style>

<!--<template>-->
<!--    <Head title="Article Create" />-->
<!--    <AuthenticatedLayout :classes="'max-w-screen-xl'" :nav-status="true">-->
<!--        <template #header>-->
<!--            <h1 class="font-semibold text-xl text-gray-200 leading-tight mb-8">-->
<!--                Articles Settings-->
<!--            </h1>-->
<!--            <Breadcrumb>-->
<!--                <BreadcrumbItem :to="route('session.dashboard')">-->
<!--                    <span-->
<!--                        class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300"-->
<!--                    >-->
<!--                        Dashboard-->
<!--                    </span>-->
<!--                </BreadcrumbItem>-->
<!--                <BreadcrumbItem :to="route('article.index')">-->
<!--                    <span-->
<!--                        class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300"-->
<!--                    >-->
<!--                        Articles-->
<!--                    </span>-->
<!--                </BreadcrumbItem>-->
<!--                <BreadcrumbItem>-->
<!--                    <span class="text-gray-50 dark:text-white/75 duration-300">-->
<!--                        Article Create-->
<!--                    </span>-->
<!--                </BreadcrumbItem>-->
<!--            </Breadcrumb>-->
<!--        </template>-->
<!--        <template #sidebar>-->
<!--            <SidebarLink-->
<!--                :active="route().current('article.index')"-->
<!--                :href="route('article.index')"-->
<!--                class="font-bold"-->
<!--            >-->
<!--                <svg-->
<!--                    class="bi bi-postcard mr-4 text-gray-400"-->
<!--                    fill="currentColor"-->
<!--                    height="16"-->
<!--                    viewBox="0 0 16 16"-->
<!--                    width="16"-->
<!--                    xmlns="http://www.w3.org/2000/svg"-->
<!--                >-->
<!--                    <path-->
<!--                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"-->
<!--                        fill-rule="evenodd"-->
<!--                    />-->
<!--                </svg>-->
<!--                My Articles-->
<!--            </SidebarLink>-->
<!--            <SidebarLink-->
<!--                :active="route().current('article.lists')"-->
<!--                :href="route('article.lists')"-->
<!--                class="font-bold"-->
<!--            >-->
<!--                <svg-->
<!--                    class="bi bi-postcard mr-4 text-gray-400"-->
<!--                    fill="currentColor"-->
<!--                    height="16"-->
<!--                    viewBox="0 0 16 16"-->
<!--                    width="16"-->
<!--                    xmlns="http://www.w3.org/2000/svg"-->
<!--                >-->
<!--                    <path-->
<!--                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"-->
<!--                        fill-rule="evenodd"-->
<!--                    />-->
<!--                </svg>-->
<!--                My Articles List-->
<!--            </SidebarLink>-->
<!--            <SidebarLink-->
<!--                :active="route().current('article.create')"-->
<!--                :href="route('article.create')"-->
<!--                class="font-bold"-->
<!--            >-->
<!--                <svg-->
<!--                    class="bi bi-postcard mr-4 text-gray-400"-->
<!--                    fill="currentColor"-->
<!--                    height="16"-->
<!--                    viewBox="0 0 16 16"-->
<!--                    width="16"-->
<!--                    xmlns="http://www.w3.org/2000/svg"-->
<!--                >-->
<!--                    <path-->
<!--                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"-->
<!--                        fill-rule="evenodd"-->
<!--                    />-->
<!--                </svg>-->
<!--                Articles Create-->
<!--            </SidebarLink>-->
<!--        </template>-->
<!--        <div class="rounded px-3 py-2 text-sm bg-blue/7">-->
<!--            <form @submit.prevent="submit(article)">-->
<!--                <div class="flex">-->
<!--                    <div class="mt-4 flex w-1/2 flex-col mr-2">-->
<!--                        <InputLabel for="article_title" value="Article Title" />-->
<!--                        <div class="mt-1 flex flex-col">-->
<!--                            <TextInput-->
<!--                                id="article_title"-->
<!--                                v-model="form.article_title"-->
<!--                                autocomplete="article_title"-->
<!--                                class="mt-1 block w-full"-->
<!--                                placeholder="Aa"-->
<!--                                type="text"-->
<!--                            />-->
<!--                            <InputError-->
<!--                                :message="form.errors.article_title"-->
<!--                                class="mt-2"-->
<!--                            />-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash;                    <json-viewer :value="article"></json-viewer>&ndash;&gt;-->
<!--                    <div class="mt-4 flex w-1/2 flex-col mr-2">-->
<!--                        <InputLabel for="article_category" value="Category" />-->
<!--                        <div class="mt-2 flex flex-col">-->
<!--                            <Select-->
<!--                                v-model="form.article_category_id"-->
<!--                                multiple-->
<!--                                placeholder="Select Category"-->
<!--                            >-->
<!--                                <Option-->
<!--                                    v-for="(c, i) in categories"-->
<!--                                    :key="i"-->
<!--                                    :value="c.id"-->
<!--                                >-->
<!--                                    {{ c.name }}-->
<!--                                </Option>-->
<!--                            </Select>-->
<!--                        </div>-->
<!--                        <InputError-->
<!--                            :message="form.errors.article_category_id"-->
<!--                            class="mt-2"-->
<!--                        />-->
<!--                    </div>-->
<!--                    <div class="mt-4 flex w-1/2 flex-col">-->
<!--                        <InputLabel for="article_category" value="Category" />-->
<!--                        <div class="mt-2 flex flex-col">-->
<!--                            <Select-->
<!--                                v-model="form.article_tag_id"-->
<!--                                multiple-->
<!--                                placeholder="Select Tag"-->
<!--                            >-->
<!--                                <Option-->
<!--                                    v-for="(t, i) in tags"-->
<!--                                    :key="i"-->
<!--                                    :value="t.id"-->
<!--                                >-->
<!--                                    {{ t.name }}-->
<!--                                </Option>-->
<!--                            </Select>-->
<!--                        </div>-->
<!--                        <InputError-->
<!--                            :message="form.errors.article_tag_id"-->
<!--                            class="mt-2"-->
<!--                        />-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="my-3">-->
<!--                    <InputLabel for="article_category" value="Description" />-->
<!--                    <div class="mt-1">-->
<!--                        <textarea-->
<!--                            id="description"-->
<!--                            v-model="form.description"-->
<!--                            class="w-full border border-gray-700 text-gray-300 text-sm bg-transparent focus:border-sky-600 focus:ring-sky-600 rounded-md"-->
<!--                            placeholder="Aa"-->
<!--                            rows="1"-->
<!--                        ></textarea>-->
<!--                    </div>-->
<!--                    <InputError-->
<!--                        :message="form.errors.description"-->
<!--                        class="mt-2"-->
<!--                    />-->
<!--                </div>-->
<!--                <div class="">-->
<!--                    <QuillEditor-->
<!--                        ref="myQuillEditor"-->
<!--                        v-model:content="form.article_body"-->
<!--                        contentType="html"-->
<!--                        toolbar="full"-->
<!--                    />-->
<!--                    <InputError-->
<!--                        :message="form.errors.article_body"-->
<!--                        class="mt-2"-->
<!--                    />-->
<!--                </div>-->
<!--                <div class="mt-3 flex w-full flex-wrap">-->
<!--                    <div class="flex flex-col w-1/2">-->
<!--                        <InputLabel-->
<!--                            class="flex flex-col items-center justify-center w-full h-32 border duration-300 rounded cursor-pointer bg-panel-800 hover:bg-panel-700 transition-colors hover:border-gray-500"-->
<!--                            for="attachment"-->
<!--                        >-->
<!--                            <div-->
<!--                                class="flex flex-col items-center justify-center pt-5 pb-6"-->
<!--                            >-->
<!--                                <svg-->
<!--                                    aria-hidden="true"-->
<!--                                    class="w-10 h-10 mb-3 text-gray-400"-->
<!--                                    fill="none"-->
<!--                                    stroke="currentColor"-->
<!--                                    viewBox="0 0 24 24"-->
<!--                                    xmlns="http://www.w3.org/2000/svg"-->
<!--                                >-->
<!--                                    <path-->
<!--                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"-->
<!--                                        stroke-linecap="round"-->
<!--                                        stroke-linejoin="round"-->
<!--                                        stroke-width="2"-->
<!--                                    ></path>-->
<!--                                </svg>-->
<!--                                <p-->
<!--                                    class="mb-2 text-sm text-gray-500 dark:text-gray-400"-->
<!--                                >-->
<!--                                    <span class="font-semibold"-->
<!--                                        >Click to upload</span-->
<!--                                    >-->
<!--                                    or drag and drop-->
<!--                                </p>-->
<!--                                <p-->
<!--                                    class="text-xs text-gray-500 dark:text-gray-400"-->
<!--                                >-->
<!--                                    SVG, PNG, JPG or GIF-->
<!--                                </p>-->
<!--                            </div>-->
<!--                            <TextInput-->
<!--                                id="attachment"-->
<!--                                class="hidden"-->
<!--                                type="file"-->
<!--                                @input="-->
<!--                                    form.attachment = $event.target.files[0]-->
<!--                                "-->
<!--                            />-->
<!--                        </InputLabel>-->
<!--                    </div>-->
<!--                    <div class="flex flex-col w-1/2 pl-2">-->
<!--                        <div-->
<!--                            class="relative overflow-hidden rounded-xl"-->
<!--                            style="width: 100%; height: 250px"-->
<!--                        >-->
<!--                            <img-->
<!--                                :src="-->
<!--                                    '/storage/ArticleAttachment/' +-->
<!--                                    form.old_attachment-->
<!--                                "-->
<!--                                alt=""-->
<!--                            />-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="mt-3 p-3 rounded-lg text-end">-->
<!--                    <primary-button-->
<!--                        :class="{ 'opacity-25': form.processing }"-->
<!--                        :disabled="form.processing"-->
<!--                    >-->
<!--                        Update Article-->
<!--                    </primary-button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </AuthenticatedLayout>-->
<!--</template>-->

<!--<script>-->
<!--import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';-->
<!--import SidebarLink from '@/Components/SidebarLink.vue';-->
<!--import Sidebar from '@/Components/Sidebar.vue';-->
<!--import { Head, useForm } from '@inertiajs/vue3';-->
<!--import InputError from '@/Components/InputError.vue';-->
<!--import TextInput from '@/Components/TextInput.vue';-->
<!--import InputLabel from '@/Components/InputLabel.vue';-->
<!--import PrimaryButton from '@/Components/PrimaryButton.vue';-->
<!--import { Breadcrumb, BreadcrumbItem, Form, Upload } from 'view-ui-plus';-->
<!--import ClassicEditor from '@ckeditor/ckeditor5-build-classic';-->
<!--import { QuillEditor } from '@vueup/vue-quill';-->
<!--import '@vueup/vue-quill/dist/vue-quill.snow.css';-->
<!--import '@vueup/vue-quill/dist/vue-quill.bubble.css';-->
<!--import { mapGetters } from 'vuex';-->

<!--var toolbarOptions = [-->
<!--    ['bold', 'italic', 'underline', 'strike'], // toggled buttons-->
<!--    ['blockquote', 'code-block'],-->
<!--    ['link', 'image'],-->
<!--    [{ header: 1 }, { header: 2 }], // custom button values-->
<!--    [{ list: 'ordered' }, { list: 'bullet' }],-->
<!--    [{ script: 'sub' }, { script: 'super' }], // superscript/subscript-->
<!--    [{ indent: '-1' }, { indent: '+1' }], // outdent/indent-->
<!--    [{ direction: 'rtl' }], // text direction-->

<!--    [{ size: ['small', false, 'large', 'huge'] }], // custom dropdown-->
<!--    [{ header: [1, 2, 3, 4, 5, 6, false] }],-->

<!--    [{ color: [] }, { background: [] }], // dropdown with defaults from theme-->
<!--    [{ font: [] }],-->
<!--    [{ align: [] }],-->

<!--    ['clean'], // remove formatting button-->
<!--];-->
<!--export default {-->
<!--    components: {-->
<!--        AuthenticatedLayout,-->
<!--        SidebarLink,-->
<!--        Sidebar,-->
<!--        Head,-->
<!--        InputError,-->
<!--        TextInput,-->
<!--        InputLabel,-->
<!--        PrimaryButton,-->
<!--        Breadcrumb,-->
<!--        BreadcrumbItem,-->
<!--        Upload,-->
<!--        QuillEditor,-->
<!--    },-->
<!--    props: {-->
<!--        article: Object,-->
<!--        categories: [],-->
<!--        tags: [],-->
<!--    },-->
<!--    data: function () {-->
<!--        return {-->
<!--            options: {-->
<!--                debug: 'info',-->
<!--                placeholder: 'Aa',-->
<!--                modules: {-->
<!--                    toolbar: toolbarOptions,-->
<!--                },-->
<!--                readOnly: false,-->
<!--                theme: 'snow',-->
<!--            },-->
<!--            mounting: false,-->
<!--            form: useForm({-->
<!--                article_title: this.article.title,-->
<!--                article_category_id: [],-->
<!--                article_tag_id: [],-->
<!--                description: this.article.description,-->
<!--                article_body: this.article.body,-->
<!--                editor: ClassicEditor,-->
<!--                editorConfig: {},-->
<!--                attachment: '',-->
<!--                old_attachment: [-->
<!--                    this.article.article_photo-->
<!--                        ? this.article.article_photo.unique_name-->
<!--                        : '',-->
<!--                ],-->
<!--            }),-->
<!--        };-->
<!--    },-->
<!--    watch: {-->
<!--        content(val) {-->
<!--            if (!this.mounting) {-->
<!--                this.$store.commit(-->
<!--                    'setDelta',-->
<!--                    this.$refs.myQuillEditor.quill.getContents()-->
<!--                );-->
<!--            }-->
<!--            this.$store.commit('setContent', val);-->
<!--            this.mounting = false;-->
<!--        },-->
<!--    },-->
<!--    methods: {-->
<!--        submit(article) {-->
<!--            this.form.post(route('article.update', article), {-->
<!--                onSuccess: () => this.form.reset(),-->
<!--            });-->
<!--        },-->
<!--    },-->
<!--    computed: {-->
<!--        ...mapGetters(['delta', 'contents']),-->
<!--    },-->
<!--    mounted() {-->
<!--        this.mounting = true;-->
<!--        if (!this.form.article_body && this.form.article_body) {-->
<!--            this.form.article_body = this.for.article_body;-->
<!--        }-->
<!--    },-->
<!--    async created() {-->
<!--        for (let cat of this.article.category) {-->
<!--            this.form.article_category_id.push(cat.id);-->
<!--        }-->
<!--        for (let tag of this.article.tag) {-->
<!--            this.form.article_tag_id.push(tag.id);-->
<!--        }-->
<!--    },-->
<!--};-->
<!--</script>-->

<!--<style>-->
<!--.ql-editor {-->
<!--    height: 500px;-->
<!--}-->

<!--.ivu-upload-drag {-->
<!--    &#45;&#45;tw-bg-opacity: 1;-->
<!--    background-color: rgba(17 24 39 / var(&#45;&#45;tw-bg-opacity));-->
<!--    border: none;-->
<!--}-->

<!--.ivu-upload-drag:hover {-->
<!--    border: none;-->
<!--}-->

<!--.ivu-select-selection {-->
<!--    &#45;&#45;tw-bg-opacity: 1;-->
<!--    background-color: rgb(17 24 39 / var(&#45;&#45;tw-bg-opacity));-->
<!--}-->

<!--.ivu-select-selection {-->
<!--    border: rgba(65, 132, 228, 0.4);-->
<!--}-->

<!--.ivu-select-dropdown {-->
<!--    &#45;&#45;tw-bg-opacity: 1;-->
<!--    background-color: rgb(17 24 39 / var(&#45;&#45;tw-bg-opacity));-->
<!--}-->

<!--.ivu-select-item:hover {-->
<!--    background-color: rgba(65, 132, 228, 0.4);-->
<!--    color: white;-->
<!--    transition: 500ms;-->
<!--    border-radius: 2px;-->
<!--}-->

<!--.ivu-tag {-->
<!--    display: inline-block;-->
<!--    height: 22px;-->
<!--    line-height: 22px;-->
<!--    margin: 2px 4px 2px 0;-->
<!--    padding: 0 8px;-->
<!--    border: 1px solid rgba(65, 132, 228, 0.4);-->
<!--    border-radius: 3px;-->
<!--    &#45;&#45;tw-text-opacity: 1;-->
<!--    background-color: rgba(50, 138, 241, 0.13/var (&#45;&#45;tw-text-opacity));-->
<!--    font-size: 12px;-->
<!--    vertical-align: middle;-->
<!--    opacity: 1;-->
<!--    overflow: hidden;-->
<!--}-->

<!--.ivu-tag-text {-->
<!--    color: white;-->
<!--}-->

<!--.ivu-select-multiple .ivu-select-item-selected {-->
<!--    color: rgba(45, 140, 240, 0.9);-->
<!--    background: rgba(65, 132, 228, 0.4);-->
<!--}-->

<!--.ivu-tag .ivu-icon-ios-close {-->
<!--    display: inline-block;-->
<!--    font-size: 14px;-->
<!--    -webkit-transform: scale(1.42857143) rotate(0);-->
<!--    -ms-transform: scale(1.42857143) rotate(0);-->
<!--    transform: scale(1.42857143) rotate(0);-->
<!--    cursor: pointer;-->
<!--    margin-left: 2px;-->
<!--    color: white;-->
<!--    opacity: 0.66;-->
<!--    position: relative;-->
<!--    top: -1px;-->
<!--}-->

<!--.ivu-select-multiple .ivu-select-item-focus,-->
<!--.ivu-select-multiple .ivu-select-item-selected:hover {-->
<!--    background-color: rgba(65, 132, 228, 0.4);-->
<!--}-->

<!--.ivu-select-multiple .ivu-select-item-focus,-->
<!--.ivu-select-multiple .ivu-select-item-selected:hover {-->
<!--    &#45;&#45;tw-bg-opacity: 1;-->
<!--    background-color: rgb(17 24 39 / var(&#45;&#45;tw-bg-opacity));-->
<!--}-->

<!--.ck-editor__editable {-->
<!--    min-height: 300px;-->
<!--    border-bottom-left-radius: 0.375rem !important;-->
<!--    border-bottom-right-radius: 0.375rem !important;-->
<!--}-->
<!--</style>-->

<template>
    <Head title="Article Create" />
    <AuthenticatedLayout :classes="'max-w-screen-xl'" :nav-status="true">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-200 leading-tight mb-8">
                Articles Settings
            </h1>
            <Breadcrumb>
                <BreadcrumbItem :to="route('session.dashboard')">
                    <span
                        class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300"
                    >
                        Dashboard
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem :to="route('article.index')">
                    <span
                        class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300"
                    >
                        Articles
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem>
                    <span class="text-gray-50 dark:text-white/75 duration-300">
                        Article Create
                    </span>
                </BreadcrumbItem>
            </Breadcrumb>
        </template>
        <template #sidebar>
            <SidebarLink
                :active="route().current('article.index')"
                :href="route('article.index')"
                class="font-bold"
            >
                <svg
                    class="bi bi-postcard mr-4 text-gray-400"
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
                My Articles
            </SidebarLink>
            <SidebarLink
                :active="route().current('article.lists')"
                :href="route('article.lists')"
                class="font-bold"
            >
                <svg
                    class="bi bi-postcard mr-4 text-gray-400"
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
                My Articles List
            </SidebarLink>
            <SidebarLink
                :active="route().current('article.create')"
                :href="route('article.create')"
                class="font-bold"
            >
                <svg
                    class="bi bi-postcard mr-4 text-gray-400"
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
                Articles Create
            </SidebarLink>
        </template>
        <div class="rounded px-3 py-2 text-sm bg-blue/7">
            <div class="mt-2 flex space-x-3">
                <i-switch @on-change="form.is_public === 'private'"></i-switch>
                <InputLabel :value="form.is_public ? 'Public' : 'Private'" />
            </div>
            <InputError :message="form.errors.form_frameworks" class="mt-2" />
            <form method="post" @submit.prevent="submit(article)">
                <div class="flex">
                    <div class="mt-4 flex w-2/4 flex-col mr-2">
                        <InputLabel for="article_title" value="Article Title" />
                        <div class="mt-1 flex flex-col">
                            <TextInput
                                id="article_title"
                                v-model="form.article_title"
                                autocomplete="article_title"
                                class="mt-1 block w-full"
                                placeholder="Aa"
                                type="text"
                            />
                            <InputError
                                :message="form.errors.article_title"
                                class="mt-2"
                            />
                        </div>
                    </div>
                    <div class="mt-4 flex w-1/4 flex-col mr-2">
                        <InputLabel for="article_category" value="Category" />
                        <div class="mt-2 flex flex-col">
                            <Select v-model="form.article_category_id" multiple>
                                <Option
                                    v-for="(category, i) in categories"
                                    :key="i"
                                    :value="category.id"
                                >
                                    {{ category.name }}
                                </Option>
                            </Select>
                        </div>
                        <InputError
                            :message="form.errors.article_category_id"
                            class="mt-2"
                        />
                    </div>
                    <div class="mt-4 flex w-1/2 flex-col">
                        <InputLabel for="article_category" value="Tags"/>
                        <div class="mt-2 flex flex-col">
                            <Select v-model="form.article_tag_id" multiple>
                                <Option
                                    v-for="(tag, i) in tags"
                                    :key="i"
                                    :value="tag.id"
                                >
                                    {{ tag.name }}
                                </Option>
                            </Select>
                        </div>
                        <InputError
                            :message="form.errors.article_tag_id"
                            class="mt-2"
                        />
                    </div>
                </div>
                <div class="flex">
                    <div class="mt-4 flex flex-col mr-2">
                        <InputLabel value="Color Gradient Form Left" />
                        <div class="mt-2 flex">
                            <ColorPicker
                                v-model="form.gradient_left"
                                :model-value="form.gradient_left"
                                type="primary"
                            />
                        </div>
                        <InputError
                            :message="form.errors.gradient_left"
                            class="mt-2"
                        />
                    </div>
                    <div class="mt-4 flex flex-col">
                        <InputLabel value="Color Gradient To Right" />
                        <div class="mt-2 flex">
                            <ColorPicker v-model="form.form_frameworks" />
                        </div>
                        <InputError
                            :message="form.errors.form_frameworks"
                            class="mt-2"
                        />
                    </div>
                </div>
                <div class="my-3">
                    <InputLabel for="article_category" value="Description" />
                    <div class="mt-1">
                        <textarea
                            id="description"
                            v-model="form.description"
                            class="w-full border border-gray-700 text-gray-300 text-sm bg-transparent focus:border-sky-600 focus:ring-sky-600 rounded"
                            placeholder="Aa"
                            rows="1"
                        ></textarea>
                    </div>
                    <InputError
                        :message="form.errors.description"
                        class="mt-2"
                    />
                </div>
                <div class="">
                    <QuillEditor
                        ref="myQuillEditor"
                        v-model:content="form.article_body"
                        class="rounded border border-gray-700"
                        contentType="html"
                        style="border: --tw-border-opacity: 1;border-color: rgb(55 65 81 / var(--tw-border-opacity));"
                        toolbar="full"
                    />
                    <InputError
                        :message="form.errors.article_body"
                        class="mt-2"
                    />
                </div>
                <div class="mt-3 flex w-full flex-wrap">
                    <div class="flex flex-col w-1/2">
                        <InputLabel
                            class="flex flex-col items-center justify-center w-full h-32 border duration-300 rounded cursor-pointer bg-panel-800 hover:bg-panel-700 transition-colors hover:border-gray-500"
                            for="attachment"
                        >
                            <div
                                class="flex flex-col items-center justify-center pt-5 pb-6"
                            >
                                <svg
                                    aria-hidden="true"
                                    class="w-10 h-10 mb-3 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    ></path>
                                </svg>
                                <p
                                    class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                                >
                                    <span class="font-semibold"
                                        >Click to upload</span
                                    >
                                    or drag and drop
                                </p>
                                <p
                                    class="text-xs text-gray-500 dark:text-gray-400"
                                >
                                    SVG, PNG, JPG or GIF
                                </p>
                            </div>
                            <TextInput
                                id="attachment"
                                class="hidden"
                                type="file"
                                @input="
                                    form.attachment = $event.target.files[0]
                                "
                            />
                        </InputLabel>
                    </div>
                    <div class="flex flex-col w-1/2 pl-2">
                        <div
                            class="relative overflow-hidden rounded-xl"
                            style="width: 100%; height: 250px"
                        >
                            <img
                                :src="
                                    '/storage/ArticleAttachment/' +
                                    form.old_attachment
                                "
                                alt=""
                            />
                        </div>
                    </div>
                </div>
                <div class="mt-3 bg-panel-800 p-3 rounded-lg text-end">
                    <primary-button
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Add Article
                    </primary-button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SidebarLink from '@/Components/SidebarLink.vue';
import Sidebar from '@/Components/Sidebar.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Breadcrumb, BreadcrumbItem, ColorPicker, Upload } from 'view-ui-plus';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';
import { mapGetters } from 'vuex';

var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'], // toggled buttons
    ['blockquote', 'code-block'],
    ['link', 'image'],
    [{ header: 1 }, { header: 2 }], // custom button values
    [{ list: 'ordered' }, { list: 'bullet' }],
    [{ script: 'sub' }, { script: 'super' }], // superscript/subscript
    [{ indent: '-1' }, { indent: '+1' }], // outdent/indent
    [{ direction: 'rtl' }], // text direction

    [{ size: ['small', false, 'large', 'huge'] }], // custom dropdown
    [{ header: [1, 2, 3, 4, 5, 6, false] }],

    [{ color: [] }, { background: [] }], // dropdown with defaults from theme
    [{ font: [] }],
    [{ align: [] }],

    ['clean'], // remove formatting button
];
export default {
    components: {
        ColorPicker,
        AuthenticatedLayout,
        SidebarLink,
        Sidebar,
        Head,
        InputError,
        TextInput,
        InputLabel,
        PrimaryButton,
        Breadcrumb,
        BreadcrumbItem,
        Upload,
        QuillEditor,
    },
    props: {
        article: Object,
        categories: [],
        tags: [],
    },
    data: function () {
        return {
            options: {
                debug: 'info',
                placeholder: 'Aa',
                modules: {
                    toolbar: toolbarOptions,
                },
                readOnly: false,
                theme: 'snow',
            },
            mounting: false,
            form: new useForm({
                is_public: 'public',
                article_title: this.article.title,
                article_category_id: [],
                gradient_left: '1B487EBF',
                form_frameworks: '1B487EBF',
                article_tag_id: [],
                description: this.article.description,
                article_body: this.article.body,
                editor: ClassicEditor,
                editorConfig: {},
                attachment: '',
                old_attachment: [
                    this.article.article_photo
                        ? this.article.article_photo.unique_name
                        : '',
                ],
            }),
        };
    },
    watch: {
        content(val) {
            if (!this.mounting) {
                this.$store.commit(
                    'setDelta',
                    this.$refs.myQuillEditor.quill.getContents()
                );
            }
            this.$store.commit('setContent', val);
            this.mounting = false;
        },
    },
    methods: {
        submit(article) {
            this.form.post(route('article.update', article), {
                onSuccess: () => this.form.reset(),
            });
        },
    },
    computed: {
        ...mapGetters(['delta', 'contents']),
    },
    mounted() {
        this.mounting = true;
        if (!this.form.article_body && this.form.article_body) {
            this.form.article_body = this.for.article_body;
        }
    },
    async created() {
        for (let cat of this.article.category) {
            this.form.article_category_id.push(cat.id);
        }
        for (let tag of this.article.tag) {
            this.form.article_tag_id.push(tag.id);
        }
    },
};
</script>

<style>
.ql-editor {
    height: 500px;
}

.ivu-upload-drag {
    --tw-bg-opacity: 1;
    background-color: rgba(17 24 39 / var(--tw-bg-opacity));
    border: none;
}

.ivu-upload-drag:hover {
    border: none;
}

.ivu-select-selection {
    --tw-bg-opacity: 1;
    background-color: rgba(21 31 50 1 / var(--tw-bg-opacity));
}

.ivu-select-selection {
    border: 1px solid #374151;
    border-radius: 3px;
}

.ivu-select-dropdown {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.ivu-select-item:hover {
    background-color: rgba(65, 132, 228, 0.4);
    color: white;
    transition: 500ms;
    border-radius: 2px;
}

.ivu-tag {
    display: inline-block;
    height: 22px;
    line-height: 22px;
    margin: 2px 4px 2px 0;
    padding: 0 8px;
    --tw-bg-opacity: 1;
    background-color: rgba(21 31 50 1 / var(--tw-bg-opacity));
    border: 1px solid #374151;
    border-radius: 3px;
    font-size: 12px;
    vertical-align: middle;
    opacity: 1;
    overflow: hidden;
}

.ivu-tag-text {
    color: white;
}

.ivu-select-multiple .ivu-select-item-selected {
    color: rgba(45, 140, 240, 0.9);
    background: rgba(65, 132, 228, 0.4);
}

.ivu-tag .ivu-icon-ios-close {
    display: inline-block;
    font-size: 14px;
    -webkit-transform: scale(1.42857143) rotate(0);
    -ms-transform: scale(1.42857143) rotate(0);
    transform: scale(1.42857143) rotate(0);
    cursor: pointer;
    margin-left: 2px;
    color: white;
    opacity: 0.66;
    position: relative;
    top: -1px;
}

.ivu-select-multiple .ivu-select-item-focus,
.ivu-select-multiple .ivu-select-item-selected:hover {
    background-color: rgba(65, 132, 228, 0.4);
}

.ivu-select-multiple .ivu-select-item-focus,
.ivu-select-multiple .ivu-select-item-selected:hover {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.ck-editor__editable {
    min-height: 300px;
    border-bottom-left-radius: 0.375rem !important;
    border-bottom-right-radius: 0.375rem !important;
}

.ivu-input {
    --tw-bg-opacity: 1;
    background-color: rgba(21 31 50 1 / var(--tw-bg-opacity));
    border: 1px solid #374151;
    border-radius: 3px;
}
</style>

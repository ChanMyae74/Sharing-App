<template>
    <Head :title="article.title" />
    <AuthenticatedLayout :classes="'min-w-screen-xl'" :side-status="false">
        <main class="min-w-4xl mt-6" style="min-width: 1200px">
            <article class="flex gap-x-5 text-white">
                <div
                    class="mx-auto max-w-[400px] flex-shrink-0 sticky top-[80px] p-2 self-start w-[315px] rounded border border-[#223c68]"
                >
                    <figure>
                        <div
                            v-if="article.author.photo"
                            class="relative overflow-hidden rounded"
                            style="width: 100%; height: 445px"
                        >
                            <img
                                :src="
                                    '/storage/ProfileAttachment/' +
                                    article.author.photo
                                "
                                alt="Lary avatar "
                                class="lazy h-full w-full object-cover lazyloaded"
                                loading="lazy"
                                style="
                                    -webkit-mask-image: -webkit-radial-gradient(
                                        center center,
                                        white,
                                        black
                                    );
                                "
                            />
                        </div>
                    </figure>
                    <figcaption class="mt-4">
                        <h5
                            class="flex items-center gap-x-3 font-poppins font-semibold text-sky-600"
                        >
                            <span class="h-px w-full bg-sky-600"></span>
                            <span class="flex-shrink-0 text-xs">
                                Published
                                <time>{{
                                    moment
                                        .utc(article.created_at)
                                        .local()
                                        .startOf('seconds')
                                        .fromNow()
                                }}</time>
                            </span>
                            <span class="h-px w-full bg-sky-600"></span>
                        </h5>
                        <div
                            class="text-white/70 bg-panel-800 hover:bg-panel-700 transition-colors duration-300 p-3 my-4 rounded-xl"
                        >
                            <div class="">
                                <h4
                                    class="mt-2 font-poppins text-2xl font-bold leading-none"
                                >
                                    {{ article.author.username }}
                                    <span
                                        v-if="article.author.nickname"
                                        class="text-lg"
                                    >
                                        ( {{ article.author.nickname }} )
                                    </span>
                                    <div class="inline-block">
                                        <BlueBadgeIcon />
                                    </div>
                                </h4>
                            </div>
                            <div class="my-2 flex items-center gap-x-3">
                                <a
                                    v-if="article.author.facebook"
                                    :href="
                                        'https://www.facebook.com/' +
                                        article.author.facebook
                                    "
                                    target="_blank"
                                >
                                    <svg
                                        class="bi bi-facebook hover:text-blue-400 duration-500 transition-color"
                                        fill="currentColor"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        width="16"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                                        />
                                    </svg>
                                </a>
                                <a
                                    v-if="article.author.github"
                                    :href="
                                        'https://www.github.com/' +
                                        article.author.github
                                    "
                                    target="_blank"
                                >
                                    <svg
                                        class="bi bi-github hover:text-blue-400 duration-500 transition-colors"
                                        fill="currentColor"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        width="16"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"
                                        />
                                    </svg>
                                </a>
                                <a
                                    v-if="article.author.linkin"
                                    :href="
                                        'https://www.linkedin.com/in/' +
                                        article.author.linkin
                                    "
                                    target="_blank"
                                >
                                    <svg
                                        class="bi bi-linkedin"
                                        fill="currentColor"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        width="16"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"
                                        />
                                    </svg>
                                </a>
                                <p class="content mt-3 text-[13px] lg:pr-8">
                                    {{ article.author.bio }}
                                </p>
                            </div>
                        </div>
                    </figcaption>
                    <div class="w-full">
                        <div
                            class="panel relative text-white/70 bg-panel-800 hover:bg-panel-700 transition-colors duration-300 px-4 rounded-xl py-3"
                        >
                            <div class="flex justify-between">
                                <h4
                                    class="my-2 font-poppins text-2xl font-bold leading-none"
                                >
                                    Article Description
                                </h4>
                            </div>
                            <div class="content user-content !mb-0 text-sm">
                                <p>
                                    {{ article.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <main class="w-full">
                    <div class="">
                        <section class="p-0 flex-1 mb-3">
                            <div
                                class="flex-shrink-0 sticky flex justify-between mb-3 text-white/70 bg-panel-700 transition-colors duration-300 py-3 px-2 rounded"
                            >
                                <div class="flex">
                                    <GoBack />
                                    <div
                                        v-for="tag in article.tag"
                                        :key="tag.id"
                                        class=""
                                    >
                                        <a :href="'/?tag=' + tag.slug">
                                            <Tag color="#151f32">{{
                                                tag.name
                                            }}</Tag>
                                        </a>
                                    </div>
                                </div>
                                <div class="space-x-2">
                                    <CategoryBotton
                                        :category="article.category"
                                    />
                                </div>
                            </div>
                            <div
                                v-if="article.article_photo"
                                class="relative mx-auto flex justify-center"
                                style="width: 100%; height: 50vh"
                            >
                                <img
                                    :src="`/storage/ArticleAttachment/${article.article_photo.unique_name}`"
                                    alt="Article illustration"
                                    class="lazy h-full w-full object-cover lazyloaded rounded"
                                    loading="lazy"
                                    style="
                                        -webkit-mask-image: -webkit-radial-gradient(
                                            center center,
                                            white,
                                            black
                                        );
                                    "
                                />
                            </div>
                        </section>
                        <div
                            class="text-white/70 bg-panel-800 py-6 px-4 rounded border border-[#223c68]"
                        >
                            <section
                                class="container"
                                style="max-width: 1166px"
                            >
                                <div
                                    class="mx-auto mb-8 flex w-full flex-wrap lg:flex-nowrap"
                                >
                                    <div
                                        class="relative mx-auto items-center justify-between rounded-xl p-6 font-bold flex flex-1 basis-0 from-frameworks-light to-frameworks bg-gradient-to-l text-white/70"
                                    >
                                        <div
                                            :style="{
                                                background:
                                                    'url(/Images/Icon/S.svg)  50% -1%/ 250px  no-repeat',
                                            }"
                                            class="pointer-events-none absolute top-0 bottom-0 right-0 left-0 left-1/2 -translate-x-1/2 transform opacity-10 md:block"
                                        ></div>
                                        <div
                                            class="flex-1 md:mx-[2.5rem] md:flex md:space-x-6"
                                        >
                                            <div class="px-4 md:flex-1 md:px-0">
                                                <header class="mb-4">
                                                    <div
                                                        class="flex items-center"
                                                    >
                                                        <!--REACTION-->
                                                        <button
                                                            :class="
                                                                reacted
                                                                    ? 'rounded-full px-1 flex items-center justify-center bg-[#f6b7cb] mr-4 ring-1 ring-rose-300 border border-rose-300'
                                                                    : 'rounded-full px-1 flex items-center justify-center bg-white/10 mr-4'
                                                            "
                                                            :title="
                                                                reacted
                                                                    ? 'Want to like this article for future reference?'
                                                                    : 'Want to like this article for future reference?'
                                                            "
                                                            style="
                                                                width: 39px;
                                                                height: 39px;
                                                            "
                                                            @click.prevent="
                                                                reacted
                                                                    ? unlike(
                                                                          article
                                                                      )
                                                                    : like(
                                                                          article
                                                                      )
                                                            "
                                                        >
                                                            <svg
                                                                :class="
                                                                    reacted
                                                                        ? 'flex-shrink-0 text-[#f3477e]'
                                                                        : 'flex-shrink-0 text-white'
                                                                "
                                                                height="45"
                                                                viewBox="0 0 32 32"
                                                                width="45"
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
                                                        <h4
                                                            class="text-2xl font-bold leading-tight widescreen:text-3xl"
                                                        >
                                                            {{ article.title }}
                                                        </h4>
                                                    </div>
                                                </header>
                                                <div>
                                                    <div class="p-3">
                                                        <div
                                                            class="grid grid-cols-3 divide-x divide-solid divide-white/50"
                                                        >
                                                            <div
                                                                class="text-center"
                                                            >
                                                                <div
                                                                    class="mb-2 font-cabin text-2xs font-medium text-gray-100"
                                                                >
                                                                    Visit Member
                                                                </div>
                                                                <div
                                                                    class="inline-flex items-center text-sm font-semibold text-gray-100"
                                                                >
                                                                    <svg
                                                                        class="bi bi-eye mr-3"
                                                                        fill="currentColor"
                                                                        height="16"
                                                                        viewBox="0 0 16 16"
                                                                        width="16"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                    >
                                                                        <path
                                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
                                                                        />
                                                                        <path
                                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"
                                                                        />
                                                                    </svg>
                                                                    {{
                                                                        article.visit_count
                                                                    }}
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="text-center"
                                                            >
                                                                <div
                                                                    class="mb-2 font-cabin text-2xs font-medium text-gray-100"
                                                                >
                                                                    Article
                                                                    Favorites
                                                                </div>
                                                                <div
                                                                    class="inline-flex items-center mx-auto text-sm font-semibold text-gray-100"
                                                                >
                                                                    <svg
                                                                        class="bi bi-heart-fill mr-2"
                                                                        fill="currentColor"
                                                                        height="16"
                                                                        viewBox="0 0 16 16"
                                                                        width="16"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                    >
                                                                        <path
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                            fill-rule="evenodd"
                                                                        />
                                                                    </svg>
                                                                    <span>{{
                                                                        article
                                                                            .reactions
                                                                            .length
                                                                    }}</span>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="text-center"
                                                            >
                                                                <div
                                                                    class="mb-2 font-cabin text-2xs font-medium text-gray-100"
                                                                >
                                                                    Published
                                                                </div>
                                                                <div
                                                                    class="inline-flex items-center mx-auto text-sm font-semibold text-gray-100"
                                                                >
                                                                    <span>
                                                                        {{
                                                                            moment(
                                                                                article.created_at
                                                                            ).format(
                                                                                'MMMM Do, YYYY'
                                                                            )
                                                                        }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="content user-content text-[13px] text-grey-100"
                                >
                                    <v-md-editor
                                        :model-value="article.body"
                                        mode="preview"
                                    ></v-md-editor>
                                </div>
                            </section>
                        </div>
                        <section
                            class="mt-3 py-6 px-4 text-white/70 border border-[#223c68] rounded"
                        >
                            <div id="replies">
                                <div
                                    v-for="comment in article.comments"
                                    class="reply-with-responses"
                                    style="max-width: 800px"
                                >
                                    <ArticleComment
                                        :key="comment.uuid"
                                        :author="article.author"
                                        :comment="comment"
                                        :reacted="reactedBy"
                                    >
                                        <ArticleReply
                                            v-for="comment in comment.replies"
                                            :key="comment.uuid"
                                            :author="article.author"
                                            :comment="comment"
                                            :reacted="reactedBy"
                                        >
                                            <ReplytoReplies
                                                v-for="comment in comment.replies"
                                                :key="comment.uuid"
                                                :author="article.author"
                                                :comment="comment"
                                                :reacted="reactedBy"
                                            >
                                                <ArticleReply
                                                    v-for="comment in comment.replies"
                                                    :key="comment.uuid"
                                                    :author="article.author"
                                                    :comment="comment"
                                                    :reacted="reactedBy"
                                                >
                                                    <ReplytoReplies
                                                        v-for="comment in comment.replies"
                                                        :key="comment.uuid"
                                                        :author="article.author"
                                                        :comment="comment"
                                                        :reacted="reactedBy"
                                                    >
                                                        <ArticleReply
                                                            v-for="comment in comment.replies"
                                                            :key="comment.uuid"
                                                            :author="
                                                                article.author
                                                            "
                                                            :comment="comment"
                                                            :reacted="reactedBy"
                                                        ></ArticleReply>
                                                    </ReplytoReplies>
                                                </ArticleReply>
                                            </ReplytoReplies>
                                        </ArticleReply>
                                    </ArticleComment>
                                </div>
                            </div>
                            <ArticleCommentForm
                                :article="article"
                                :can-login="canLogin"
                            ></ArticleCommentForm>
                        </section>
                    </div>
                </main>
                <div
                    class="mx-auto max-w-[400px] flex-shrink-0 sticky top-[80px] self-start w-[315px] bg-[#18273f] p-3 rounded border border-[#223c68]"
                >
                    <div class="space-y-3 transition-all duration-500">
                        <div class="text-center">
                            <h1
                                class="mb-1 text-center text-3lg font-bold text-white"
                            >
                                More Recently Updated
                            </h1>
                            <h6
                                class="text-[10px] font-medium text-sm text-white"
                            >
                                In case you may have missed it.
                            </h6>
                        </div>
                        <div
                            class="flex items-center justify-between gap-3 bg-[#182a44] hover:bg-[#192f4b] transition-colors duration-500 p-2 rounded"
                        >
                            <img alt="" class="w-16" src="/Images/Icon/S.svg" />
                            <div class="">
                                <div class="flex items-center justify-between">
                                    <h4
                                        class="text-sm font-bold text-slate-100"
                                    >
                                        This Title
                                    </h4>
                                    <div
                                        class="flex flex-wrap items-center gap-x-2 text-2xs font-medium"
                                    >
                                        <span
                                            class="text-3xs text-grey-800 dark:text-grey-600/40"
                                        >
                                            Mar 18, 2023
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="content user-content text-[11px] text-grey-100"
                                >
                                    <div class="content user-content">
                                        Lorem ipsum dolor sit amet, illo ipsa
                                        laborum recusandae rerum voluptate.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between gap-3 bg-[#182a44] hover:bg-[#192f4b] transition-colors duration-500 p-2 rounded"
                        >
                            <img alt="" class="w-16" src="/Images/Icon/S.svg" />
                            <div class="">
                                <div class="flex items-center justify-between">
                                    <h4
                                        class="text-sm font-bold text-slate-100"
                                    >
                                        This Title
                                    </h4>
                                    <div
                                        class="flex flex-wrap items-center gap-x-2 text-2xs font-medium"
                                    >
                                        <span
                                            class="text-3xs text-grey-800 dark:text-grey-600/40"
                                        >
                                            Mar 18, 2023
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="content user-content text-[10px] text-grey-100"
                                >
                                    <div class="content user-content">
                                        Lorem ipsum dolor sit amet, illo ipsa
                                        laborum recusandae rerum voluptate.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between gap-3 bg-[#182a44] hover:bg-[#192f4b] transition-colors duration-500 p-2 rounded"
                        >
                            <img alt="" class="w-16" src="/Images/Icon/S.svg" />
                            <div class="">
                                <div class="flex items-center justify-between">
                                    <h4
                                        class="text-sm font-bold text-slate-100"
                                    >
                                        This Title
                                    </h4>
                                    <div
                                        class="flex flex-wrap items-center gap-x-2 text-2xs font-medium"
                                    >
                                        <span
                                            class="text-3xs text-grey-800 dark:text-grey-600/40"
                                        >
                                            Mar 18, 2023
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="content user-content text-[10px] text-grey-100"
                                >
                                    <div class="content user-content">
                                        Lorem ipsum dolor sit amet, illo ipsa
                                        laborum recusandae rerum voluptate.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between gap-3 bg-[#182a44] hover:bg-[#192f4b] transition-colors duration-500 p-2 rounded"
                        >
                            <img alt="" class="w-16" src="/Images/Icon/S.svg" />
                            <div class="">
                                <div class="flex items-center justify-between">
                                    <h4
                                        class="text-sm font-bold text-slate-100"
                                    >
                                        This Title
                                    </h4>
                                    <div
                                        class="flex flex-wrap items-center gap-x-2 text-2xs font-medium"
                                    >
                                        <span
                                            class="text-3xs text-grey-800 dark:text-grey-600/40"
                                        >
                                            Mar 18, 2023
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="content user-content text-[10px] text-grey-100"
                                >
                                    <div class="content user-content">
                                        Lorem ipsum dolor sit amet, illo ipsa
                                        laborum recusandae rerum voluptate.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between gap-3 bg-[#182a44] hover:bg-[#192f4b] transition-colors duration-500 p-2 rounded"
                        >
                            <img alt="" class="w-16" src="/Images/Icon/S.svg" />
                            <div class="">
                                <div class="flex items-center justify-between">
                                    <h4
                                        class="text-sm font-bold text-slate-100"
                                    >
                                        This Title
                                    </h4>
                                    <div
                                        class="flex flex-wrap items-center gap-x-2 text-2xs font-medium"
                                    >
                                        <span
                                            class="text-3xs text-grey-800 dark:text-grey-600/40"
                                        >
                                            Mar 18, 2023
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="content user-content text-[10px] text-grey-100"
                                >
                                    <div class="content user-content">
                                        Lorem ipsum dolor sit amet, illo ipsa
                                        laborum recusandae rerum voluptate.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between gap-3 bg-[#182a44] hover:bg-[#192f4b] transition-colors duration-500 p-2 rounded"
                        >
                            <img alt="" class="w-16" src="/Images/Icon/S.svg" />
                            <div class="">
                                <div class="flex items-center justify-between">
                                    <h4
                                        class="text-sm font-bold text-slate-100"
                                    >
                                        This Title
                                    </h4>
                                    <div
                                        class="flex flex-wrap items-center gap-x-2 text-2xs font-medium"
                                    >
                                        <span
                                            class="text-3xs text-grey-800 dark:text-grey-600/40"
                                        >
                                            Mar 18, 2023
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="content user-content text-[10px] text-grey-100"
                                >
                                    <div class="content user-content">
                                        Lorem ipsum dolor sit amet, illo ipsa
                                        laborum recusandae rerum voluptate.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </main>
    </AuthenticatedLayout>
</template>

<script setup>
import CategoryBotton from '@/Components/CategoryBotton.vue';
import ArticleComment from '@/Components/ArticleComment.vue';
import ArticleCommentForm from '@/Pages/ArticleCommentForm.vue';
import moment from 'moment-timezone';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import ArticleReply from '@/Components/ArticleReply.vue';
import { Button } from 'view-ui-plus';
import BlueBadgeIcon from '@/Components/BlueBadgeIcon.vue';
import GoBack from '@/Components/GoBack.vue';
import ReplytoReplies from '@/Components/ReplytoReplies.vue';

const props = defineProps({
    article: {},
    reacted: {
        type: Boolean,
    },
    reactedBy: {
        type: Boolean,
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const form = useForm({});

const like = (param) => {
    form.post(route('article.store_reaction', param), {
        onSuccess: form.wasSuccessful,
        preserveScroll: true,
    });
};
const unlike = (param) => {
    form.delete(route('article.destroy_reaction', param), {
        onSuccess: form.wasSuccessful,
        preserveScroll: true,
    });
};
</script>

<style scoped>
.to-frameworks {
    --tw-gradient-to: v-bind('article.gradient_left');
}

.from-frameworks-light {
    --tw-gradient-from: v-bind('article.form_frameworks');
    --tw-gradient-stops: var(--tw-gradient-from),
        var(--tw-gradient-to, rgba(244, 72, 129, 0));
}

.bg-gradient-to-l {
    background-image: linear-gradient(to left, var(--tw-gradient-stops));
}
</style>
